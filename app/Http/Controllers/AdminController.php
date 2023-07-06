<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index()
    {
        $url = url('/admin');
        $admin = new Admin;
        $title = 'Admin Registration Form';
        $a = compact('url','title','admin');
        return view('admin_view')->with($a);
    }

    public function storeData(Request $res)
    {
        $res->validate(
            [
                'name'=>'required',
                'email'=>'required',
                'password'=>'required',
            ]
            );
        $admin = new Admin;
        $admin->name = $res['name'];
        $admin->email = $res['email'];
        $admin->password = $res['password'];
        $admin->save();

        return redirect('/admin/viewadmin');
    }
    public function getadminview(){
        $admin = Admin::all();
        $a = compact('admin');
        return view('getadmindata')->with($a);
    }

    public function deleteAdmin($id){
        $admin = Admin::find($id);

        if(!is_null($admin)){
            $admin->delete();
        }
        return redirect('/admin/viewadmin');
    }
    public function editAdmin($id){
        $admin = Admin::find($id);

        if(is_null($admin)){
            return redirect('/admin/viewadmin');
        }
        else{
            $url = url('/admin/update/')."/".$id;
            $title = 'Update form';
            $a = compact('admin','url','title');
            return view('admin_view')->with($a);
        }
    }

    public function update($id, Request $res){
        $admin = Admin::find($id);
        $admin->name = $res['name'];
        $admin->email = $res['email'];
        $admin->password = $res['password'];
        $admin->save();

        return redirect('/admin/viewadmin');
    }
}
