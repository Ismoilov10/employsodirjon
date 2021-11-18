<?php

namespace App\Services\Auth;

use App\Models\Employee;
use Illuminate\Http\Request;


class AuthService
{

    public function index()
    {
        return Employee::all();
    }

    public function register($request)
    {
        try{
            $employee = new Employee();
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->password = $request->password;
            if ($employee->save()){
                return response()->json(['status'=>'success', 'message' => 'employee created successfull']);
            }
        }catch (\Exception $e){
            return response()->json(['status'=>'error', 'message' => $e->getMessage()]);
        }
    }

    public function update($request,$id)
    {
        try{
            $employee = employee::findOrFail($id);
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->password = $request->password;
            if ($employee->save()){
                return response()->json(['status'=>'success', 'message' => 'Post Updated successfull']);
            }
        }catch (\Exception $e){
            return response()->json(['status'=>'error', 'message' => $e->getMessage()]);
        }
    }


    public function destroy($request,$id)
    {
        try{
            $employee = Employee::findOrFail($id);
            if ($employee->delete()){
                return response()->json(['status'=>'success', 'message' => 'Post deleted successfull']);
            }
        }catch (\Exception $e){
            return response()->json(['status'=>'error', 'message' => $e->getMessage()]);
        }
    }

}
