@extends('Konten.ProfilBiodata.Index')
@section('IndexBiodata')

    <div class="card">
        {{--        <!--begin::Card header-->--}}
        {{--        <div class="card-header border-0 pt-6">--}}
        {{--            <!--begin::Card title-->--}}
        {{--            <div class="card-title">--}}
        {{--                Tambah Guru--}}
        {{--            </div>--}}
        {{--            <!--begin::Card title-->--}}
        {{--            <!--begin::Card toolbar-->--}}
        {{--            <div class="card-toolbar">--}}
        {{--                <!--begin::Toolbar-->--}}
        {{--            </div>--}}
        {{--            <!--end::Card toolbar-->--}}
        {{--        </div>--}}

        <div class="card-body pt-0">
            <!--begin::Notice-->
            <!--begin::Notice-->
            <br />
            <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">
                <!--begin::Icon-->
                <!--begin::Svg Icon | path: icons/duotone/Code/Warning-1-circle.svg-->
                <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
																<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
																	<rect fill="#000000" x="11" y="7" width="2" height="8" rx="1"/>
																	<rect fill="#000000" x="11" y="16" width="2" height="2" rx="1"/>
																</svg>
															</span>
                <!--end::Svg Icon-->
                <!--end::Icon-->
                <!--begin::Wrapper-->
                <div class="d-flex flex-stack flex-grow-1">
                    <!--begin::Content-->
                    <div class="fw-bold">
                        <h4 class="text-gray-800 fw-bolder">Perhatian</h4>
                        <div class="fs-6 text-gray-600">Pastikan Anda Mengingat Kata Sandi Baru yang Anda Ubah!</div>
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Notice-->
            <!--end::Notice-->
            <!--begin::Input group-->
            <div class="row mb-5">
                <!--begin::Col-->
                <div class="col-md-12 fv-row">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-bold mb-2">Kata Sandi Lama</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="password" class="form-control form-control-solid" placeholder="" name="Kata sandi Lama"/>
                    <!--end::Input-->
                </div>
                <!--end::Col-->

            </div>
            <div class="row mb-5">
                <!--begin::Col-->
                <div class="col-md-6 fv-row">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-bold mb-2">Kata Sandi Baru</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="password" class="form-control form-control-solid" placeholder="" name="Kata sandi baru"/>
                    <!--end::Input-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-6 fv-row">
                    <!--end::Label-->
                    <label class="required fs-5 fw-bold mb-2">Konfirmasi Kata Sandi Baru</label>
                    <!--end::Label-->
                    <!--end::Input-->
                    <input type="password" class="form-control form-control-solid" placeholder="" name="Konfirmasi kata sandi baru"/>
                    <!--end::Input-->
                </div>
                <!--end::Col-->
            </div>


        </div>

        <div class="card-footer text-end">
            <button class="btn w-100 w-sm-auto btn-primary">
                    <span class="svg-icon svg-icon-white svg-icon-1"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24"/>
                            <path d="M17,4 L6,4 C4.79111111,4 4,4.7 4,6 L4,18 C4,19.3 4.79111111,20 6,20 L18,20 C19.2,20 20,19.3 20,18 L20,7.20710678 C20,7.07449854 19.9473216,6.94732158 19.8535534,6.85355339 L17,4 Z M17,11 L7,11 L7,4 L17,4 L17,11 Z" fill="#000000" fill-rule="nonzero"/>
                            <rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="5" rx="0.5"/>
                        </g>
                    </svg></span>
                Simpan</button>
        </div>

    </div>

@endsection
