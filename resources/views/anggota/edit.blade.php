@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>
@stop

@extends('layouts.app')

@section('content')

<form action="{{ route('anggota.update', $data->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Ubah Siswa</h4>

                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label for="nama" class="col-md-4 control-label">Nama</label>
                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control" name="nama" value="{{ $data->nama }}" required>
                                @if ($errors->has('nama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('npm') ? ' has-error' : '' }}">
                            <label for="npm" class="col-md-4 control-label">NIS</label>
                            <div class="col-md-6">
                                <input id="nis" type="number" class="form-control" name="nis" value="{{ $data->nis }}" maxlength="8" required>
                                @if ($errors->has('nis'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nis') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                            <label for="level" class="col-md-4 control-label">Jenis Kelamin</label>
                            <div class="col-md-6">
                            <select class="form-control" name="jk" required="">
                                <option value=""></option>
                                <option value="L" {{$data->jk === "L" ? "selected" : ""}}>Laki - Laki</option>
                                <option value="P" {{$data->jk === "P" ? "selected" : ""}}>Perempuan</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('kelas_id') ? ' has-error' : '' }}">
                            <label for="kelas_id" class="col-md-4 control-label">Kelas</label>
                            <div class="col-md-6">
                              <select class="form-control" name="kelas_id" required="">
                                  <option value="">(Cari User)</option>
                                  @foreach($kelas as $kls)
                                      <option value="{{$kls->id}}" {{$kls->id === $kls->id ? "selected" : ""}}>{{$kls->kelas}} {{$kls->tahun}}</option>
                                  @endforeach
                              </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }} " style="margin-bottom: 20px;">
                            <label for="user_id" class="col-md-4 control-label">User Login</label>
                            <div class="col-md-6">
                            <select class="form-control" name="user_id" required="">
                                <option value="">(Cari User)</option>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}" {{$data->user_id === $user->id ? "selected" : ""}}>{{$user->name}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="submit">
                                    Ubah
                        </button>
                        <button type="reset" class="btn btn-danger">
                                    Reset
                        </button>
                        <a href="{{route('anggota.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>
@endsection
