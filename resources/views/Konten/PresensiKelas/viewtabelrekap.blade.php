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
                        <th>Tahun Ajaran</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $no=1 @endphp
                    @foreach($rkjadwal as $data)
                        <tr style="height: 40px">
                            <td style="text-align:center;">{{$no++}}</td>
                            <td>{{$data -> Hari}}</td>
                            <td>{{$data -> JamMulai." s/d ".$data->JamSelesai}}</td>
                            <td>{{date('d-m-Y')}}</td>
                            <td> {{$data -> KelompokKelas." ".$data -> Jurusan." ".$data -> NamaKelompokKelas}}</td>
                            <td>{{$data -> Namamapel}}</td>
                            <td>{{$data -> Tahun." ".$data->Semester}}</td>
                            <td>
                                <a type="button" class="btn btn-primary btn-sm" href="{{route('inputabsen',['id' => base64_encode($data->IdKelasBerjalan)])}}" ><i class="fas fa-user-check" data-toggle="tooltip" data-placement="top" title="Lihat Detail"></i> Detail</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                   
                </table>
            </div>


            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
            <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
            <script>
                $(document).ready(function() {
                    $('#cok').DataTable({
                        responsive: true
                    });

                } );
            </script>