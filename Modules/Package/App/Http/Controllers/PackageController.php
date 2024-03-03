<?php

namespace Modules\Package\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Package\App\Http\Requests\PackageRequest;
use Modules\Package\App\Models\Package;
use Modules\Package\App\Service\PackageService;
use Modules\TreatmentSession\App\Models\TreatmentSession;

class PackageController extends Controller
{
    public array $data = [];
    protected PackageService $PackageService;
    public function __construct(PackageService $pattern)
    {
        $this->PackageService = $pattern;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return $this->PackageService()->store();
    }

    /**
     * Store a newly created resource in storage.
     */
    // app\Http\Controllers\PackageController.php



    public function store(PackageRequest $request)
    {

        return $this->PackageService->store($request);
    }




public function show($id): JsonResponse
    {
        //

        return response()->json($this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): JsonResponse
    {
        //

        return response()->json($this->data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): JsonResponse
    {
        //

        return response()->json($this->data);
    }
}
