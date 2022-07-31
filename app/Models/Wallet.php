<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $hidden = [ 'created_at', 'updated_at'];

    protected $fillable = [
        "priceBuy",
        "title",
        "id_user",
        "quantity",
        "date",
        "device"

    ];
}
