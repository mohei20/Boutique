<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_infos extends Model
{
    protected $fillable = ['order_id', 'address', 'phone'];
}
