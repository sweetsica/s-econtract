<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Location;

class Member extends Model
{
    use HasFactory;
    protected $table ="members";
    protected $guarded = [''];
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
}
