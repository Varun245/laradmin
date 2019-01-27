<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserActivity;
use App\Services\UserService;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    protected $userservice;

    public function __construct(UserService $userservice)
    {
        $this->userservice = $userservice;
    }

    public function index()
    {
        $users = $this->userservice->index();

        $count=1;

        return view('admin.userList', compact('users','count'));
    }

    public function edit($id)
    {
        $users=$this->userservice->edit($id);

        return view('admin.userEdit',compact('users'));
    }

    public function update(UpdateUserRequest $request,$id)
    {
       
        $this->userservice->update($request,$id);
        
        Session::flash('status','User Details Updated');
    

        return redirect()->route('admin.userList');

    }

    public function delete($id)
    {
       
        $this->userservice->delete($id);

        Session::flash('status','User Deleted');
        
        return redirect()->route('admin.userList');

    }

  

}
