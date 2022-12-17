<?php

namespace Laravelroles\Rolespermissions\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable{
    use Notifiable;
    use SoftDeletes;
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id', 'username', 'name', 'email', 'password','is_active',
    ];
	
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	protected $table = 'users';
	protected $dates = ['deleted_at'];
	public $timestamps = true;
	
	public function roles()
	{
		return $this->belongsToMany('Laravelroles\Rolespermissions\Models\Role', 'roles_users', 'user_id', 'role_id');
	}
	
	public function hasAccess($permission)
    {
        // check if the permission is available in any role
        foreach ($this->roles as $role) {
            if($role->hasAccess($permission)) {
                return true;
            }
        }
        return false;
    }
	
	public function ownsModel($model)
	{
		return isset($model->user_id) && $model->user_id === $this->id;
	}
}
