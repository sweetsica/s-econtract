<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use phpDocumentor\Reflection\Location;

class Member extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table ="members";
    protected $guarded = [''];

    public function partner()
    {
        return $this->hasMany(Partner::class,'id_tdv','member_code') ;
    }
    public function location()
    {
        return $this->belongsTo(Local::class,'location_id','id');
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }
    public function department()
    {
        return $this->belongsToMany(Department::class)->withTimestamps();
    }
    public function parent()
    {
        return $this->belongsTo(Member::class,'parent_id','id');
    }
    public function children()
    {
        return $this->hasMany(Member::class,'parent_id','id');
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
