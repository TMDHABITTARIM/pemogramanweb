<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class product extends Model
{
    use HasFactory;

    public $timestamps = false;
    /**
    * Fillable attributes
    *
    * @var array
    */
    protected $fillable = [
        'nama_produk','deskripsi_produk','harga_produk','gambar_produk'
        
    ];

    /**
    * Get cinema image URL
    *
    * @return Attribute
    */
    protected function gambarbarang(): Attribute
    {
        return Attribute::make(
            get: fn ($gambar_produk) => $gambar_produk 
                ? url('/storage/product/' . $gambar_produk) 
                : null,
        );
    }
}
