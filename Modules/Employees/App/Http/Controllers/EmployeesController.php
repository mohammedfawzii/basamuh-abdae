<?php

namespace Modules\Employees\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\message;
use Modules\Employees\App\Http\Requests\EmployeRequest;
use Modules\Employees\App\Service\EmployeServise;

class EmployeesController extends Controller
{
    use message;
    public array $data = [];
    protected EmployeServise $employeServise;
    public function __construct(EmployeServise $pattern)
    {
        $this->EmployeServise = $pattern;
    }
    public function index(): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        return $this->EmployeServise->get();
    }
    public function store(EmployeRequest $request): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        return $this->EmployeServise->create($request);
    }
    public function show($id): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        return $this->EmployeServise->show($id);
    }
    public function update(EmployeRequest $request, $id): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $data = $request->validated();
        return  $this->EmployeServise->update($data, $id);
    }
    public function destroy($id): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        return $this->EmployeServise->destroy($id);
    }
}
