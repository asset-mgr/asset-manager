<?php

namespace App\Imports;

use App\Models\Post;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class PostImport implements ToModel, WithHeadingRow,WithCalculatedFormulas
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Post([
            'nama_barang' => $row['nama_barang'],
            'slug' => $row['slug'],
            'deskripsi' => $row['deskripsi'],
            'harga' => $row['harga'],
            'jumlah' => $row['jumlah'],
            'harga_total' => $row['harga_total'],
        ]);
    }
}
