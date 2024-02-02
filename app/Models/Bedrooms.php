<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class bedrooms extends Model
{
    use HasFactory;

    public function booking(){
        return $this->hasOne(Booking::class);
    }
    public function category (){
        return $this->belongsTo(Category::class);
    }
}
