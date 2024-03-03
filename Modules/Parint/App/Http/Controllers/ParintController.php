<?php

namespace Modules\Parint\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Parint\App\Http\Requests\ParintRequest;
use Modules\Parint\App\Service\ParintService;

class ParintController extends Controller
{
    protected ParintService $ParintService;
    public function __construct(ParintService $pattern)
    {
        $this->ParintService = $pattern;
    }
    public function index(): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        return $this->ParintService->get();
    }
    public function store(ParintRequest $request): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        return $this->ParintService->create($request);
    }
    public function show($id): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        return $this->ParintService->show($id);
    }
    public function update(ParintRequest $request, $id): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $data = $request->validated();
        return  $this->ParintService->update($data, $id);
    }
    public function destroy($id): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        return $this->ParintService->destroy($id);
    }
}
