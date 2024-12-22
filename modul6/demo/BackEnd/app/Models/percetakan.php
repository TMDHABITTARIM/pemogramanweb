<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class percetakan extends Model
{
    use HasFactory;

    /**
    * Fillable attributes
    *
    * @var array
    */
    protected $fillable = [
        'tipe_cetak','harga_cetak','gambar_cetak'     
    ];

    /**
    * Get percetakan image URL
    *
    * @return Attribute
    */
    protected function  gambar_percetakan(): Attribute
    {
        return Attribute::make(
            get: fn ($gambar_cetak) => $gambar_cetak 
                ? url('/storage/percetakan/' . $gambar_cetak) 
                : null,
        );
    }
}