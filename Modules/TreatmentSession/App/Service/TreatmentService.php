<?php

namespace Modules\TreatmentSession\App\Service;

use App\Traits\erorr;
use App\Traits\success;
use Modules\TreatmentSession\App\Http\Requests\TreatmentSessionRequest;
use Modules\TreatmentSession\App\Models\TreatmentSession;
use Modules\TreatmentSession\App\resources\TreatmentSessionResource;

class TreatmentService
{
    use erorr, success;
    public function get(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
    {
        try {
            $data = TreatmentSessionResource::collection(TreatmentSession::get());
            return $this->successResponse($data, 'Operation successful.');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function create(TreatmentSessionRequest $request): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
    {
        try {
            $Session = $request->validated();
            $data = TreatmentSession::create($Session);
            return $this->successResponse(new TreatmentSessionResource($data), 'Operation successful.' );
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function show($id): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        try {
            $data = TreatmentSession::find($id);
            return $this->successResponse(new TreatmentSessionResource($data), 'Operation successful.' );
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function update(array $data, $id): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        try {
            $Session = TreatmentSession::findOrFail($id);
            $Session->update($data);
            return $this->successResponse(new TreatmentSessionResource($data), 'Operation successful.' );
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function destroy($id): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        try {
            $data = TreatmentSession::findOrFail($id);
            $data->delete($id);
            return $this->successResponse(new TreatmentSessionResource($data), 'Operation successful.' );
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }
}
