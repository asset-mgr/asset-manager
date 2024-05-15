@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Barang</h4>
                </div>
                <div class="card-body">
                    <div class="col-lg-8">
                        <form method="post" action="save" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <label for="nama_barang" class="form-label">Nama Barang</label>
                                <input type="string" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" name="nama_barang" value="{{ old('nama_barang') }}">
                            </div>
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug" value="" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ old('deskripsi') }}">
                            </div>
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="">
                            </div>
                            <div class="mb-3">
                                <label for="jumlah" class="form-label">Jumlah</label>
                                <input type="text" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah" value="">
                            </div>
                            <div class="mb-3">
                                <label for="harga_total" class="form-label">Harga Total</label>
                                <input type="text" class="form-control" id="harga_total" name="harga_total" value="" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Foto Barang</label>
                                <input class="form-control" type="file" id="image" name="image">
                            </div>
                            <button type="submit" class="btn btn-primary btn-round">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="jquery-3.5.0.min.js"></script>
<script>
    $(document).ready(function(){
        $("#jumlah, #harga").keyup(function() {
            var harga_total = 0;
            var x = parseFloat($("#jumlah").val());
            var y = parseFloat($("#harga").val());
            var harga_total = x * y;

            $('#harga_total').val(harga_total);
        });
    });
</script>
<script>
    const nama_barang = document.querySelector('#nama_barang');
    const slug = document.querySelector('#slug');

    nama_barang.addEventListener('change', function() {
        fetch('/admin.itemIn/createSlug?nama_barang=' + nama_barang.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });
</script>
@endsection
