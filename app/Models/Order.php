<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class,'order_product')->withPivot("quantity");
    }

}
