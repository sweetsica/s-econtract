<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table ="departments";
    protected $fillable = [
        'name',
        'description',
        'location_id',
    ];
    public function location()
    {
        return $this->belongsTo(Local::class,'location_id','id');
    }
    public function members()
    {
        return $this->belongsToMany(Member::class);
    }
}
