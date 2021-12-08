@extends('Konten.BahanAjarTugas.Index')
@section('IndexBahanAjarTugas')

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
                <!--begin::Toolbar-->
                &emsp;
                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#uploadMateri">Upload Materi</button>
                <!--end::Toolbar-->
                <!--begin::Group actions-->

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
{{--                            <th>Tingkat Kelas</th>--}}
                            {{--                        <th>Wali Kelas</th>--}}
                            <th>Mata Pelajaran</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $no=1 @endphp
                        @foreach($materi as $data)
                            <tr style="height: 40px">
                                <td style="text-align:center;">{{$no++}}</td>
{{--                                <td>{{$data -> KelompokKelas}}</td>--}}
                                <td>{{$data -> Namamapel}}</td>
                                <td>
                                    <a href="#" style="background-color: deepskyblue; color: white" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">Materi
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
                                            <a href="{{route('detailmateri', ['id' => base64_encode($data->NIP.'>'.$data->idMapel)])}}" class="menu-link px-3"   >Lihat</a>
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
    <div class="modal fade" id="uploadMateri" tabindex="-1" aria-hidden="true">
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
                    <form method="post" id="upload-image-form" enctype="multipart/form-data">
        @csrf
                        <!--begin::Heading-->
                        <div class="mb-13 text-center">
                            <!--begin::Title-->
                            <h1 class="mb-3">Upload Materi</h1>
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
                                <select name="tkelas" id="tkelas" class="form-select form-select-solid" required>
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
                                <select name="mapel" required id="mapel" class="form-select form-select-solid">
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
                                <input type="text" id="bab" required class="form-control form-control-solid" placeholder="" name="bab"/>
                                <!--end::Select-->
                            </div>
                            <div class="col-md-12 fv-row">
                                <!--begin::Label-->
                                <label  class="required fs-5 fw-bold mb-2">Keterangan</label>
                                <!--end::Label-->
                                <!--begin::Select-->
                                <textarea type="text" id="keterangan" required rows="3" class="form-control form-control-solid" placeholder="" name="keterangan"></textarea>
                                <!--end::Select-->
                            </div>
                            <br />
                        </div>
                        <div class="row mb-5">
                            <div class="col-md-12 fv-row">
                                <div class="d-flex align-items-center">
                                    <!--begin::Checkbox-->
                                    <label class="form-check form-check-custom form-check-solid me-10">
                                        <input class="form-check-input h-20px w-20px" type="checkbox" onclick="mfile()" id="checkfile"  name="checkfile" value="materifile" />
                                        <span class="form-check-label fw-bold">Upload File</span>
                                    </label>
                                    <!--end::Checkbox-->
                                    <!--begin::Checkbox-->
                                    <label class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input h-20px w-20px" type="checkbox" onclick="mlink()" id="checklink" name="checklink" value="materilink" />
                                        <span class="form-check-label fw-bold">Link Video</span>
                                    </label>
                                    <!--end::Checkbox-->
                                </div>
                            </div>

                        </div>
                        <div class="row mb-5">
                            <div id="formMateriFile"></div>
                        </div>

                        <div class="row mb-5">
                            <div id="formMateriVideo"></div>
                        </div>


                        <!--begin::Actions-->
                        <div class="text-center">
                            <button type="submit" id="simpanbahan" onclick="loadingm()" class="btn btn-primary">
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




@endsection
<script>

    function mfile() {
        var checkfile = document.getElementById("checkfile");
        if (checkfile.checked == true){
            //  $("#formMateri").load();
            $('#formMateriFile').load("{{ route('formfile') }}");
        }else {
            $('#formMateriFile').html('<span></span>');
        }
    }

    function mlink() {

        var checklink = document.getElementById("checklink");
        if (checklink.checked == true){
          //  $("#formMateri").load();
            $('#formMateriVideo').load("{{ route('formlink') }}");
        }else {

            $('#formMateriVideo').html('<span></span>');
        }
    }

   function loadingm() {

           var kelas = $("#tkelas").val();
           var mapel = $("#mapel").val();
           var bab = $("#bab").val();
           var keterangan = $("#keterangan").val();

       if(kelas != '' || mapel != '' || bab!= '' || keterangan != ''){
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

       }



    //     var judulmateri = $("#judulmateri").val();

    //     var checklink = document.getElementById("checklink");
    //     if (checklink.checked == true){
    //         var judulvideo = $("#judulvideo").val();
    //         var linkvideo = $("#linkvideo").val();
    //     }else {

    //         var judulvideo = '-';
    //         var linkvideo = '-';

    //     }


     }

</script>


<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

   $('#upload-image-form').submit(function(e) {

       e.preventDefault();
       let formData = new FormData(this);


       $.ajax({
          type:'POST',
          url: '{{route('uploadMateri')}}',
           data: formData,
           contentType: false,
           processData: false,
           success: (response) => {
               this.reset();
           },
           error: function(response){
               Swal.fire({
                   type: 'error',
                   title: 'Oops...',
                   text: 'Gagal Terhubung!',

               });
               $('#simpanbahan').html('Coba Lagi');
               console.log(response);

           }
       });


  });

</script>
