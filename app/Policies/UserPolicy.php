<?php

namespace App\Policies;

use App\Family;
use App\Family;
use App\Bureau;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy {

    use HandlesAuthorization;

    /**
     * Determine whether the user can edit the user data.
     *
     * @param  \App\Family  $user
     * @param  \App\Family  $editableUser
     * @return mixed
     */
    public function edit(Family $user, Family $editableUser) {
        return $editableUser->id == $user->id || $editableUser->manager_id == $user->id || is_system_admin($user);
    }

    /**
     * Determine whether the user can delete the user.
     *
     * @param  \App\Family  $user
     * @param  \App\Family  $editableUser
     * @return mixed
     */
    public function delete(Family $user, Family $editableUser) {
        return ($editableUser->manager_id == $user->id || is_system_admin($user)) && $editableUser->id != $user->id;
    }
    
    public function manage_family(Family $user, Family $familyUser) {
        if(is_system_admin($user)){
            return true;
        }else{
            $famille = Family::where('user',$familyUser->id)->first();
            if($famille){
                $bureau = Bureau::where('family',$famille->id)
                        ->where('status',true)->where('user', $user->id)
                        ->where('end_date','>',"'".date('Y-m-d H:i:s')."'")->first();
                return ($bureau) ? true : false;
            }
            return false;
        }
    }

}
