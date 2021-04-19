<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Request;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasSlug;
    use SoftDeletes;

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    protected $table = 'products';
    protected $fillable = [
        'name',
        'slug',
        'thumbnail',
        'price',
        'amount',
        'user_id',
        'content',
        'active',
        'brand_id'
    ];
    protected $casts = [
        'price' => 'integer'
    ];
    public function getStatusAttribute()
    {
        if ($this->active) {
            return "<input type='checkbox' checked disabled>";
        } else {
            return "<input type='checkbox' disabled>";
        }
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }


    public function getRouteKeyName()
    {
        $segment = Request::segment(1);
        if ($segment === 'writer' || $segment === 'admin' || $segment === 'cart' || Request::ajax()) {
            return 'id';
        } else {
            return 'slug';
        }
    }
    public function getPriceConvertAttribute()
    {
        return number_format($this->price, 0, '', ',');
    }
    public function getCategoryNameAttribute()
    {
        return $this->categories;
    }
    public function getShortNameAttribute()
    {
        return mb_strimwidth($this->name, 0, 40, "...");
    }
    public function scopeCategory($query, $request)
    {
        if ($request->has('category')) {
            return Category::where('slug', $request->get('category'))->first()->products();
        }
        return null;
    }
    public function scopeBrand($query, $request)
    {
        if ($request->has('brand')) {
            return Brand::where('slug', $request->get('brand'))->first()->products();
        }
        return null;
    }
    //
}
