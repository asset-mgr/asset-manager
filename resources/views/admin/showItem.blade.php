@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-7">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> {{ $post->nama_barang }}</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Nama Barang</th>
                                <td>{{ $post->nama_barang }}</td>
                            </tr>
                            <tr>
                                <th>Deskripsi</th>
                                <td>{{ $post->deskripsi }}</td>
                            </tr>
                            <tr>
                                <th>Jumlah</th>
                                <td>{{ $post->jumlah }}</td>
                            </tr>
                            <tr>
                                <th>Harga</th>
                                <td>{{ $post->formatRupiah('harga') }}</td>
                            </tr>
                            <tr>
                                <th>Harga Total</th>
                                <td>{{ $post->formatRupiah('harga_total') }}</td>
                            </tr>
                        </table>
                    </div>
                    @can('admin')
                    <div class="row">
                        <div class="col-sm">
                            <a href="/admin.item/edit{{ $post->id }}" class="btn btn-primary btn-round">
                                <i class="bi bi-pencil-square"></i>
                                Ubah
                            </a>
                        </div>
                        <div class="col-sm">
                            <a href="/admin.item/delete{{ $post->id }}" class="btn btn-secondary btn-round">
                                <i class="bi bi-x-circle"></i>
                                Keluarkan
                            </a>
                        </div>
                    </div>
                    @endcan
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            @if ($post->image)
                <div class="card" style="width: 18rem; max-height: 400px; overflow:hidden">
                    <img src={{ asset("storage/".$post->image) }} class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->nama_barang }}</h5>
                        <p class="card-text">{{ $post->deskripsi }}</p>
                    </div>
                </div>
            @else
                <div class="card" style="width: 18rem;">
                    <img src={{ asset("storage/image-2935360_1920.png") }} class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->nama_barang }}</h5>
                        <p class="card-text">{{ $post->deskripsi }}</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('script')
@endsection
