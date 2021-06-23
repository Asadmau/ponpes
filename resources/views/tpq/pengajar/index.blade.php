@extends('main')
@section('title', 'Halaman Data Ustadz')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Ustadz</h3>
                    <div class="card-tools">
                        <a href="{{route('pengajar.create')}}" class="btn btn-sm btn-primary">
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
                                {{-- <th>NIS</th> --}}
                                <th>Nama</th>
                                {{-- <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Jabatan</th>
                                <th>Tahun Akademik</th> --}}
                                <th>Foto</th>
                                <th style="width: 40px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            @foreach ($pengajar as $item)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$item->nama_pengajar}}</td>
                                <td><a href="{{ asset('storage/'.$item->src_pengajar) }}" target="_blank"
                                        rel="noopener noreferrer">Lihat Foto</a></td>
                                {{-- <td><img class="img-fluid" height="200" width="100" src="{{ asset('storage/'.$item->src_pengajar) }}"
                                alt="gambar""></td> --}}
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-sm btn-success"
                                            href="{{url('pengajar/'.$item->id.'/edit')}}"><i class="fa fa-edit"></i></a>
                                        <form method="POST" action="{{route('pengajar.destroy', $item->id)}}">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-sm btn-danger" type="submit"><i
                                                    class="fa fa-trash"></i></button>
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
                                <th>Jabatan</th>
                                <th>Tahun Akademik</th>
                                <th>Foto</th>
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