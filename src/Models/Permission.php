<?php

namespace Laravelroles\Rolespermissions\Models;

use Illuminate\Database\Eloquent\Model;


class Permission extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id', 'name', 'route','method',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
	protected $primaryKey = 'id';
	protected $table = 'permissions';
   protected $dates = ['deleted_at'];
	public $timestamps=false;
	
	public function roles()
	{
		return $this->belongsToMany('Laravelroles\Rolespermissions\Models\Role');
	}
}
