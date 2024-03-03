<?php

namespace Modules\Assestents\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Assestents\App\Http\Requests\AssestentRequest;
//use Modules\Assestents\App\Service\PatientService;
use Modules\Patients\App\Service\PatientService;

class AssestentsController extends Controller
{


    public array $data = [];
    protected PatientService $PatientService;

    public function __construct(PatientService $pattern)
    {
        $this->PatientService = $pattern;
    }

    public function index(): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        return $this->PatientService->get();
    }

    public function store(AssestentRequest $request): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        return $this->PatientService->create($request);
    }

    public function show($id): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        return $this->PatientService->show($id);
    }

    public function update(AssestentRequest $request, $id): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $data = $request->validated();
        return $this->PatientService->update($data, $id);
    }

    public function destroy($id): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        return $this->PatientService->destroy($id);
    }
}
