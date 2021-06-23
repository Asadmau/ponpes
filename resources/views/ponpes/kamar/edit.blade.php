@extends('main')
@section('title', 'Halaman Edit Kamar')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col col-lg-6 col-md-6">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">From Edit</h3>
          <div class="card-tools">
            <a href="{{ route('kamar.index') }}" class="btn btn-sm btn-danger">
              Tutup
            </a>
          </div>
        </div>
        <div class="card-body">
          @if(count($errors) > 0)
          @foreach($errors->all() as $error)
              <div class="alert alert-danger">{{ $error }}</div>
          @endforeach
          @endif
          @if ($message = Session::get('error'))
              <div class="alert alert-danger">
                  <p>{{ $message }}</p>
              </div>
          @endif
          @if ($message = Session::get('success'))
              <div class="alert alert-success">
                  <p>{{ $message }}</p>
              </div>
          @endif
          <form action="{{route('kamar.update', $kamar->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="form-group">
              <label for="nama_kamar">Kamar</label>
              <input type="text" name="nama_kamar" id="nama_kamar" value="{{$kamar->nama_kamar}}" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="pengurus_id">Ketua Kamar</label>
              <select name="pengurus_id" id="pengurus_id" class="form-control">
                <option value="" ></option>
                @foreach($pengurus as $value) 			
                <option value="{{ $value->id }}" {{ $kamar->pengurus_id == $value->id ? 'selected' : '' }}>{{ $value->nama_pengurus }}</option>
             @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="jml_lemari">Jumlah Lemari</label>
              <input type="text" name="jml_lemari" value="{{$kamar->jml_lemari}}" id="jml_lemari" class="form-control" required>
            </div>
            {{-- <div class="form-group">
              <label for="no_lemari">No Lemari</label>
              <input type="text" name="no_lemari" id="no_lemari" class="form-control">
            </div> --}}
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