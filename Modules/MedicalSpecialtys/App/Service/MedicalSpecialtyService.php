<?php

namespace Modules\MedicalSpecialtys\App\Service;

use App\Traits\erorr;
use App\Traits\success;
use Modules\MedicalSpecialtys\App\Http\Requests\MedicalSpecialtyRequest;
use Modules\MedicalSpecialtys\App\Models\MedicalSpecialty;
use Modules\MedicalSpecialtys\App\resources\MedicalSpecialtyResource;

class MedicalSpecialtyService
{
    use erorr, success;
    public function get(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
    {
        try {
            $data = MedicalSpecialtyResource::collection(MedicalSpecialty::get());
            return $this->successResponse($data, 'Operation successful.',200);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function create(MedicalSpecialtyRequest $request): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
    {
        try {
            $MedicalSpecialty = $request->validated();
            $data = MedicalSpecialty::create($MedicalSpecialty);
            return $this->successResponse(new MedicalSpecialtyResource($data), 'Operation successful.',200 );
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function show($id): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        try {
            $data = MedicalSpecialty::find($id);
            return $this->successResponse(new MedicalSpecialtyResource($data), 'Operation successful.',200 );
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function update(array $data, $id): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        try {
            $MedicalSpecialty = MedicalSpecialty::findOrFail($id);
            $MedicalSpecialty->update($data);
            return $this->successResponse(new MedicalSpecialtyResource($data), 'Operation successful.',200 );
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function destroy($id): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        try {
            $data = MedicalSpecialty::findOrFail($id);
            $data->delete($id);
            return $this->successResponse(new MedicalSpecialtyResource($data), 'Operation successful.',200 );
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }
}
