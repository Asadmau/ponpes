@extends('main')
@section('title', 'Halaman Santri')
@section('content')
<div class="container-fluid">
  <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Santri</h3>
                <div class="card-tools">
                  <a href="{{ route('santri.create') }}" class="btn btn-sm btn-primary">
                    Baru
                  </a>
                </div>
              </div>
              <div class="card-body">
                  @if ($message = Session::get('error'))
                  <div class="alert alert-warning">
                      <p>{{ $message }}</p>
                  </div>
                  @endif
                  @if ($message = Session::get('success'))
                  <div class="alert alert-success">
                      <p>{{ $message }}</p>
                  </div>
                  @endif
                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th width="50px">No</th>
                      <th>NIS</th>
                      <th>Nama</th>
                      <th>Tempat Lahir</th>
                      <th>Tanggal Lahir</th>
                      <th>Jenis Kelamin</th>
                      <th>Tahun Akademik</th>
                      <th style="width: 40px">Action</th>
                    </tr>
                  </thead>
                  @php
                      $no = 1;
                  @endphp
                  <tbody>
                    @foreach ($data as $item)
                    <tr>
                      <td>{{$no}}</td>
                      <td>{{$item->nis}}</td>
                      <td>{{$item->nama_santri}}</td>
                      <td>{{$item->tmp_lahir}}</td>
                      <td>{{$item->tgl_lahir}}</td>
                      <td>{{$item->jenis_kelamin}}</td>
                      <td>{{$item->thn_akademik}}</td>
                      <td>
                        <div class="btn-group">
                            <a class="btn btn-sm btn-primary" href="/santri/{{$item->id}}"><i class="fas fa-folder"></i></a>
                            <a class="btn btn-sm btn-success" href="{{url('santri/'.$item->id.'/edit')}}"><i class="fa fa-edit"></i></a>
                            <form method="POST" action="">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                            </form>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Tahun Akademik</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
          </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
</div>
@endsection