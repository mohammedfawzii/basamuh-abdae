<?php

namespace Modules\Doctor\App\Http\Controllers;

use App\Http\Controllers\Controller;


use Modules\Doctor\App\Http\Requests\DoctorRequest;
use Modules\Doctor\App\Models\Doctor;
use Modules\Doctor\App\Service\DoctorService;

class DoctorController extends Controller
{

    public array $data = [];
    protected DoctorService $DoctorService;
    public function __construct(DoctorService $pattern)
    {
        $this->DoctorService = $pattern;
    }
    public function index(): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        return $this->DoctorService->get();
    }

    public function store(DoctorRequest $request): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        return $this->DoctorService->create($request);

    }

    public function show($id): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        return $this->DoctorService->show($id);
    }

    public function update(DoctorRequest $request, $id): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $data = $request->validated();
        return  $this->DoctorService->update($data, $id);
    }

    public function destroy($id): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        return $this->DoctorService->destroy($id);
    }
}
