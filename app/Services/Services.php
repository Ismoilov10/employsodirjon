


public function update(Request $request,$id)
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
