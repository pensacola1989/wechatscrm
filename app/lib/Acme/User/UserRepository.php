<?php namespace Acme\User;

use User;

class UserRepository implements UserRepInterface {

    public function addUser(User $user)
    {
    	$user->save();
    	return $user->id;
    }

    public function updateUser(User $user)
    {

    	$user->save();
    }

}