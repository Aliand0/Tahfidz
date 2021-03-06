
@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 50
    });

} );
</script>
@stop
@extends('layouts.app')

@section('content')
<div class="row">


    <div class="col-lg-12">
                  @if (Session::has('message'))
                  <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
                  @endif
                  </div>
</div>
<div class="row" style="margin-top: 20px;">
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">

                <div class="card-body">
                  <h4 class="card-title">Setor Hafalan</h4>

                  <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                            <label for="level" class="col-md-4 control-label">Kelas</label>
                            <div class="col-md-6">
                            <select class="form-control" name="kelas_id" required="">
                              @foreach($kelas as $kls)
                              <option value="{{$kls->id}}">{{$kls->kelas}} {{$kls->tahun}}</option>
                              @endforeach
                            </select>
                            </div>
                        </div>

                  <div class="table-responsive">
                    <table class="table table-striped" id="table">
                      <thead>
                        <tr>
                          <th>
                            Nama
                          </th>
                          <th>
                            Kelas
                          </th>
                          <th class="text-center">
                            Juz
                          </th>
                          <th class="text-center">
                            Halaman
                          </th>
                          <th>
                            Komentar
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($hafalan as $data)
                        <tr>
                          <td class="py-1">
                          <p readonly>
                            {{$data->nama}}
                          </p>
                          </td>
                          <td class="py-1">
                          <p readonly value="{{$kls->id}}">
                                @foreach($kelas as $kls)
                                  @if($data->kelas_id == $kls->id)
                                    {{$kls->kelas}} {{$kls->tahun}}
                                  @endif
                                @endforeach
                          </p>
                          </td>
                          <td class="text-center">

                            {{$data->Juz}}


                          </td>

                          <td class="text-center">
                            {{$data->halaman}}
                          </td>
                          <td>
                            {{$data->komentar}}
                          </td>
                          <td>

                          <a class="btn btn-primary btn-sm" href="{{ route('hafalan.edit', $data->id) }}" role="button">Setor Hafalan </a>


                          </td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
               {{--  {!! $datas->links() !!} --}}
                </div>
              </div>
            </div>
          </div>
@endsection
