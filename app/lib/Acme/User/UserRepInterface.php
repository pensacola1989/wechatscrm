<?php namespace Acme\User;
use User;
interface UserRepInterface {

    public function addUser(User $user);

    public function updateUser(User $user);

}