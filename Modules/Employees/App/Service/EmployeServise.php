<?php

namespace Modules\Employees\App\Service;

use App\Traits\erorr;
use App\Traits\message;

use App\Traits\success;
use Modules\Employees\App\Http\Requests\EmployeRequest;
use Modules\Employees\App\Models\Employe;
use Modules\Employees\App\resources\EmployeResource;

class EmployeServise
{
    use erorr, success;
    public function get(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
    {
        try {
            $data = EmployeResource::collection(Employe::get());
            return $this->successResponse($data, 'Operation successful.',200);
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function create(EmployeRequest $request): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
    {
        try {
            $Employ = $request->validated();
            $data = Employe::create($Employ);
            $data->addMediaFromRequest('img')->toMediaCollection('Employs');
            return $this->successResponse(new EmployeResource($data), 'Operation successful.',200 );
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function show($id): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        try {
            $data = Employe::find($id);
            return $this->successResponse(new EmployeResource($data), 'Operation successful.',200 );
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function update(array $data, $id): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        try {
            $Employe = Employe::findOrFail($id);
            $Employe->update($data);
            return $this->successResponse(new EmployeResource($data), 'Operation successful.',200 );
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }

    public function destroy($id): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        try {
            $data = Employe::findOrFail($id);
            $data->delete($id);
            return $this->successResponse(new EmployeResource($data), 'Operation successful.',200 );
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage());
        }
    }
}
