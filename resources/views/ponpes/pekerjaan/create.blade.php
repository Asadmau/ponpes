@extends('main')
@section('title', 'Pekerjaan')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col col-lg-6 col-md-6">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Form Pekerjaan</h3>
          <div class="card-tools">
            <a href="{{ route('pekerjaan.index') }}" class="btn btn-sm btn-danger">
              Tutup
            </a>
          </div>
        </div>
        <div class="card-body">
            @if (count($errors) > 0)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <div class="message mt-2">
                    <strong>Error -</strong> {{ $errors }}
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
          <form action="{{ route('pekerjaan.store') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="nama_pekerjaan">pekerjaan</label>
              <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" placeholder="Pekerjaan" value="{{ old('pekerjaan') }}" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Simpan</button>
              <button type="reset" class="btn btn-warning">Reset</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection