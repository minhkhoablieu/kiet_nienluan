<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $table = 'sponsors';
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
}
