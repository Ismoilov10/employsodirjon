<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Services\Employee\EmployeeServices;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected $request;
    protected $service;


    public function __construct(EmployeeServices $emloyeeServices)
    {
        $this->service = $emloyeeServices;
    }

    public function index()
    {
        return Employee::all();
    }
//    public function index(Request $request)
//    {
//        $this->service->index($request);
//    }

    public function register(Request $request)
    {
        $this->service->register($request);
    }

    public function update(Request $request,$id)
    {
        $this->service->update($request,$id);
    }

    public function delete(Request $request,$id)
    {
        $this->service->delete($request,$id);
    }

    public function changeEmail(Request $request,$id)
    {
        $this->service->changeEmail($request,$id);
    }

    public function PasswordReset(Request $request,$id)
    {
        $this->service->PasswordReset($request,$id);
    }

    public function changePhone(Request $request,$id)
    {
        $this->service->changePhone($request,$id);
    }

    public function login(Request $request)
    {
        $this->service->login($request);
    }

}
