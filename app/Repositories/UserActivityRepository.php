<?php

namespace App\Repositories;

use App\User;
use DB;

class UserActivityRepository
{

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function track($oldValues, $newValues, $name)
    {
       

        $oldValues=array_intersect_key($oldValues,$newValues);
        $oldValues=array_values($oldValues);

        $count=0;
       foreach($newValues as $key => $value)
       {
            \App\UserActivity::create([
                'user_id' => auth()->id(),
                'field_name' => $key,
                'old_value' => $oldValues[$count],
                'modified_value' => $value,
                'modified_by' => $name,
            ]);
            $count++;

       }
        
    }

}
