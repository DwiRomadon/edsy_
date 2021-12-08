@extends('Template')
@section('konten')

    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                Data {{ $web['title'] }}
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">

            </div>
            <!--end::Card toolbar-->
        </div>

        <div class="card-body pt-0">



            <!--begin::Table-->
            <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <br />
                <div class="table-responsive">
                    <table id="cok"  class=" display table table-striped table-bordered nowrap" style="width:100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Mapel</th>
                            <th>Judul Bab / Materi</th>
                            <th>Keterangan</th>
                            <th>Tingkat Kelas</th>
                            <th>Judul File</th>
                            <th>Unduh File</th>
                            <th>Judul Video</th>
                            <th>Play Video</th>
                            <th>Status Aktif</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @php $no=1 @endphp
                        @foreach($materi as $data)
                            <tr style="height: 40px">
                                <td style="text-align: center">{{$no++}}</td>
                                <td>{{$data->Namamapel}}</td>
                                <td>{{$data->judul}}</td>
                                <td>{{$data->keterangan}}</td>
                                <td style="text-align: center">Kelas {{$data->tingkat_kelas}}</td>
                                <td>{{$data->judul_file}}</td>
                                <td style="text-align: center">
                                    @php
                                        if ($data->file != '' || $data->file != Null){

                                            echo  "<a  href='".route('downloadmateri', ['id' => $data->idfile])."'>
                                            <img style='width:22.5%;' src='".asset('theme2/gambar/cloud-computing.png')."' ></a> ";
                                        }
                                    @endphp
                                </td>
                                <td>{{$data->judul_video}}</td>
                                <td style="text-align: center">
                                    @php
                                        if ($data->link != '' || $data->link != Null){

                                            echo  "<a  href='javascript:void(0)' class='video' onclick='openplay(".$data->idvideo.")'>
                                            <img style='width:22.5%;' src='".asset('theme2/gambar/play.png')."' ></a> ";
                                        }
                                    @endphp
                                </td>
                                <td style="text-align: center">
                                    @if($data->aktiv == true || $data->aktiv == 1)
                                        <img src="{{asset('theme2/gambar/checklist.png')}}">
                                    @else
                                        <img src="{{asset('theme2/gambar/cancel.png')}}">
                                    @endif
                                 </td>
                                <td>
                                    <a href="#" style="background-color: deepskyblue; color: white" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">Action
                                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-down.svg-->
                                        <span class="svg-icon svg-icon-5 m-0">
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<polygon points="0 0 24 0 24 24 0 24"></polygon>
																	<path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"></path>
																</g>
															</svg>
														</span>
                                        <!--end::Svg Icon--></a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="javascript:void(0)" class="menu-link px-3" onclick="showModalEditMateri('{{$data->id.'q'.$data->idfile.'q'.$data->idvideo}}')">Ubah</a>
                                        </div>
                                        <div class="menu-item px-3">
                                            <a href="{{route('hapusmateri', ['id' => base64_encode($data->id.'>'.$data->file.'>'.$data->idfile.'>'.$data->idvideo)])}}" class="menu-link px-3">Hapus</a>
                                        </div>
                                        <!--end::Menu item-->

                                    </div>
                                    <!--end::Menu-->
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <!--end::Table-->
        </div>

    </div>



    <!--begin::Modal - New Target-->
    <div class="modal fade" id="editMateri" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content rounded">
                <!--begin::Modal header-->
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
															<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
														</svg>
													</span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    <!--begin:Form-->
                    <form method="post" action="{{route('simpaneditmateri')}}" enctype="multipart/form-data">
                    @csrf
                    <!--begin::Heading-->
                        <div class="mb-13 text-center">
                            <!--begin::Title-->
                            <h1 class="mb-3">Ubah Materi</h1>
                            <!--end::Title-->
                        {{--                            <!--begin::Description-->--}}
                        {{--                            <div class="text-muted fw-bold fs-5">Input Komponen Nilai Keterampilan.</div>--}}
                        <!--end::Description-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Input group-->
                        <div class="row mb-5">
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-5 fw-bold mb-2">Tingkat Kelas</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select name="etkelas" id="etkelas" class="form-select form-select-solid" required>
                                    <option value="" disabled selected>Pilih Tingkat Kelas...</option>
                                    @foreach($kelas as $data)
                                        <option value="{{$data->KelompokKelas}}">{{$data->KelompokKelas}}</option>
                                    @endforeach
                                </select>
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <!--end::Label-->
                                <label class="required fs-5 fw-bold mb-2">Nama Mapel</label>
                                <!--begin::Select-->
                                <select name="emapel" required id="emapel" class="form-select form-select-solid">
                                    <option value="">Silahkan Pilih Mapel...</option>
                                    @foreach($mapel as $data)
                                        <option value="{{$data->idMapel}}">{{$data->Namamapel}}</option>
                                    @endforeach
                                </select>
                                <!--end::Select-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <div class="row mb-5">
                            <!--begin::Col-->


                            <div class="col-md-12 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-5 fw-bold mb-2">Materi /Bab</label>
                                <!--end::Label-->
                                <!--begin::Select-->
                                <input type="text" id="ebab" required class="form-control form-control-solid" placeholder="" name="ebab"/>
                                <!--end::Select-->
                            </div>
                            <div class="col-md-12 fv-row">
                                <!--begin::Label-->
                                <label  class="required fs-5 fw-bold mb-2">Keterangan</label>
                                <!--end::Label-->
                                <!--begin::Select-->
                                <textarea type="text" id="eketerangan" required rows="3" class="form-control form-control-solid" placeholder="" name="eketerangan"></textarea>
                                <!--end::Select-->
                            </div>
                            <br />
                        </div>

                    <div class="row mb-5">
                        <div class="col-md-12 fv-row">
                            <div class="d-flex align-items-center">
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-custom form-check-solid me-10">
                                    <input class="form-check-input h-20px w-20px" type="radio" id="rcheckfile"  name="status" value="true" checked />
                                    <span class="form-check-label fw-bold">Aktif</span>
                                </label>
                                <!--end::Checkbox-->
                                <!--begin::Checkbox-->
                                <label class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input h-20px w-20px" type="radio"  id="rchecklink" name="status" value="false" />
                                    <span class="form-check-label fw-bold">Non-Aktif</span>
                                </label>
                                <!--end::Checkbox-->
                            </div>
                        </div>

                    </div>

                        <div class="row mb-5">
                            <hr />
                            <div class="col-md-12 fv-row">
                                <!--begin::Label-->
                                <label class=" fs-5 fw-bold mb-2">Judul File</label>
                                <!--end::Label-->
                                <!--begin::Select-->
                                <input type="text" class="form-control form-control-solid" placeholder="" id="ejudulmateri" name="ejudulmateri"/>
                                <!--end::Select-->
                            </div>
                            <div class="col-md-12 fv-row">
                                <!--begin::Label-->
                                <label class=" fs-5 fw-bold mb-2">File</label>
                                <!--end::Label-->
                                <!--begin::Select-->
                                <input type="file" class="form-control form-control-solid" placeholder="" id="efilemateri" name="efilemateri"/>
                                <input hidden type="text" class="form-control form-control-solid" placeholder="" id="filelawas" name="filelawas"/>
                                <input hidden type="text" class="form-control form-control-solid" placeholder="" id="idnya" name="idnya"/>
                                <input hidden type="text" class="form-control form-control-solid" placeholder="" id="idv" name="idv"/>
                                <input hidden type="text" class="form-control form-control-solid" placeholder="" id="idf" name="idf"/>
                                <!--end::Select-->
                            </div>
                        </div>

                        <div class="row mb-5">
                            <hr />
                            <div class="col-md-12 fv-row">
                                <!--begin::Label-->
                                <label class=" fs-5 fw-bold mb-2">Judul Video</label>
                                <!--end::Label-->
                                <!--begin::Select-->
                                <input type="text" class="form-control form-control-solid" placeholder="" id="ejudulvideo" name="ejudulvideo"/>
                                <!--end::Select-->
                            </div>
                            <div class="col-md-12 fv-row">
                                <!--begin::Label-->
                                <label class=" fs-5 fw-bold mb-2">Link Video (Youtube)</label>
                                <!--end::Label-->
                                <!--begin::Select-->
                                <input type="text" class="form-control form-control-solid" placeholder="" id="elinkvideo" name="elinkvideo"/>
                                <!--end::Select-->
                            </div>
                        </div>


                        <!--begin::Actions-->
                        <div class="text-center">
                            <button type="submit" id="updatemateri" onclick="tampilLoad()" class="btn btn-primary">
                                <span class="indicator-label">Simpan</span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end:Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - New Target-->






    <!--begin::Modal - New Target-->
    <div class="modal fade" id="playvideo" data-backdrop="static"  data-keyboard="false" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content rounded">
                <!--begin::Modal header-->

                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    <!--begin:Form-->

                    <div style="padding-top: 15px" class="mb-13 text-center">
                        <h1 class="mb-3" id="jvideo"></h1>
                    </div>

                    <span id="frame"></span>


                    <div style="padding-top: 20px" class="text-center">
                        <button type="button"  data-bs-dismiss="modal" onclick="tutupModals()" class="btn btn-primary">
                            <span class="indicator-label">Tutup</span>
                        </button>
                    </div>
                    <!--end:Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - New Target-->




@endsection

<script>
    function showModalEditMateri(id) {
        // var idx = $(this).data('id');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:"POST",
            url: "{{route('getdetailmateri')}}",
            data: { id: id },
            dataType: 'json',
            success: function(response){

                $('#editMateri').modal('show');

                 $('#etkelas').val(response[0].tingkat_kelas);
                 $('#emapel').val(response[0].mapel_id);
                $('#ebab').val(response[0].judul);
                $('#eketerangan').val(response[0].judul);

                $('#ejudulvideo').val(response[2].judul_video);
                $('#elinkvideo').val(response[2].link);

                $('#ejudulmateri').val(response[1].judul_file);
                $('#idnya').val(response[0].id);

                $('#idv').val(response[2].id);
                $('#idf').val(response[1].id);


            },
            error:function(response){

                Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Gagal Terhubung!',

                });

                console.log(response);
            }
        });

    }

    function tampilLoad() {
        $('#updatemateri').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...');


    }

    function tutupModals() {

        $('#frame').html('<span></span>')
    }

    function openplay(link) {


        Swal.fire({
            imageUrl: "{{asset('Loading1.gif')}}",
            imageWidth: 40,
            imageHeight: 40,
            width: 150,
            height: 100,
            text: "Loading...",
            timer: 2000,
            showCancelButton: false,
            showConfirmButton: false
        });

        $('#playvideo').modal({
            backdrop: 'static',
            keyboard: false,
        });

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:"POST",
            url: "{{route('getvideo')}}",
            data: { id: link },
            dataType: 'json',
            success: function(response){

                $('#playvideo').modal('show');
                $('#jvideo').html(response[1])
                $('#frame').html(response[0])
            },
            error:function(response){

                Swal.fire({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Gagal Terhubung!',

                });

                console.log(response);
            }
        });


    }

    {{--$('#upload-materiupdate').submit(function(e) {--}}

    {{--    e.preventDefault();--}}

    {{--    var id = $("#idnya").val();--}}
    {{--    var tingkatkelas = $("#etkelas").val();--}}
    {{--    var mapel = $("#emapel").val();--}}
    {{--    var babjudul = $("#ebab").val();--}}
    {{--    var keterangan = $("#eketerangan").val();--}}

    {{--    var judulvideo = $("#ejudulvideo").val();--}}
    {{--    var linkvideo = $("#elinkvideo").val();--}}

    {{--    var judulmateri = $("#ejudulmateri").val();--}}
    {{--    var filenya = $("#efilemateri").val();--}}
    {{--    var filelawas = $("#filelawas").val();--}}

    {{--    var status =  document.getElementsByName('status');--}}

    {{--    for(i = 0; i < status.length; i++) {--}}
    {{--        if(status[i].checked)--}}
    {{--            var statusAktif =  status[i].value;--}}
    {{--    }--}}



    {{--    console.log(statusAktif)--}}



    {{--    $('#updatemateri').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...');--}}

    {{--    if (tingkatkelas == '' || mapel == '' || babjudul == '' || keterangan == ''){--}}
    {{--        Swal.fire({--}}
    {{--            type: 'warning',--}}
    {{--            title: 'Oops...',--}}
    {{--            text: 'Mohon Isi Form yang Diwajibkan!',--}}

    {{--        });--}}

    {{--        $('#updatemateri').html('Simpan');--}}

    {{--    }else {--}}

    {{--        $.ajax({--}}
    {{--            headers: {--}}
    {{--                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
    {{--            },--}}
    {{--            type: "POST",--}}
    {{--            url: "{{route('simpaneditmateri')}}",--}}
    {{--            processData: false,--}}
    {{--            contentType: false,--}}
    {{--            data: {--}}
    {{--                id: id,--}}
    {{--                tingkatkelas: tingkatkelas,--}}
    {{--                mapel: mapel,--}}
    {{--                babjudul: babjudul,--}}
    {{--                keterangan: keterangan,--}}
    {{--                judulvideo: judulvideo,--}}
    {{--                linkvideo: linkvideo,--}}
    {{--                judulmateri: judulmateri,--}}
    {{--                filenya: filenya,--}}
    {{--                filelawas: filelawas,--}}
    {{--                statusA: statusAktif--}}

    {{--            },--}}
    {{--            // dataType: 'json',--}}
    {{--            success: function (response) {--}}
    {{--                console.log(response)--}}

    {{--                if (response == "success") {--}}


    {{--                    $('#updatemateri').html('Simpan');--}}

    {{--                    $("#bobot").val('');--}}
    {{--                    $("#namakomponen").val('');--}}

    {{--                    Swal.fire({--}}
    {{--                        type: 'success',--}}
    {{--                        title: 'Berhasil!',--}}
    {{--                        text: 'Data materi berhasil diubah',--}}

    {{--                    });--}}

    {{--                    $('#editMateri').modal('hide');--}}

    {{--                } else {--}}
    {{--                    Swal.fire({--}}
    {{--                        type: 'error',--}}
    {{--                        title: 'Oops...',--}}
    {{--                        text: 'Gagal Diubah!',--}}

    {{--                    });--}}

    {{--                    $('#updatemateri').html('Coba Lagi');--}}

    {{--                }--}}

    {{--            },--}}
    {{--            error: function (response) {--}}

    {{--                Swal.fire({--}}
    {{--                    type: 'error',--}}
    {{--                    title: 'Oops...',--}}
    {{--                    text: 'Gagal Terhubung!',--}}

    {{--                });--}}
    {{--                $('#updatemateri').html('Coba Lagi');--}}
    {{--                console.log(response);--}}
    {{--            }--}}
    {{--        });--}}


    {{--    }--}}

    {{--})--}}
</script>

