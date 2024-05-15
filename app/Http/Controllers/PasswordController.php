<?php

namespace App\Http\Controllers;

use App\Models\Password;
use Illuminate\Http\Request;
use App\Services\ResponseService;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
    public function __construct(protected ResponseService $responseService)
    {
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            Password::create(
                [
                    'title' => $request->title,
                    'site' => $request->site,
                    'user_id' => Auth::user()->id,
                    'password' => $request->password,
                    'note' => $request->note,
                    'organization_id' => $request->organization_id,
                    'email' => $request->email,

                ]
            );

            return $this->responseService->successResponse('Password stored Successfully');

        } catch (\Throwable $th) {

            return $this->responseService->exceptionErrorResponse(
                "Issue storing Organization's password",
                "Issue storing Organization's password",
                $th->getMessage()
            );

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {

        try {

            return $this->responseService->successResponse(
                Password::where('organization_id', $request->organization_id)->get()
            );


        } catch (\Throwable $th) {

            return $this->responseService->exceptionErrorResponse(
                'Issue getting Organizations passwords',
                'Issue getting Organizations passwords',
                $th->getMessage()
            );

        }
    }

    public function specificPasswordDetails(Request $request)
    {
       

        try {
            return $this->responseService->successResponse(
                Password::where('id', $request->password_id)->first()
            );


        } catch (\Throwable $th) {

            return $this->responseService->exceptionErrorResponse(
                'Issue getting  password details',
                'Issue getting  passwords details',
                $th->getMessage()
            );

        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Password $password)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Password $password)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Password $password)
    {
        //
    }
}
