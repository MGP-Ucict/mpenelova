<?php

namespace Laravelroles\Rolespermissions\Models;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
//use Permission;


class Role extends Model
{
    use Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'is_active',
    ];

   
	protected $table = 'roles';
	public $timestamps=true;
	
	public function routes(){
	//return $this->hasMany('Permission');
	return $this->belongsToMany('Laravelroles\Rolespermissions\Models\Permission', 'permissions_roles', 'role_id', 'permission_id');
	}
	public function users(){
	
	return $this->belongsToMany('Laravelroles\rolespermissions\Models\User');
	}
	public function hasAccess(array $permissions)
    {
        foreach ($permissions as $permission) {
            if ($this->hasPermission($permission))
                return true;
        }
        return false;
    }

    private function hasPermission( $permission)
    {
		$ps= $this->routes()->get();
		foreach($ps as $p){
		if($p->name == $permission)
			return true;
		
		}
        return  false;
    }
}
