<?php

namespace App\Exports;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ItemInExport implements FromView
{
    public function view(): View
    {
        return view("admin.tableIn",[
            'posts' => Post::all()
        ]);
    }
}
