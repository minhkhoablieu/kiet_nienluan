<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    //
    protected $table = 'banners';
    protected $fillable = [
        'active',
        'image',
        'url',
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
}
