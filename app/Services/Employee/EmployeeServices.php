<?php

namespace App\Services\Employee;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\File;
use Aliftech\Core\Core;


class EmployeeServices
{
    public function __construct(
        public Core $core
    )
    {
    }
    public function login($request)
    {
        $formfields = $request->only(['email', 'password']);
        $this->core->httpRequest(['GET',env('AUTH_SERVICE',[
            'body' => [
                'id' => $user->id,
            ],
            'headers' => [
                'Authorization' => ''
            ]
        ])]);

        $token = $this->core->getAuthKey();
//            if (){
//                return response()->json(['status'=>'success', 'message' => 'Post Updated successfull']);
//            }
//        }catch (\Exception $e){
//            return response()->json(['status'=>'error', 'message' => $e->getMessage()]);
//        }
    }
//    public function index()
//    {
//        return Employee::all();
//    }

    /// Registrate EmployeeServices ///
    public function register(Request $request)
    {
        try{
            $data = [];
            $employee = new Employee();
            $employee->name = $request->input('name');
            $employee->email = $request->email;
            $employee->phone = $request->phone;
            $employee->date_of_birth = $request->date_of_birth;
            $employee->password = $request->password;
            $employee->sex = $request->sex;
            if ($request->hasFile('image')){
                $fileExt  = $request->file('image')->getClientOriginalExtension(); // File Extencion name
                $fileName = time()."_profile.".$fileExt;//filename+time+ext
                $employee->image = time().'/'.$fileName; // Adding to employee
                Storage::putFileAs('avatars/'.time(), new File($request->file('image')), $fileName);//Put to storage
            }else{
                if($request->sex == 'male'){
                    $employee->image = 'defaultmale/defaultmale.jpg';// Default image name when file isnt choosed
                }else{
                    $employee->image = 'defaultfemale/defaultfemale.jpg';// Default image name when file isnt choosed
                }
            }
            $employee->verification_code = $request->verification_code;
            $employee->role_id = $request->role_id;

            if ($employee->save()){
                $data = ['status'=>'success', 'message' => 'employee created successfull'];
            }
        }catch (\Exception $e){
            $data = ['status'=>'error', 'message' => $e->getMessage()];
        }
        return response()->json($data);
    }

                         /// Change Name EmployeeServices ///
    ///
    public function update($request,$id)
    {
        try{
            $employee = Employee::query()->findOrFail($id);
            if ($request->hasFile('image')){
                 $fileExt  = $request->file('image')->getClientOriginalExtension(); // File Extencion name
                 $fileName = time()."_profile.".$fileExt;//filename+time+ext
                 $employee->image = time().'/'.$fileName; // Adding to employee
                    Storage::putFileAs('avatars/'.time(), new File($request->file('image')), $fileName);//Put to storage
            }else{
                Storage::delete('avatars/'.$employee->image);
                if($request->sex == 'male'){
                    $employee->image = 'defaultmale/defaultmale.jpg';// Default image name when file isnt choosed
                }else{
                    $employee->image = 'defaultfemale/defaultfemale.jpg';// Default image name when file isnt choosed
                }
            }
            $employee->name = $request->name;

            if ($employee->save()){
                return response()->json(['status'=>'success', 'message' => 'Post Updated successfull']);
            }
        }catch (\Exception $e){
            return response()->json(['status'=>'error', 'message' => $e->getMessage()]);
        }
    }


    /// Delete EmployeeServices ///
    public function delete($request,$id)
    {
        try{
            $employee = Employee::findOrFail($id);
            Storage::delete('avatars/'.$employee->image);
            if ($employee->delete()){
                return response()->json(['status'=>'success', 'message' => 'Post deleted successfull']);
            }
        }catch (\Exception $e){
            return response()->json(['status'=>'error', 'message' => $e->getMessage()]);
        }
    }

    /// Change email of EmployeeServices ///
    public function ChangeEmail($request,$id)
    {
        try{
            //$data = [];
            $employee = Employee::findOrFail($id);
            $employee->email = $request->email;
            if ($employee->save()){
//                $data = ['status'=>'success', 'message' => 'Post Updated successfull'];
                return response()->json(['status'=>'success', 'message' => 'Post Updated successfull']);
            }
        }catch (\Exception $e){
            return response()->json(['status'=>'error', 'message' => $e->getMessage()]);
        }

//        return $data;
    }

//    public function ChangeEmail($request,$id)
//    {
//        try{
//            $data = [];
//            $employee = Employee::findOrFail($id);
//            $employee->email = $request->email;
//            if ($employee->save()){
////                $data = ['status'=>'success', 'message' => 'Post Updated successfull'];
//            }
//        }catch (\Exception $e){
//            $data = [['status'=>'error', 'message' => $e->getMessage()]];
//        }
//
//        return response()->json($data);
//    }

    /// Password Reset of EmployeeServices ///
    public function PasswordReset($request,$id)
    {
        try{
            $employee = Employee::findOrFail($id);
            $employee->password = $request->password;
            if ($employee->save()){
                return response()->json(['status'=>'success', 'message' => 'Post Updated successfull']);
            }
        }catch (\Exception $e){
            return response()->json(['status'=>'error', 'message' => $e->getMessage()]);
        }
    }

    /// Phone Num Change of EmployeeServices ///
    public function changePhone($request,$id)
    {
        try{
            $employee = Employee::findOrFail($id);
            $employee->phone = $request->phone;
            if ($employee->save()){
                return response()->json(['status'=>'success', 'message' => 'Post Updated successfull']);
            }
        }catch (\Exception $e){
            return response()->json(['status'=>'error', 'message' => $e->getMessage()]);
        }
    }


    public function ex()
    {
        $response = $this->core->httpRequest();
    }

}
