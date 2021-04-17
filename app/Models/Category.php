<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Request;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends Model
{
    protected $table = 'categories';
    use HasSlug;
    use SoftDeletes;
    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    protected $fillable = [
        'name',
        'slug',
        'image',
        'active',
        'parent_id'
    ];
    public function parent() {
        return $this->belongsTo('App\Models\Category', 'parent_id');
    }
    public function children()
    {
        return $this->hasMany('App\Models\Category', 'parent_id');
    }
    public function getStatusAttribute()
    {
        if($this->active)
        {
            return "<span class='badge bg-success'>Kích hoạt</span>";
        }else{
            return "<span class='badge bg-danger'>Không kích hoạt</span>";

        }
    }


    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return Request::segment(1) === 'admin' ? 'id' : 'slug';
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }
}
