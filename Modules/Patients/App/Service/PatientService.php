<?php

namespace Modules\Patients\App\Service;

use App\Traits\erorr;
use App\Traits\success;
use Modules\Patients\App\Http\Requests\PatientRequest;
use Modules\Patients\App\Models\Patient;
use Modules\Patients\App\resources\PatientResource;

class PatientService
{
    use erorr, success;
    public function get(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
    {
        try {
            $data = PatientResource::collection(Patient::get());
            return $this->successResponse($data, 'Operation successful.');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function create(PatientRequest $request): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
    {
        try {
            $Patient = $request->validated();
            $data = Patient::create($Patient);
            return $this->successResponse($data, 'Operation successful.' );
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function show($id): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        try {
            $data = Patient::find($id);
            return $this->successResponse(new PatientResource($data), 'Operation successful.' );
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function update(array $data, $id): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        try {
            $Patient = Patient::findOrFail($id);
            $Patient->update($data);
            return $this->successResponse(new PatientResource($data), 'Operation successful.' );
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function destroy($id): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        try {
            $data = Patient::findOrFail($id);
            $data->delete($id);
            return $this->successResponse(new PatientResource($data), 'Operation successful.' );
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }
}
