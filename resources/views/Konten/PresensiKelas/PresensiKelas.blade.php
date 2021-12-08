@extends('Template')
@section('konten')

    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                Jadwal {{ $web['title'] }} Hari Ini
            </div>
            <!--begin::Card title-->
        </div>

        <div class="card-body pt-0">
            <!--begin: Datatable-->
            <div class="table-responsive">
                <table id="cok"  class=" display table table-striped table-bordered nowrap" style="width:100%">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Tanggal</th>
                        <th>Kelas</th>
                        <th>Mata Pelajaran</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $no=1 @endphp
                    @foreach($jadwal as $data)
                        <tr style="height: 40px">
                            <td style="text-align:center;">{{$no++}}</td>
                            <td>{{$data -> Hari}}</td>
                            <td>{{$data -> JamMulai." s/d ".$data->JamSelesai}}</td>
                            <td>{{date('d-m-Y')}}</td>
                            <td> {{$data -> KelompokKelas." ".$data -> Jurusan." ".$data -> NamaKelompokKelas}}</td>
                            <td>{{$data -> Namamapel}}</td>
                            <td>
                                <a type="button" class="btn btn-primary btn-sm" href="{{route('inputabsen',['id' => base64_encode($data->IdKelasBerjalan)])}}" ><i class="fas fa-pen-alt" data-toggle="tooltip" data-placement="top" title="Masukan Absen"></i> Absen</a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
            <!--end: Datatable-->
        </div>


    </div>

@endsection

