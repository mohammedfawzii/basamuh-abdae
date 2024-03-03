<?php
namespace Modules\Doctor\App\Service;


use App\Traits\erorr;
use App\Traits\success;
use Modules\Doctor\App\Http\Requests\DoctorRequest;
use Modules\Doctor\App\Models\Doctor;
use Modules\Doctor\App\resources\DoctorResource;

class DoctorService{
    use erorr, success;
    public function get(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
    {
        try {
            $data = DoctorResource::collection(Doctor::get());
            return $this->successResponse($data, 'Operation successful.');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function create(DoctorRequest $request): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
    {
        try {
            $Doctor = $request->validated();
            $data = Doctor::create($Doctor);
            $data->addMediaFromRequest('img')->toMediaCollection('Doctors');
            return $this->successResponse(new DoctorResource($data), 'Operation successful.' );
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function show($id): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        try {
            $data = Doctor::find($id);
            return $this->successResponse(new DoctorResource($data), 'Operation successful.' );
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function update(array $data, $id): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        try {
            $Doctor = Doctor::findOrFail($id);
            $Doctor->update($data);
            return $this->successResponse(new DoctorResource($data), 'Operation successful.' );
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function destroy($id): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        try {
            $data = Doctor::findOrFail($id);
            $data->delete($id);
            return $this->successResponse(new DoctorResource($data), 'Operation successful.' );
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }
}
