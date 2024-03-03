<?php

namespace Modules\MedicalSpecialtys\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\message;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\MedicalSpecialtys\App\Http\Requests\MedicalSpecialtyRequest;
use Modules\MedicalSpecialtys\App\Service\MedicalSpecialtyService;

class MedicalSpecialtysController extends Controller
{
    public array $data = [];
    protected MedicalSpecialtyService $MedicalSpecialtyService;
    public function __construct(MedicalSpecialtyService $pattern)
    {
        $this->MedicalSpecialtyService = $pattern;
    }
    public function index(): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        return $this->MedicalSpecialtyService->get();
    }
    public function store(MedicalSpecialtyRequest $request): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        return $this->MedicalSpecialtyService->create($request);
    }
    public function show($id): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        return $this->MedicalSpecialtyService->show($id);
    }
    public function update(MedicalSpecialtyRequest $request, $id): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $data = $request->validated();
        return  $this->MedicalSpecialtyService->update($data, $id);
    }
    public function destroy($id): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        return $this->MedicalSpecialtyService->destroy($id);
    }
}
