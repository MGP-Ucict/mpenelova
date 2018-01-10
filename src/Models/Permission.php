<?php

namespace Laravelroles\Rolespermissions\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;


class Permission extends Model
{
    use Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'route','is_active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
	protected $primaryKey = 'id';
	protected $table = 'permissions';
	public $timestamps=false;
	
	public function roles(){
	
	return $this->belongsToMany('Laravelroles\Rolespermissions\Models\Role');
	}
}
