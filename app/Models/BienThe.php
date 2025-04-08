<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class BienThe extends Model
{
    use HasFactory;

    protected $table = 'bien_the';

    protected $fillable = [
        'mau',
        'kichco',
        'gia',
        'idsp',
    ];


    public function Product(){
        return $this->belongsTo(Product::class, 'idsp');
    }
}

