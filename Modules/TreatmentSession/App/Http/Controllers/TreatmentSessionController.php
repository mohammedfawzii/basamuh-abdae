<?php

namespace Modules\TreatmentSession\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\TreatmentSession\App\Http\Requests\TreatmentSessionRequest;
use Modules\TreatmentSession\App\Service\TreatmentService;

class TreatmentSessionController extends Controller
{
    public array $data = [];
    protected TreatmentService $TreatmentService;
    public function __construct(TreatmentService $pattern)
    {
        $this->TreatmentService = $pattern;
    }
    public function index(): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        return $this->TreatmentService->get();
    }

    public function store(TreatmentSessionRequest $request): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        return $this->TreatmentService->create($request);

    }

    public function show($id): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        return $this->TreatmentService->show($id);
    }

    public function update(TreatmentSessionRequest $request, $id): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $data = $request->validated();
        return  $this->TreatmentService->update($data, $id);
    }

    public function destroy($id): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        return $this->TreatmentService->destroy($id);
    }
}
