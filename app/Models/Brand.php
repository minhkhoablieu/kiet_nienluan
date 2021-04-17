<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';
    protected $fillable = [
        'name',
        'image',
        'active',
        'website',
        'order'
    ];

    public function getStatusAttribute()
    {
        if($this->active)
        {
            return "<span class='badge bg-success'>Kích hoạt</span>";
        }else{
            return "<span class='badge bg-danger'>Không kích hoạt</span>";

        }
    }
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
