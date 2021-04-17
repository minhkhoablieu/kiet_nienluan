<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    const DA_NHAN_HANG = 'da-nhan-hang';
    const DANG_GIAO_HANG = 'dang-giao-hang';
    const CHUA_XU_LY = 'chua-xu-ly';
    public function orders()
    {
        return $this->hasMany(Order::class, 'status_id');
    }
}
