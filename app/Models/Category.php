<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory ,SoftDeletes;
    protected $table='categories';
    protected $guarded=[];
    public function category()
    {
        return $this->belongsTo(Category::class,'parent_id');
    }
    public function product()
    {
        return $this->hasMany(Product::class);
    }
public function scopeActive(Builder $builder,$filter){
    if ($filter['search']??false ){
        $builder->where('name','LIKE',"%{$filter['search'] }%");
    }
    if ($filter['status'] ??false){
        $builder->where('status',$filter['status'] );
    }
}

}
