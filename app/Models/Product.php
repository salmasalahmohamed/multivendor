<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $appends=['logo_url'];
    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault();
    }
    public function scopeActive(Builder $builder){
            $builder->where('status','active');
        }
    public function store()
    {
        return $this->belongsTo(Store::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class,'product_tag','product_id','tag_id');
    }
    public  static function booted()
    {
static::addGlobalScope('store',function (Builder $builder){
    if(Auth::user()&&Auth::user()->store_id){
        $builder->where('store_id',Auth::user()->store_id);

    }


})
;}

    public function scopeFilter(Builder $builder,$filters){
        $options=array_merge([
            'store_id'=>null,
            'category_id'=>null,
            'tag_id'=>null,
            'status'=>'active',
        ],$filters);
        $builder->when($options['store_id'],function ($builder,$value){
            return $builder->where('store_id',$value);


        });
        $builder->when($options['category_id'],function ($builder,$value){
            return $builder->where('category_id',$value);
        });
       $builder->when($options['status'],function ($builder,$value){
            return $builder->where('status',$value);
        });

        $builder->when($options['tag_id'],function ($builder,$value){


            $builder->whereHas('tags', function($builder) use ($value){
                $builder->where('id','=',$value);
            });
        });
//


    }

    public function getLogoUrlAttribute($value)
    {
        if (!$this->logo){
            return "https://static.vecteezy.com/system/resources/previews/008/991/031/original/photography-logo-vector.jpg";
        }
        if (Str::startsWith($this->logo,['http://','https://'])){
            return $this->logo;
        }
        ;
        return asset('storage/'.$this->log);
    }
    public  function percent():int
    {

        return $percent=100.0-( 100* $this->price /$this->compare_price );

    }}
