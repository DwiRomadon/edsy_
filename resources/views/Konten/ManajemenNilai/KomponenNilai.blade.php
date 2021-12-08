@extends('Template')
@section('konten')

    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                Data {{$web['title']}}
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->

            <!--end::Card toolbar-->
        </div>

        <div class="card-body pt-0">
            <!--begin::Table-->
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
                                <a style="background-color: deepskyblue; color: white" href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">Komponen Nilai
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
                                        <a href="javascript:void(0)" class="menu-link px-3 tpengetahuan"  data-id="{{ $data->NIP.'>'.$data->idMapel.'>'.$data->Tahun.'>'.$data->Semester.'>'.$data->idkelompokkls.'>'.'Pengetahuan'}}" >Pengetahuan</a>
                                    </div>
                                    <div class="menu-item px-3">
                                        <a href="javascript:void(0)" class="menu-link px-3 tpketerampilan" data-id="{{ $data->NIP.'>'.$data->idMapel.'>'.$data->Tahun.'>'.$data->Semester.'>'.$data->idkelompokkls.'>'.'Keterampilan'}}" >Keterampilam</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <a href="{{route('daftarkomponennilai',  ['id' => base64_encode($data->NIP.'>'.$data->idMapel.'>'.$data->Tahun.'>'.$data->Semester.'>'.$data->idkelompokkls)]) }}" class="menu-link px-3" data-kt-users-table-filter="delete_row">Lihat Komponen</a>
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
            <!--end::Table-->
        </div>


    </div>
    <!--end::Card-->



    <!--begin::Modal - New Target-->
    <div class="modal fade" id="inputpengetahuan" tabindex="-1" aria-hidden="true">
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

                        <!--begin::Heading-->
                        <div class="mb-13 text-center">
                            <!--begin::Title-->
                            <h1 class="mb-3">Komponen <span id="typekomponen"></span></h1>
                            <!--end::Title-->
                            <!--begin::Description-->
                            <div class="text-muted fw-bold fs-5">Input Komponen Nilai <span id="typekomponen2"></span>.</div>
                            <!--end::Description-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Input group-->
                        <div class="row mb-5">
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-5 fw-bold mb-2">Nama Kelompok Kelas</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" readonly class="form-control form-control-solid" placeholder="" id="kpkelompokkelas" name="kpkelompokkelas"/>
                                <!--end::Input-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-6 fv-row">
                                <!--end::Label-->
                                <label class="required fs-5 fw-bold mb-2">Nama Mapel</label>
                                <!--begin::Select-->
                                <input type="text"readonly class="form-control form-control-solid" placeholder="" id="kpmapel" name="kpmapel"/>
                                <!--end::Select-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <div class="row mb-5">
                        <!--begin::Col-->
                            <div class="col-md-12 fv-row">
                                <!--end::Label-->
                                <label class="required fs-5 fw-bold mb-2">Tahun Ajaran / Semester</label>
                                <!--begin::Select-->
                                <input type="text" readonly class="form-control form-control-solid" placeholder="" id="kptasemester" name="kptasemester"/>
                                <input type="text" class="form-control form-control-solid" placeholder=""id="paramsnya" name="paramsnya " hidden/>
                                <input type="text" class="form-control form-control-solid" placeholder=""id="sisabobot" name="sisabobot " hidden/>
                                <!--end::Select-->
                            </div>
                        </div>
                        <!--end::Col-->
                        <div class="row mb-5">
                            <!--begin::Col-->


                            <div class="col-md-6 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-5 fw-bold mb-2">Presentase (%)</label>
                                <!--end::Label-->
                                <!--begin::Select-->
                                <input type="text" class="form-control form-control-solid" placeholder=""id="bobot" name="bobot "/>
                                <!--end::Select-->
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="fs-5 fw-bold mb-2" style="padding-top: 40px"><span id="totalpresentase"></span>/100 Tersisa <span id="sisapresentase"></span>%</label>
                            </div>
                            <!--end::Col-->

                        </div>
                        <div class="row mb-5">
                            <!--begin::Col-->


                            <div class="col-md-12 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-5 fw-bold mb-2">Nama Komponen Nilai</label>
                                <!--end::Label-->
                                <!--begin::Select-->
                                <input type="text" class="form-control form-control-solid" placeholder="" id="namakomponen" name="namakomponen"/>
                                <!--end::Select-->
                            </div>
                            <!--end::Col-->

                        </div>
                        <!--begin::Actions-->
                        <div class="text-center">
                            <button type="button" id="simpankp" class="btn btn-primary">
                                <span class="indicator-label">Simpan</span>
                            </button>
                        </div>
                        <!--end::Actions-->

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


