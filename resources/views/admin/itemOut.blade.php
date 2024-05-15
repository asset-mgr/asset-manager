@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Barang Keluar</h4>
                </div>
                  <form class="form-row ml-3" method="GET" action="/admin.itemOut/filter">
                  <div class="col-md-6 pt-2">
                    <a href="/exportOut" class="btn btn-success btn-round">
                      <i class="bi bi-download"></i>
                      Excel
                    </a>
                  </div>
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
                        @include('admin.tableOut', $posts)
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
