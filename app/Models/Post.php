<?php

namespace App\Models;

use App\Traits\HasFormatRupiah;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Laravel\Scout\Searchable;
use Carbon\Carbon;

class Post extends Model
{
    use HasFactory;
    use HasFormatRupiah; 
    use SoftDeletes;
    use Sluggable;
    // use Searchable;

    protected $table = "posts";
    protected $primaryKey = "id";
    protected $fillable = ['nama_barang', 'slug', 'deskripsi', 'jumlah', 'harga', 'harga_total','image'];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama_barang'
            ]
        ];
    }
}
