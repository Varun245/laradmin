<?php

namespace App\Repositories;

use App\Services\UserActivityService;
use App\User;

class UserRepository
{
    protected $user;
    protected $userActivityService;

    public function __construct(User $user, UserActivityService $userActivityService)
    {
        $this->user = $user;
        $this->userActivityService = $userActivityService;

    }

    public function all()
    {
        return $this->user->orderby('created_at', 'DESC')->paginate(10);
    }

    public function show($id)
    {
        return $this->user->find($id);
    }

    public function update($id, array $attributes)
    {
       
        
        $oldValues =$this->user->find($id)->getOriginal();
      

        $user = User::find($id);
        $user->fill($attributes);
        $newValues = $user->getDirty();
        $user->save();
  
         

        $name = User::find(auth()->id());
        $name = $name->first_name;

        return $this->userActivityService->create($oldValues, $newValues, $name);

    }

    public function remove($id)
    {
        $this->user->where('id', $id)->delete();
    }

}
