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
                        <div class="fs-6 text-gray-600">Anda Bisa Langsung Mengedit Biodata  <b class="text-danger">yang Tidak Sesuai</b>  Pada Form Dibawah !</div>
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
                <div class="col-md-6 fv-row">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-bold mb-2">Nomor Induk Pegawai</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" class="form-control form-control-solid" placeholder="" name="NIK"/>
                    <!--end::Input-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-6 fv-row">
                    <!--end::Label-->
                    <label class="required fs-5 fw-bold mb-2">Nomor Induk Kependudukan</label>
                    <!--end::Label-->
                    <!--end::Input-->
                    <input type="text" class="form-control form-control-solid" placeholder="" name="NIK"/>
                    <!--end::Input-->
                </div>
                <!--end::Col-->
            </div>
            <div class="row mb-5">
                <!--begin::Col-->
                <div class="col-md-6 fv-row">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-bold mb-2">Nama Lengkap</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" class="form-control form-control-solid" placeholder="" name="nama"/>
                    <!--end::Input-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-6 fv-row">
                    <!--end::Label-->
                    <label class="required fs-5 fw-bold mb-2">Agama</label>
                    <!--end::Label-->
                    <!--begin::Select-->
                    <select name="agama" class="form-select form-select-solid">
                        <option value="">Silahkan Pilih Agama...</option>
                        <option value="Islam">Islam</option>
                        <option value="Protestan">Protestan</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                    </select>
                    <!--end::Select-->
                </div>
                <!--end::Col-->
            </div>
            <div class="row mb-5">
                <!--begin::Col-->
                <div class="col-md-6 fv-row">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-bold mb-2">Tempat Lahir</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" class="form-control form-control-solid" placeholder="" name="tempatlahir"/>
                    <!--end::Input-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-6 fv-row">
                    <!--end::Label-->
                    <label class="required fs-5 fw-bold mb-2">Tanggal Lahir</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="date" class="form-control form-control-solid" placeholder="" name="tanggallahir"/>
                    <!--end::Input-->
                </div>
                <!--end::Col-->
            </div>
            <div class="row mb-5">
                <!--begin::Col-->
                <div class="col-md-6 fv-row">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-bold mb-2">No HP</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" class="form-control form-control-solid" placeholder="" name="nohp"/>
                    <!--end::Input-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-6 fv-row">
                    <!--end::Label-->
                    <label class="required fs-5 fw-bold mb-2">Email</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="email" class="form-control form-control-solid" placeholder="" name="email"/>
                    <!--end::Input-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-6 fv-row">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-bold mb-2">Golongan Darah</label>
                    <!--end::Label-->
                    <!--begin::Select-->
                    <select name="golongandarah" class="form-select form-select-solid">
                        <option value="">Silahkan Pilih Golongan Darah...</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="O">O</option>
                    </select>
                    <!--end::Select-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-6 fv-row">
                    <!--end::Label-->
                    <label class="required fs-5 fw-bold mb-2">Jenis Kelamin</label>
                    <!--end::Label-->
                    <!--begin::Select-->
                    <select name="jeniskelamin" class="form-select form-select-solid">
                        <option value="">Silahkan Pilih Jenis Kelamin...</option>
                        <option value="Pria">Pria</option>
                        <option value="Wanita">Wanita</option>
                    </select>
                    <!--end::Select-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="row mb-5">
                <!--begin::Col-->
                <div class="col-md-6 fv-row">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-bold mb-2">Jabatan</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" class="form-control form-control-solid" placeholder="" name="first-name"/>
                    <!--end::Input-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-6 fv-row">
                    <!--end::Label-->
                    <label class="required fs-5 fw-bold mb-2">Pangkat</label>
                    <!--end::Label-->
                    <!--end::Input-->
                    <input type="text" class="form-control form-control-solid" placeholder="" name="last-name"/>
                    <!--end::Input-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="row mb-5">
                <!--begin::Col-->
                <div class="col-md-6 fv-row">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-bold mb-2">NUPTK</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" class="form-control form-control-solid" placeholder="" name="first-name"/>
                    <!--end::Input-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-6 fv-row">
                    <!--end::Label-->
                    <label class="required fs-5 fw-bold mb-2">Jabatan Sekolah</label>
                    <!--end::Label-->
                    <!--end::Input-->
                    <input type="text" class="form-control form-control-solid" placeholder="" name="last-name"/>
                    <!--end::Input-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="row mb-5">
                <!--begin::Col-->
                <div class="col-md-6 fv-row">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-bold mb-2">Status Menikah</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" class="form-control form-control-solid" placeholder="" name="first-name"/>
                    <!--end::Input-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-6 fv-row">
                    <!--end::Label-->
                    <label class="required fs-5 fw-bold mb-2">Golongan Darah</label>
                    <!--end::Label-->
                    <!--end::Input-->
                    <input type="text" class="form-control form-control-solid" placeholder="" name="last-name"/>
                    <!--end::Input-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="row mb-5">
                <!--begin::Col-->
                <div class="col-md-6 fv-row">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-bold mb-2">Gelar Depan</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" class="form-control form-control-solid" placeholder="" name="first-name"/>
                    <!--end::Input-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-6 fv-row">
                    <!--end::Label-->
                    <label class="required fs-5 fw-bold mb-2">Gelar Belakang</label>
                    <!--end::Label-->
                    <!--end::Input-->
                    <input type="text" class="form-control form-control-solid" placeholder="" name="last-name"/>
                    <!--end::Input-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="row mb-5">
                <!--begin::Col-->
                <div class="col-md-6 fv-row">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-bold mb-2">Nama Ibu</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="text" class="form-control form-control-solid" placeholder="" name="first-name"/>
                    <!--end::Input-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-6 fv-row">
                    <!--end::Label-->
                    <label class="required fs-5 fw-bold mb-2">Tahun Masuk Sekolah</label>
                    <!--end::Label-->
                    <!--end::Input-->
                    <input type="text" class="form-control form-control-solid" placeholder="" name="last-name"/>
                    <!--end::Input-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->

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
