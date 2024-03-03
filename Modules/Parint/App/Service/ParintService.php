<?php

namespace Modules\Parint\App\Service;

use App\Traits\erorr;
use App\Traits\success;
use Modules\Parint\App\Http\Requests\ParintRequest;
use Modules\Parint\App\Models\Parint;
use Modules\Parint\App\resources\ParintResource;

class ParintService
{
    use erorr, success;
    public function get(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
    {
        try {
            $data = ParintResource::collection(Parint::get());
            return $this->successResponse($data, 'Operation successful.',200);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function create(ParintRequest $request): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
    {
        try {
            $Parint = $request->validated();
            $data = Parint::create($Parint);
            return $this->successResponse($data, 'Operation successful.',200 );
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function show($id): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        try {
            $data = Parint::find($id);
            return $this->successResponse(new ParintResource($data), 'Operation successful.',200 );
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function update(array $data, $id): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        try {
            $Parint = Parint::findOrFail($id);
            $Parint->update($data);
            return $this->successResponse(new ParintResource($data), 'Operation successful.',200 );
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function destroy($id): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        try {
            $data = Parint::findOrFail($id);
            $data->delete($id);
            return $this->successResponse(new ParintResource($data), 'Operation successful.',200 );
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }
}
