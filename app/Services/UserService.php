<?php

namespace App\Services;

use App\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserService
{

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        return $this->user->all();
    }

    public function edit($id)
    {
        return $this->user->show($id);
    }

    public function update(Request $request,$id)
    {
    
        $password=Hash::make($request->password);
        $attributes=$request->only(['first_name', 'last_name','email','mobile','address']);
        return $this->user->update($id,$attributes);
        
    }

    public function delete($id)
    {
        return $this->user->remove($id);       
    }





}
      
