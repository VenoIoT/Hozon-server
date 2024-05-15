<?php

namespace App\Http\Controllers;

use App\Interfaces\ResponseInterface;
use App\Models\Organization;
use App\Services\ResponseService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganizationController extends Controller
{
    public function __construct(protected ResponseService $responseService)
    {
    }
    public function index(Request $request)
    {
        try {

            return $this->responseService->successResponse(
                Organization::where('user_id', Auth::user()->id)->get()
            );

        } catch (\Throwable $th) {

            return $this->responseService->exceptionErrorResponse(
                'Issue getting user Organizations',
                'Issue getting user Organizations',
                $th->getMessage()
            );

        }

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

            Organization::create(
                [
                    'organization' => $request->organization,
                    'description' => $request->description,
                    'user_id' => Auth::user()->id

                ]
            );

            return $this->responseService->successResponse('Organization Created Successfully');

        } catch (\Throwable $th) {

            return $this->responseService->exceptionErrorResponse(
                'Issue creating Organization',
                'Issue creating Organization',
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
                Organization::where('id', $request->organization_id)->get()
            );

        } catch (\Throwable $th) {

            return $this->responseService->exceptionErrorResponse(
                'Issue getting user Organizations',
                'Issue getting user Organizations',
                $th->getMessage()
            );

        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organization $organization)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organization $organization)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organization $organization)
    {
        //
    }
}
