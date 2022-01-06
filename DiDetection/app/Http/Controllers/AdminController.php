<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;

class AdminController extends Controller
{
    //
    

    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users=User::all();
        
        
      
        $userRoles=Auth::user()->roles->pluck('name');
        if (!$userRoles->contains('Admin')) {
            return redirect('/home');
        }
        
     
        return view('admin.admin',['users'=>$users]);
    }

    public function adminAssignRoles(Request $request){
        $user=User::where('email',$request['email'])->first();
        $user->roles()->detach();
        if ($request['role_doctor']) {
            $user->roles()->attach(Role::where('name','Doctor')->first());
        }
        if ($request['role_admin']) {
            $user->roles()->attach(Role::where('name','Admin')->first());
        }

        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

   
    public function store(Request $request)
    {
        
    }

   
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
 }

   
    public function update(Request $request, $id)
    {
        //
        
    }

    
    public function destroy(Patient $patient)
    {
        
    }


}
