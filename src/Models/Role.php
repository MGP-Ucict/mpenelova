<?php

namespace Laravelroles\Rolespermissions\Models;

use Illuminate\Database\Eloquent\Model;


class Role extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'id',  'name', 'is_active',
    ];

   
	protected $table = 'roles';
	public $timestamps = true;
	
	public function routes()
	{
		return $this->belongsToMany('Laravelroles\Rolespermissions\Models\Permission', 'permissions_roles', 'role_id', 'permission_id');
	}
	
	public function users()
	{
		return $this->belongsToMany('Laravelroles\Rolespermissions\Models\User');
	}
	
	public function hasAccess($permission)
    {
        if ($this->hasPermission($permission)){
            return true;
		}
        return false;
    }

	public function getCheckedPermissions()
	{
		return $this->routes()->allRelatedIds()->toArray();
	}
	
    private function hasPermission($permission)
    {
		$ps = $this->routes()->get();
		foreach($ps as $p){
			if ($p->name == $permission){
				return true;
			}
		}
        return  false;
    }
	
	
}
