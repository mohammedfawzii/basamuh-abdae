<?php

namespace Modules\Assestents\App\Service;

use App\Traits\erorr;
use App\Traits\success;
use Modules\Assestents\App\Http\Requests\AssestentRequest;
use Modules\Assestents\App\Models\Assestent;
use Modules\Assestents\App\resources\AssestentResource;


class AssestentService
{

    use erorr, success;
    public function get(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
    {
        try {
            $data = AssestentResource::collection(Assestent::get());
            return $this->successResponse($data, 'Operation successful.');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function create(AssestentRequest $request): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
    {
        try {
            $assestent = $request->validated();
            $data = Assestent::create($assestent);
            $data->addMediaFromRequest('img')->toMediaCollection('assestents');
            return $this->successResponse(new AssestentResource($data), 'Operation successful.' );
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function show($id)
    {
        try {
        $data = Assestent::find($id);
            return $this->successResponse(new AssestentResource($data), 'Operation successful.' );
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function update(array $data, $id)
    {
        try {
            $assestent = Assestent::findOrFail($id);
            $assestent->update($data);
            return $this->successResponse(new AssestentResource($data), 'Operation successful.' );
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $data = Assestent::findOrFail($id);
            $data->delete($id);
            return $this->successResponse(new AssestentResource($data), 'Operation successful.' );
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }
}
