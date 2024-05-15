<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Interfaces\ResponseInterface;
use App\Models\User;
use App\Services\ResponseService;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
class MobileAuthController extends Controller
{
    public function __construct(protected ResponseService $responseService)
    {
    }

    // Registering users via mobile app
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'device_name' => 'required',
           // 'phone' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->responseService->errorResponse(
                $validator->errors(),
                $validator->errors(),
                422
            );

        }

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
            ]);

            $token = $user->createToken($request->device_name)->plainTextToken;

            //  TODO: Dispatch the SendWelcomeEmail job


            return $this->responseService->successResponse(
                [
                    'Bearer' => $token
                ]
            );

        } catch (\Throwable $th) {
            return $this->responseService->exceptionErrorResponse(
                "Issue creating account try again",
                "Issue creating account try again",
                $th
            );
        }

    }

    // Login for Mobile apps
    public function loginMobileApp(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',

        ]);

        if ($validator->fails()) {
            return $this->responseService->errorResponse(
                $validator->errors(),
                $validator->errors(),
                422
            );

        }

        try {
            $user = User::where('email', $request->email)->first();

            if (!$user || !Hash::check($request->password, $user->password)) {

                return $this->responseService->errorResponse(
                    'Wrong credentials',
                    'Wrong credentials',
                    422
                );


            }


            $token = $user->createToken($request->device_name)->plainTextToken;

            return $this->responseService->successResponse(
                [
                    'Bearer' => $token
                ]
            );

        } catch (\Throwable $th) {

            return $this->responseService->exceptionErrorResponse(
                "Issue signing in try again ",
                "Issue signing in try again ",
                $th
            );

        }


    }

    public function logout(Request $request)
    {

        try {
            auth()->user()->tokens()->delete();

            return $this->responseService->successResponse(
                'user logged out'
            );
        } catch (\Throwable $th) {
            return $this->responseService->exceptionErrorResponse(
                'Issue logging out',
                'Issue logging out',
                $th
            );
        }



    }

    public function broadcastAuth(Request $request)
    {
        $user = $request->user();
        \Log::info( $user);
        $request->setUserResolver(function () use ($user) {
            return $user;
        });
        // return Broadcast::auth($request->user());
    }
}
