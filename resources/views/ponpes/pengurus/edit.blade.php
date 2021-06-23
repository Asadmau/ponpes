@extends('main')
@section('title', 'Halaman Edit')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8">
            <!-- general form elements  -->
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Data Edit</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if(count($errors) > 0)
                    @foreach($errors->all() as $error)
                    <div class="alert alert-warning">{{ $error }}</div>
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
                    <form method="post" action="{{route('pengurus.update', $data->id)}}">
                    @csrf
                    @method('patch')
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label for="nama_pengurus">Nama</label>
                                <input type="text" class="form-control" name="nama_pengurus" id="nama_pengurus" value="{{$data->nama_pengurus}}" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nis">NISN</label>
                                <input type="text" class="form-control" name="nis" id="nis" value="{{$data->nis}}" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="tmp_lahir">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir"
                                    value="{{$data->tmp_lahir}}" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="thn_lahir">Tanggal Lahir</label>
                                <input type="date" name="thn_lahir" id="thn_lahir" class="form-control"
                                    value="{{$data->thn_lahir}}" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label" for="jns_kelamin">Jenis Kelamin *</label>
                                <select name="jns_kelamin" id="jns_kelamin" class="form-control" required>
                                    <option value="" {{old('jns_kelamin') == '' ? 'selected':''}}>{{$data->jns_kelamin}}
                                    </option>
                                    <option value="L" {{old('jns_kelamin') == 'L' ? 'selected':''}}>L</option>
                                    <option value="P" {{old('jns_kelamin') == 'P' ? 'selected':''}}>P</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <input type="text" name="jabatan" id="jabatan" class="form-control"
                                    value="{{$data->jabatan}}" required>
                            </div>
                        </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- textarea -->
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" 
                                rows="3" required>{{$data->alamat}}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="thn_akademik">Tahun Akademik</label>
                            <input type="text" name="thn_akademik" id="thn_akademik" class="form-control"
                                value="{{$data->thn_akademik}}" required>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xs-12">
                        <div class="form-group {{ $errors->has('src_pengurus') ? 'has-error' :'' }}">
                            <label class="control-label">Unggah Foto Santri</label>
                            <input name="src_pengurus" type="file" accept="storage/*" onchange="preSantri(event)">
                            <span class="help-block">{{$errors->first('src_pengurus')}}</span>
                        </div>
                        <div class="row">
                            <?php 
                                $santri = ($data->src_pengurus == NULL) ? 'default.png':$data->src_pengurus;
                            ?>
                            <div class="col-lg-4 col-xs-12">
                                <img class="img-fluid" height="200" width="100" id="previewSantri" src="#" onerror="this.onerror=null;this.src='{{asset('storage/'.$santri)}}';">        
                            </div>
                        </div>        
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 mt-2">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
</div>
</div>


@endsection