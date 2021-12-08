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
            <form method="post" action="{{route('simpantugas')}}" enctype="multipart/form-data">
                @csrf
            <div class="row mb-5">
                <!--begin::Col-->
                <div class="col-md-6 fv-row">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-bold mb-2">Nama Kelas</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" class="form-control form-control-solid" placeholder="" name="kelas" readonly value="{{$tugas -> KelompokKelas." ".$tugas -> Jurusan." ".$tugas -> NamaKelompokKelas}}"/>
                    <!--end::Input-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-6 fv-row">
                    <!--end::Label-->
                    <label class="required fs-5 fw-bold mb-2">Nama Mapel</label>
                    <!--begin::Select-->
                    <input type="text" class="form-control form-control-solid" placeholder="" name="mapel" readonly value="{{$tugas->Namamapel}}"/>
                    <!--end::Select-->
                </div>
                <!--end::Col-->
            </div>

                @php
                    $segment = base64_decode(request()->segment(3));
                    $split = explode('>', $segment);
                    if($split[5] != 'Tugas'):
                @endphp


            <div class="row mb-5">
                <!--begin::Col-->
                <div class="col-md-6 fv-row">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-bold mb-2">Jenis Komponen</label>
                    <!--end::Label-->
                    <select onchange="isikomponen()" name="jeniskomponen" id="jeniskomponen" class="form-select form-select-solid">
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
                    <select name="komponen" id="komponen" required class="form-select form-select-solid">
                        <option value="" disabled selected>Pilih Komponen...</option>
                    </select>
                    <!--end::Select-->
                </div>
                <!--end::Col-->
            </div>

             @endif

            <div class="row mb-5">
                <div class="col-md-12 fv-row">
                    <!--end::Label-->
                    <label class="required fs-5 fw-bold mb-2">Nama  @php $id = base64_decode(request()->segment(3)); $split = explode('>', $id)  @endphp
                        @if($split[5] == 'Tugas') Tugas @elseif($split[5] == 'Quiz') Quiz
                        @elseif($split[5] == 'Ujian') Ujian @endif</label>
                    <!--begin::Select-->
                    <input type="text" class="form-control form-control-solid" placeholder="" name="namatugas" />
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
                        <input class="form-control" type="datetime-local" required name="tglmulai" id="example-datetime-local-input" />
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
                        <input class="form-control" type="datetime-local" required name="tglselesai"  id="example-datetime-local-input" />
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
                    <textarea type="text" class="form-control form-control-solid" placeholder="" name="keterangan"></textarea>
                    <!--end::Select-->
                </div>

            </div>

            <div class="mb-10">
                <!--begin::Heading-->
                <div class="mb-3">
                    <!--begin::Label-->
                    <label class="d-flex align-items-center fs-5 fw-bold">
                        <span class="required">Silahkan Pilih Salah Satu Jenis Soal yang Akan Diberikan</span>
                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Your billing numbers will be calculated based on your API method"></i>
                    </label>
                    <!--end::Label-->
{{--                    <!--begin::Description-->--}}
{{--                    <div class="fs-7 fw-bold text-muted">If you need more info, please check budget planning</div>--}}
{{--                    <!--end::Description-->--}}
                </div>
                <!--end::Heading-->
                <!--begin::Row-->
                <div class="fv-row">
                    <!--begin::Radio group-->
                    <div class="btn-group w-100" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">
                        <!--begin::Radio-->
                        <label class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-success" data-kt-button="true">
                            <!--begin::Input-->
                            <input class="btn-check" type="radio" name="typesoal"  value="1" />
                            <!--end::Input-->
                            Pilihan Ganda</label>
                        <!--end::Radio-->
                        <!--begin::Radio-->
                        <label class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-success" data-kt-button="true">
                            <!--begin::Input-->
                            <input class="btn-check" type="radio" name="typesoal"  value="2" />
                            <!--end::Input-->
                            Essay</label>
                        <!--end::Radio-->
                        <!--begin::Radio-->
                        <label class="btn btn-outline-secondary text-muted text-hover-white text-active-white btn-outline btn-active-success" data-kt-button="true">
                            <!--begin::Input-->
                            <input class="btn-check" type="radio" name="typesoal" value="3" />
                            <!--end::Input-->
                            Upload File</label>
                        <!--end::Radio-->
                    </div>
                    <!--end::Radio group-->
                </div>
                <!--end::Row-->
            </div>

            <div class="row mb-5" id="cardjmlh" hidden>
                <!--begin::Col-->


                <div class="col-md-12 fv-row">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-bold mb-2">Jumlah Soal</label>
                    <!--end::Label-->
                    <!--begin::Select-->
                    <input type="text" hidden class="form-control form-control-solid" placeholder="Type"  name="jenisSoal" id="jenisSoal">
                    <input type="text" hidden class="form-control form-control-solid" placeholder="master"  name="master" id="master" value="{{request()->segment(3)}}">
                    <input type="number" class="form-control form-control-solid"  oninput="JumlahSoal()"  placeholder="Masukan Jumlah Soal"  name="jmlh" id="jmlh">
                    <!--end::Select-->
                </div>

            </div>

            <div  id="tampilsoal">

            </div>

            <div class="row mb-5" style="padding-top: 10px" >

                <hr />
                <div style="text-align: right">
                    <button type="submit" id="simpantugas" onclick="loadingt()" class="btn btn-primary">
                        <span class="indicator-label">Simpan</span>
                    </button>
                </div>

            </div>
            </form>
        </div>
    </div>


@endsection

<script>
    document.addEventListener('input',(e)=>{

        if(e.target.getAttribute('name')=="typesoal")
            var type = e.target.value
            if(type == 1){
                $('#cardjmlh').prop("hidden", false);
                $('#jenisSoal').val('PG');
                $('#tampilsoal').html("<span></span>");
            }else if(type == 2){
                $('#cardjmlh').prop("hidden", false);
                $('#jenisSoal').val('Essay');
                $('#tampilsoal').html("<span></span>");
            }else if(type == 3){
                 $('#cardjmlh').prop("hidden", true);
                $('#jenisSoal').val('File');
                $("#jmlh").val('');
                $('#tampilsoal').load("{{route('uploadsoalfile')}}");
            }
    });

    function JumlahSoal() {

        var typesoalnya = $("#jenisSoal").val();
        var jumlahnya = $("#jmlh").val();


        if(jumlahnya != '') {

            if (typesoalnya == 'PG') {

                $('#tampilsoal').load("/soalpg/" + jumlahnya);

            } else if (typesoalnya == 'Essay') {

                $('#tampilsoal').load("/soalessay/" + jumlahnya);

            }
        }else {

            $('#tampilsoal').html("<span></span>");
        }

    };

    function isikomponen() {
        var jeniskomponen = $("#jeniskomponen").val();

        var idx = atob('{{request()->segment(3)}}')

        var id = btoa(idx+'>'+jeniskomponen)

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
                    $("#komponen").html('');
                    if (json.code == 200) {
                        for (i = 0; i < Object.keys(json.data).length; i++) {
                            $('#komponen').append($('<option>').text(json.data[i].nama_komponen).attr('value', json.data[i].id));
                        }

                    } else {
                        $('#komponen').append($('<option>').text('Data Kosong / Pilih Jenis Komponen').attr('value', ''));
                    }
                }
            });
        }

    }

    function loadingt() {

        $('#simpantugas').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span> Loading...');

    }

</script>
