<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
class EmployeeController extends Controller
{
    public function index()
    {
        $url = url('/employee');
        $employee = new Employee;
        $title = 'Employee Registration Form';
        $e = compact('url','title','employee');
        return view('employee_view')->with($e);
    }

    public function storeData(Request $res)
    {
        $res->validate(
            [
                'name'=>'required',
                'phonenumber' => 'required',
                'email'=>'required',
                'password'=>'required',
            ]
            );
        $employee = new Employee;
        $employee->name = $res['name'];
        $employee->phonenumber = $res['phonenumber'];
        $employee->email = $res['email'];
        $employee->password = $res['password'];
        $employee->save();

        return redirect('/employee/viewemployee');
    }
    public function getemployeeview(){
        $employee = Employee::all();
        $e = compact('employee');
        return view('getemployeedata')->with($e);
    }

    public function deleteemployee($id){
        $employee = Employee::find($id);

        if(!is_null($employee)){
            $employee->delete();
        }
        return redirect('/employee/viewemployee');
    }
    public function editemployee($id){
        $employee = Employee::find($id);

        if(is_null($employee)){
            return redirect('/employee/viewemployee');
        }
        else{
            $url = url('/employee/update/')."/".$id;
            $title = 'Update form';
            $a = compact('employee','url','title');
            return view('employee_view')->with($a);
        }
    }

    public function update($id, Request $res){
        $employee = employee::find($id);
        $employee->name = $res['name'];
        $employee->phonenumber = $res['phonenumber'];
        $employee->email = $res['email'];
        $employee->password = $res['password'];
        $employee->save();

        return redirect('/employee/viewemployee');
    }
}
