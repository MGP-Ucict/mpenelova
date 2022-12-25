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
	protected $dates = ['deleted_at'];
	protected $casts = [
        'is_active' => 'boolean',
    ];
    
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
       return !is_null($this->routes->where('name', $permission)->first());
    }

	public function getCheckedPermissions()
	{
		return $this->routes()->allRelatedIds()->toArray();
	}
}
