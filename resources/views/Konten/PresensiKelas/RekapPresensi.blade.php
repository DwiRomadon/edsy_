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
                <div style="padding-top: 15px;" class="row">
                <!--begin::Col-->
                <div class="col-md-6 fv-row">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-bold mb-2">Tingkat Kelas</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <select name="kelas" id="kelas" name="kelas" class="form-select form-select-solid">
                        <option value="">Pilih Kelas...</option>
                        @foreach($kelas as $kls)
                             <option value="{{$kls->KelompokKelas}}">{{$kls->KelompokKelas}}</option>
                        @endforeach
                    </select>
                    <!--end::Input-->
                </div>
                <div class="col-md-6 fv-row">
                    <!--begin::Label-->
                    <label class="required fs-5 fw-bold mb-2">Semester</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <select name="kelas" id="semester" name="semester" class="form-select form-select-solid">
                        <option value="">Pilih Semester...</option>
                        @foreach($semester as $smt)
                             <option value="{{$smt->Semester}}">{{$smt->Semester}}</option>
                        @endforeach
                    </select>
                    <!--end::Input-->
                </div>
            </div>
            <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <br />
                <div id="view_rekap_absen">
						{{ view('Konten.PresensiKelas.viewtabelrekap',['rkjadwal' => $rkjadwal]) }}
				</div>
            </div>
            <!--end::Table-->
        </div>


    </div>

@endsection

