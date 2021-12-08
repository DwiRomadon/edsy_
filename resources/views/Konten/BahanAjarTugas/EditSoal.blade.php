@extends('Template')
@section('konten')

    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
        {{--            <div class="card-title">--}}
        {{--                Data {{ $web['title'] }}--}}
        {{--            </div>--}}
        <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">

            </div>
            <!--end::Card toolbar-->
        </div>

        <div class="card-body pt-0">
            <form method="post" action="{{route('simpaneditsoal', ['id' => base64_encode($tugas->id.'>'.$tugas->type)])}}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">Nama Kelas</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" placeholder="" name="kelas" readonly value="{{$kelas -> KelompokKelas." ".$kelas -> Jurusan." ".$kelas -> NamaKelompokKelas}}"/>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">Nama Mapel</label>
                        <!--begin::Select-->
                        <input type="text" class="form-control form-control-solid" placeholder="" name="mapel" readonly value="{{$kelas->Namamapel}}"/>
                        <!--end::Select-->
                    </div>
                    <!--end::Col-->
                </div>

                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">Jenis Komponen</label>
                        <!--end::Label-->
                        <select onchange="isikomponenE()" name="jeniskomponenE" id="jeniskomponenE" class="form-select form-select-solid">
                            <option value="" disabled selected>Pilih Jenis Komponen...</option>
                            <option>Pengetahuan</option>
                            <option>Keterampilan</option>
                        </select>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">Pilih Komponen</label>
                        <!--begin::Select-->
                        <select name="komponenE" id="komponenE" required class="form-select form-select-solid">
                            <option value="{{$tugas->id_komponen_nilai}}">{{$komponen->nama_komponen}}</option>
                            <option value="" disabled>Pilih Komponen...</option>
                        </select>
                        <!--end::Select-->
                    </div>
                    <!--end::Col-->
                </div>

                <div class="row mb-5">
                    <div class="col-md-12 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">Nama Tugas</label>
                        <!--begin::Select-->
                        <input type="text" class="form-control form-control-solid" placeholder="" value="{{$tugas->nama_tugas}}" name="namatugas" />
                        <!--end::Select-->
                    </div>
                </div>
                <div class="row mb-5">
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <label class="required fs-6 fw-bold mb-2">Tanggal Mulai</label>
                        <!--begin::Input-->
                        <div class="position-relative d-flex align-items-center">
                            <!--begin::Icon-->
                            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                            <!--begin::Datepicker-->
                            <input class="form-control" type="datetime-local" required name="tglmulai" value="{{str_replace(' ','T',$tugas->tgl_mulai)}}" id="example-datetime-local-input" />
                            <!--end::Datepicker-->
                        </div>
                        <!--end::Input-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-md-6 fv-row">
                        <!--end::Label-->
                        <label class="required fs-5 fw-bold mb-2">Tanggal Selesai</label>
                        <!--begin::Select-->
                        <div class="position-relative d-flex align-items-center">
                            <!--begin::Icon-->
                            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                            <!--begin::Datepicker-->
                            <input class="form-control" type="datetime-local" required name="tglselesai" value="{{str_replace(' ','T',$tugas->tgl_selesai)}}" id="example-datetime-local-input" />
                            <!--end::Datepicker-->
                        </div>
                        <!--end::Select-->
                    </div>
                    <!--end::Col-->
                </div>

                <div class="row mb-5">
                    <!--begin::Col-->


                    <div class="col-md-12 fv-row">
                        <!--begin::Label-->
                        <label class="required fs-5 fw-bold mb-2">Keterangan</label>
                        <!--end::Label-->
                        <!--begin::Select-->
                        <textarea type="text" class="form-control form-control-solid" placeholder="" name="keterangan">{{$tugas->keterangan}}</textarea>
                        <!--end::Select-->
                    </div>

                </div>


                <div>
                    @if($tugas->type == 'PG')

                        @php $no = 1 @endphp
                        @foreach($soal as $data)
                            <div class="row mb-5">
                                <!--begin::Col-->


                                <div class="col-md-12 fv-row">
                                    <!--begin::Label-->
                                    <label class="required fs-5 fw-bold mb-2">Soal {{$no++}}</label>
                                    <!--end::Label-->
                                    <!--begin::Select-->
                                    <textarea type="text" class="form-control form-control-solid" placeholder="Masukan Soal" name="soal_{{$data->id}}">{{$data->soal}} </textarea>
                                    <!--end::Select-->
                                </div>

                            </div>

                            <div class="row mb-5">
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row">
                                    <div class="position-relative d-flex align-items-center">
                                        <!--begin::Icon-->
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                        <span class="svg-icon svg-icon-2 position-absolute mx-4"><b>A.</b></span>
                                        <!--end::Svg Icon-->
                                        <!--end::Icon-->
                                        <!--begin::Datepicker-->
                                        <input class="form-control form-control-solid ps-12" value="{{$data->pilihan_a}}" placeholder="Pilihan A" name="jwb_{{$data->id}}_a" />
                                        <!--end::Datepicker-->
                                    </div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row">
                                    <div class="position-relative d-flex align-items-center">
                                        <!--begin::Icon-->
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                        <span class="svg-icon svg-icon-2 position-absolute mx-4"><b>B</b></span>
                                        <!--end::Svg Icon-->
                                        <!--end::Icon-->
                                        <!--begin::Datepicker-->
                                        <input class="form-control form-control-solid ps-12" placeholder="Pilihan B" value="{{$data->pilihan_b}}" name="jwb_{{$data->id}}_b" />
                                        <!--end::Datepicker-->
                                    </div>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-5">
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row">
                                    <div class="position-relative d-flex align-items-center">
                                        <!--begin::Icon-->
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                        <span class="svg-icon svg-icon-2 position-absolute mx-4"><b>C</b></span>
                                        <!--end::Svg Icon-->
                                        <!--end::Icon-->
                                        <!--begin::Datepicker-->
                                        <input class="form-control form-control-solid ps-12" placeholder="Pilihan C" value="{{$data->pilihan_c}}" name="jwb_{{$data->id}}_c" />
                                        <!--end::Datepicker-->
                                    </div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row">
                                    <div class="position-relative d-flex align-items-center">
                                        <!--begin::Icon-->
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                        <span class="svg-icon svg-icon-2 position-absolute mx-4"><b>D</b></span>
                                        <!--end::Svg Icon-->
                                        <!--end::Icon-->
                                        <!--begin::Datepicker-->
                                        <input class="form-control form-control-solid ps-12" placeholder="Pilihan D" value="{{$data->pilihan_d}}" name="jwb_{{$data->id}}_d" />
                                        <!--end::Datepicker-->
                                    </div>
                                </div>
                                <!--end::Col-->
                            </div>
                            <div class="row mb-5">
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row">
                                    <div class="position-relative d-flex align-items-center">
                                        <!--begin::Icon-->
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                        <span class="svg-icon svg-icon-2 position-absolute mx-4"><b>E</b></span>
                                        <!--end::Svg Icon-->
                                        <!--end::Icon-->
                                        <!--begin::Datepicker-->
                                        <input class="form-control form-control-solid ps-12" placeholder="Pilihan E" value="{{$data->pilihan_e}}" name="jwb_{{$data->id}}_e" />
                                        <!--end::Datepicker-->
                                    </div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-6 fv-row">
                                    <div class="position-relative d-flex align-items-center">
                                        <!--begin::Icon-->
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                        <span class="svg-icon svg-icon-2 position-absolute mx-4"><i class="fas fa-key"></i></span>
                                         <input class="form-control form-control-solid ps-12" value="{{$data->jawaban_benar}}" placeholder="Masukan Kunci Jawaban Ex: A " name="kunci_{{$data->id}}" />

                                    </div>
                                </div>
                                <!--end::Col-->
                            </div>


                        @endforeach

                    @elseif($tugas->type == 'Essay')
                        @php $no = 1 @endphp
                        @foreach($soal as $data)
                            <div class="row mb-5">
                                <!--begin::Col-->


                                <div class="col-md-12 fv-row">
                                    <!--begin::Label-->
                                    <label class="required fs-5 fw-bold mb-2">Soal {{$no++}}</label>
                                    <!--end::Label-->
                                    <!--begin::Select-->
                                    <textarea type="text" class="form-control form-control-solid" rows="3" placeholder="Masukan Soal" name="soal[]">{{$data->soal}}</textarea>

                                    <input type="text" hidden class="form-control form-control-solid"  name="idsoal[]" value="{{$data->id}}">
                                    <!--end::Select-->

                                </div>

                            </div>
                        @endforeach

                    @elseif($tugas->type == 'File')
                        @foreach($soal as $data)
                        <div class="row mb-5" style="padding-top: 20px">
                            <!--begin::Col-->

                            <div class="col-md-12 fv-row">

                                <a  href='{{route('downloadfiletugas', ['id' => $tugas->id])}}'>
                                <img style="width: 3%" src='{{asset('theme2/gambar/cloud-computing.png')}}' >
                               <b> Klik Disini Untuk Mengunduh File</b>
                                </a>

                            </div>
                            <div style="padding-top: 20px"></div>
                            <div class="col-md-12 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-5 fw-bold mb-2">Silakan Upload File Tugas Jika Ada Perubahan</label>
                                <!--end::Label-->
                                <!--begin::Select-->
                                <input type="file" class="form-control form-control-solid"  name="soal_file">

                                <input type="text" hidden class="form-control form-control-solid"  name="idsoal" value="{{$data->id}}">
                                <input type="text" hidden class="form-control form-control-solid"  name="filelawas" value="{{$data->file}}">

                                <!--end::Select-->

                            </div>

                        </div>
                        @endforeach
                    @endif
                </div>

                <div class="row mb-5" style="padding-top: 10px" >

                    <hr />
                    <div style="text-align: right">
                        <button type="submit" id="simpantugasE" onclick="loadingtx()" class="btn btn-primary">
                            <span class="indicator-label">Simpan</span>
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>


@endsection

<script>
    function isikomponenE() {
        var jeniskomponen = $("#jeniskomponenE").val();

        var kode = '{{$kelas->NIP}}'+'>'+'{{$kelas->idMapel}}'+'>'+'{{$kelas->Tahun}}'+'>'+'{{$kelas->Semester}}'+'>'+'{{$kelas->idkelompokkls}}'+'>'+'Imam'
        var id = btoa(kode+'>'+jeniskomponen)

        if(jeniskomponen == ''){
            console.log('pilih jenis komponen')
        }else{
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{route('pilihkomponen')}}',
                data: {id : id},
                type: 'POST',
                // cache: false,
                dataType: 'json',
                success: function(json) {
                    // console.log(json)
                    $("#komponenE").html('');
                    if (json.code == 200) {
                        for (i = 0; i < Object.keys(json.data).length; i++) {
                            $('#komponenE').append($('<option>').text(json.data[i].nama_komponen).attr('value', json.data[i].id));
                        }

                    } else {
                        $('#komponenE').append($('<option>').text('Data Kosong / Pilih Jenis Komponen').attr('value', ''));
                    }
                }
            });
        }

    }
</script>
