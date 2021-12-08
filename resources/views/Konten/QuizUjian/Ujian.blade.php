@extends('Konten.QuizUjian.Index')
@section('IndexQuizUjian')

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

            {{--                <a href="{{route('tambahtugas')}}" class="btn btn-sm btn-primary">Tambah Tugas</a>--}}
            <!--end::Toolbar-->
                <!--begin::Group actions-->

            </div>
            <!--end::Card toolbar-->
        </div>

        <div class="card-body pt-0">

            <div class="row" style="padding-top: 30px;padding-bottom: 20px">
                <!--begin::Col-->
                <div class="col-md-6 fv-row">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-bold mb-2">Tingkat Kelas</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" class="form-control form-control-solid" placeholder="" name="NIK" value="XI "/>
                    <!--end::Input-->
                </div>
                <div class="col-md-6 fv-row">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-bold mb-2">Semester</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <select name="kelas" class="form-select form-select-solid">
                        <option value="" disabled selected>Pilih Semester...</option>
                        <option value="X1">Ganjil</option>
                        <option value="X2">Genap</option>
                    </select>
                    <!--end::Input-->
                </div>
            </div>

            <!--begin::Table-->
            <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="table-responsive">


                    <table id="tbfilter"  class=" display table table-striped table-bordered nowrap" style="width:100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Tahun Ajaran</th>
                            <th>Semester</th>
                            <th>Kelompok Kelas</th>
                            {{--                        <th>Wali Kelas</th>--}}

                            <th>Mata Pelajaran</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $no=1 @endphp
                        @foreach($mapel as $data)
                            <tr style="height: 40px">
                                <td style="text-align:center;">{{$no++}}</td>
                                <td>{{$data -> Tahun}}</td>
                                <td>{{$data -> Semester}}</td>
                                <td>{{$data -> KelompokKelas." ".$data -> Jurusan." ".$data -> NamaKelompokKelas}}</td>

                                <td>{{$data -> Namamapel}}</td>
                                <td>
                                    <a style="background-color: deepskyblue; color: white" href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">Ujian
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
                                            <a href="{{route('tambahsoal' , ['id' => base64_encode($data->NIP.'>'.$data->idMapel.'>'.$data->Tahun.'>'.$data->Semester.'>'.$data->idkelompokkls.'>'.'Ujian' )])}}" class="menu-link px-3" >Ujian Baru</a>
                                        </div>
                                        <div class="menu-item px-3">
                                            <a href="{{route('lihatujian', ['id' => base64_encode($data->NIP.'>'.$data->idMapel.'>'.$data->Tahun.'>'.$data->Semester.'>'.$data->idkelompokkls.'>'.'Ujian' )])}}" class="menu-link px-3" >Daftar Ujian</a>
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


@endsection
