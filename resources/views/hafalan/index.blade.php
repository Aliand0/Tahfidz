
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
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($datas as $data)
                        <tr>
                          <td class="py-1">
                          <a href="#">
                            {{$data->kode_transaksi}}
                          </a>
                          </td>
                          <td>

                            {{$data->buku->judul}}

                          </td>

                          <td>
                            {{$data->anggota->nama}}
                          </td>

                          <td>
                        @if($data->status == 'pinjam')
                        <form action="#" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            <button class="btn btn-info btn-xs" onclick="return confirm('Anda yakin data ini sudah kembali?')">Setor Hafalan
                            </button>
                          </form>
                          @else
                          -
                          @endif

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
