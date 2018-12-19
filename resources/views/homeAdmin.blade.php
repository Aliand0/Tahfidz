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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<div class="row">
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-update text-danger icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Jam</p>
                      <div class="fluid-container">

                        <h3 class="font-weight-medium text-right mb-0">
                        <?php
                          date_default_timezone_set('Asia/Jakarta');
                          $jam=date("H:i");
                          echo  $jam." "."</b>";
                          $a = date ("H");?>
                        </h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                  <i class="mdi mdi-update mr-1" aria-hidden="true"></i>
  <?php function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);

	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun

	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

echo tgl_indo(date('Y-m-d'));
?>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-home text-warning icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Jumlah Kelas</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">{{$jmlkelas}}</h3>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                    <i class="mdi mdi-home-account text-info icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Jumlah Guru</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">{{$jmlguru}}</h3>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-account-location text-info icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Jumlah Siswa</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">{{$jmlsiswa}}</h3>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
</div>
<div class="row" >
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">

                <div class="card-body">
                  <h4 class="card-title">Grafik Hafalan Siswa Perkelas</h4>
                  <canvas id="myChart" width="400" height="100"></canvas>
                    <script>
                    var ctx = document.getElementById("myChart");
                    var myChart = new Chart(ctx, {
                      type: 'bar',
                      data: {
                          labels: ["!0 Boarding", "10 non-Boarding", "11 Boarding", "11 non-Boarding", "12 Boarding", "12 non-Boarding"],
                          datasets: [{
                              label: '# of Votes',
                              data: [{{$A_fix}}, {{$B_fix}}, {{$C_fix}}, {{$D_fix}}, {{$E_fix}}, {{$F_fix}}],
                              backgroundColor: [
                                  'rgba(255, 99, 132, 0.2)',
                                  'rgba(54, 162, 235, 0.2)',
                                  'rgba(255, 206, 86, 0.2)',
                                  'rgba(75, 192, 192, 0.2)',
                                  'rgba(153, 102, 255, 0.2)',
                                  'rgba(255, 159, 64, 0.2)'
                              ],
                              borderColor: [
                                  'rgba(255,99,132,1)',
                                  'rgba(54, 162, 235, 1)',
                                  'rgba(255, 206, 86, 1)',
                                  'rgba(75, 192, 192, 1)',
                                  'rgba(153, 102, 255, 1)',
                                  'rgba(255, 159, 64, 1)'
                              ],
                              borderWidth: 1
                          }]
                      },
                      options: {
                          scales: {
                              yAxes: [{
                                  ticks: {
                                      beginAtZero:true
                                  }
                              }]
                          }
                      }
                    });
                    </script>
                    <br><br>
                    <h4 class="card-title">Info Surat Al-Qur'an</h4>

                    <table class="table table-striped">

    <thead>
      <tr>
        <th scope="col"><b>Juz</th>
        <th scope="col"><b>Surat</th>
        <th scope="col"><b>Juz</th>
        <th scope="col"><b>Surat</th>

      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Al Fatihah 1</td>
        <td>16</td>
        <td>Al Kahfi 75</td>
      </tr>
      <tr>
        <td>2</td>
        <td>Al Baqarah 142</td>
        <td>17</td>
        <td>Al Anbiyaa' 1</td>
      </tr>
      <tr>
        <td>3</td>
        <td>Al Baqarah 253</td>
        <td>18</td>
        <td>Al Mu'minuun 1</td>
      </tr>
      <tr>
        <td>4</td>
        <td>Ali 'Imran 92</td>
        <td>19</td>
        <td>Al Furqaan 21</td>
      </tr>
      <tr>
        <td>5</td>
        <td>An Nisaa' 24</td>
        <td>20</td>
        <td>An Naml 60</td>
      </tr>
      <tr>
        <td>6</td>
        <td>An Nisaa' 148</td>
        <td>21</td>
        <td>Al 'Ankabuut 45</td>
      </tr>
      <tr>
        <td>7</td>
        <td>Al Maa-idah 83</td>
        <td>22</td>
        <td>Al Ahzab 31</td>
      </tr>
      <tr>
        <td>8</td>
        <td>Al An'aam 11</td>
        <td>23</td>
        <td>Yaasiin 22</td>
      </tr>
      <tr>
        <td>9</td>
        <td>Al A'raaf 88</td>
        <td>24</td>
        <td>Az Zumar 32</td>
      </tr>
      <tr>
        <td>10</td>
        <td>Al Anfaal 41</td>
        <td>25</td>
        <td>Fushshilat 47</td>
      </tr>
      <tr>
        <td>11</td>
        <td>At Taubah 94</td>
        <td>26</td>
        <td>Al Ahqaaf 1</td>
      </tr>
      <tr>
        <td>12</td>
        <td>Huud 6</td>
        <td>27</td>
        <td>Adz Dzaariyaat 31</td>
      </tr>
      <tr>
        <td>13</td>
        <td>Yusuf 53</td>
        <td>28</td>
        <td>Al Mujaadilah 1</td>
      </tr>
      <tr>
        <td>14</td>
        <td>Al Hijr 2</td>
        <td>29</td>
        <td>Al Mulk 1</td>
      </tr>
      <tr>
        <td>15</td>
        <td>Al Israa' 1</td>
        <td>30</td>
        <td>An Naba' 1</td>
      </tr>

    </tbody>
  </table>
</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection
