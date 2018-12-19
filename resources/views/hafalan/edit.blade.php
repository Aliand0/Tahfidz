@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>
@stop

@extends('layouts.app')

@section('content')

<form action="{{ route('hafalan.update', $data->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Setor Hafalan</h4>

                        <div class="card" style="width: 18rem;">
                          <div class="card-body">
                            <h5 class="card-title">Nama : {{ $data->nama }}</h5>
                            
                          </div>
                        </div>
                        <div class="form-group{{ $errors->has('Juz') ? ' has-error' : '' }}">
                            <label for="Juz" class="col-md-4 control-label">Juz</label>
                            <div class="col-md-6">
                                <input id="Juz" type="number" class="form-control" name="Juz" value="{{ $data->Juz }}" maxlength="8" required>
                                @if ($errors->has('Juz'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Juz') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('halaman') ? ' has-error' : '' }}">
                            <label for="halaman" class="col-md-4 control-label">Halaman</label>
                            <div class="col-md-6">
                                <input id="halaman" type="number" class="form-control" name="halaman" value="{{ $data->halaman }}" maxlength="8" required>
                                @if ($errors->has('Halaman'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Halaman') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('komentar') ? ' has-error' : '' }}">
                            <label for="komentar" class="col-md-4 control-label">komentar</label>
                            <div class="col-md-6">
                                <input id="komentar" type="text" class="form-control" name="komentar" value="{{ $data->komentar }}">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" id="submit">
                                    Ubah
                        </button>
                        <button type="reset" class="btn btn-danger">
                                    Reset
                        </button>
                        <a href="{{route('hafalan.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>
@endsection
