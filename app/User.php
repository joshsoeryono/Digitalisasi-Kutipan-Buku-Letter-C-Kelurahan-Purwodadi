<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;
    
    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = ['remember_token'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function getUsers(){
        return DB::table('users')
            ->select('users.id', 'users.nip', 'users.fullname', 'roles.name as rolename', 'users.email')
            ->leftJoin('roles', 'roles.id', '=', 'users.role_id');
    }

    
}
