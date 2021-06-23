@extends('main')
@section('title', 'Buat Baru ')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8">
            <!-- general form elements  -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Formulir Pendaftaran</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" placeholder="Nama Santri" >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>NISN</label>
                        <input type="text" class="form-control" placeholder="NISN" >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" class="form-control" placeholder="Tempat Lahir" >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control" placeholder="Tanggal Lahir" >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <input type="text" class="form-control" placeholder="Jenis Kelamin" >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Jenjang</label>
                        <input type="text" class="form-control" placeholder="Jenjang" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" rows="3" placeholder="Alamat" ></textarea>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Kamar</label>
                        <input type="text" class="form-control" placeholder="Nama Kamar" >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Tahun Akademik</label>
                        <input type="text" class="form-control" placeholder="Tahun Akademik" >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Ayah</label>
                        <input type="text" class="form-control" placeholder="Nama Ayah" >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Ibu</label>
                        <input type="text" class="form-control" placeholder="Nama IBU" >
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Nomer HP/WA</label>
                        <input type="text" class="form-control" placeholder="No HP/WA" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-sm-6">
                        <div class="form-group ">
                            <label class="control-label">Unggah Foto Santri</label>
                            <input name="src_photo" type="file" accept="image/*" onchange="preSantri(event)">
                            <span class="help-block"></span>
                        </div>
                  </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label">Unggah Foto Ayah</label>
                        <input name="src_photo_ayah" type="file" accept="image/*" onchange="preAyah(event)">
                        <span class="help-block"></span>
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
</div>
@endsection