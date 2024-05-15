@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Barang Masuk</h4>
                </div>
                  <form class="form-row ml-3" method="GET" action="/admin.itemIn/filter">
                    @can('admin')
                  <div class="col-md-2 pt-2">
                    <a href="/admin.itemIn/create" class="btn btn-round btn-info">
                      <i class="bi bi-dropbox"></i>
                      Tambah Barang
                    </a>
                  </div>
                  <div class="col-md-4 pt-2">
                    <a href="/exportIn" class="btn btn-success btn-round">
                      <i class="bi bi-download"></i>
                      Excel
                    </a>
                  </div>
                  @else
                  <div class="col-md-6 pt-2">
                    <a href="/exportIn" class="btn btn-success btn-round">
                      <i class="bi bi-download"></i>
                      Excel
                    </a>
                  </div>
                  @endcan
                    <div class="col-md-2">
                      <label for="start_date">Start Date</label>
                      <input type="date" id="start_date" name="start_date" class="form-control">
                    </div>
                    <div class="col-md-2">
                      <label for="end_date">End Date</label>
                      <input type="date" id="end_date" name="end_date" class="form-control">
                    </div>
                    <div class="col-md-1 pt-2">
                      <button type="submit" class="btn btn-primary btn-round">Search</button>
                    </div>
                  </form>
                <div class="card-body">
                    <div class="table-responsive">
                        @include('admin.tableIn', $posts)
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
