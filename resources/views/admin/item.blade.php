@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List Barang</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    Nama Barang
                                </th>
                                <th>
                                    Deskripsi
                                </th>
                                <th>
                                    Jumlah
                                </th>
                                <th>
                                    Harga
                                </th>
                                <th class="text-right">
                                    Harga Total
                                </th>
                                <th class="text-right">
                                    Status
                                </th>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>
                                            <a @if($post->trashed())
                                                href="admin.itemOut/{{ $post->slug }}"
                                            @else 
                                                href="admin.item/{{ $post->slug }}"
                                            @endif
                                            >{{ $post->nama_barang }}</a>
                                        </td>
                                        <td>
                                            {{ $post->deskripsi }}
                                        </td>
                                        <td>
                                            {{ $post->jumlah }}
                                        </td>
                                        <td>
                                            {{ $post->formatRupiah('harga') }}
                                        </td>
                                        <td class="text-right">
                                            {{ $post->formatRupiah('harga_total') }}
                                        </td>
                                        @if ($post->trashed())
                                            <td class="text-right">
                                                <div class="badge rounded-pill pt-1 text-bg-danger">Drop</div>
                                            </td>
                                        @else
                                        <td class="text-right">
                                            <div class="badge rounded-pill pt-1 text-bg-success">Active</div>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end">
        {{ $posts->links() }}
      </div>
    @endsection

@section('scripts')
@endsection
