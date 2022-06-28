<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    use HasFactory;
    protected $table ="local";
    protected $fillable = [
        'name',
        'prefix',
        'code',
        'type',
        'parent_id'
    ];
    public function children()
    {
        return $this->hasMany(Local::class, 'parent_id', 'code');
    }
    public function parent()
    {
        return $this->belongsTo(Local::class,'parent_id','code');
    }
    public function scopeSearch($query,$request){
        $parent_id = $request->get('parent_id');
        if($parent_id != null){
            return $query->where("parent_id",$parent_id);
        }
        return $query->where("parent_id","0");
    }
}
