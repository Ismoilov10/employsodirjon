<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Message;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Services\Employee\EmployeeServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Notifications\Notifiable;



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

    public function sendEmail(Request $request)
    {
        $this->service->sendEmail($request);
    }

    public function sendResetLinkResponse(Request $request)
    {
        $input = $request->only('email');
        $validator = Validator::make($input, [
            'email' => "required|email"
        ]);
        if ($validator->fails()) {
            return response(['errors'=>$validator->errors()->all()], 422);
        }
        $response =  Password::sendResetLink($input);
        if($response == Password::RESET_LINK_SENT){
            $message = "Mail send successfully";
        }else{
            $message = "Email could not be sent to this email address";
        }
//$message = $response == Password::RESET_LINK_SENT ? 'Mail send successfully' : GLOBAL_SOMETHING_WANTS_TO_WRONG;
        $response = ['data'=>'','message' => $message];
        return response($response, 200);
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
