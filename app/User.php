<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'is_active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){

        return $this->belongsToMany('App\Role');

    }

    public function isAdmin(){

        foreach ($this->roles as $role){

            if($role->name == "administrator" && $this->is_active == 1){

                return true;

            }

        }


        return false;

    }

    public function isOperator(){

        foreach ($this->roles as $role) {

            if ($role->name == "operator" && $this->is_active == 1) {

                return true;

            }
        }

        return false;

    }
}
