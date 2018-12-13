
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
                            <select class="form-control" name="level" required="">
                                <option value=""></option>
                                <option value="admin">Admin</option>
                                <option value="guru">Guru</option>
                                <option value="user">User</option>
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
                            Juz
                          </th>
                          <th>
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
                          <a href="#">
                            {{$data->nama}}
                          </a>
                          </td>
                          <td>

                            {{$data->Juz}}

                          </td>

                          <td>
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
