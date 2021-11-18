<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Services\Auth\AuthService;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected $request;
    protected $service;


    public function __construct(AuthService $registerService)
    {
        $this->service = $registerService;
    }

    public function index(Request $request)
    {
        $this->service->index($request);
    }

    public function register(Request $request)
    {
        $this->service->register($request);
    }

    public function update(Request $request,$id)
    {
        $this->service->update($request,$id);
    }

    public function destroy(Request $request,$id)
    {
        $this->service->destroy($request,$id);
    }

}
