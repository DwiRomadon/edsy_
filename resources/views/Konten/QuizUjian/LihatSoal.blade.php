@extends('Template')
@section('konten')

    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                Soal
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex align-items-center position-relative my-1" data-kt-user-table-toolbar="base">
                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                    <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"></path>
                                </g>
                            </svg>
                        </span>
                    <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Cari {{ $web['title'] }}..">
                    <!--end::Add user-->
                </div>
                <!--end::Toolbar-->
                <!--begin::Group actions-->
                <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
                    <div class="fw-bolder me-5">
                        <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected</div>
                    <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete Selected</button>
                </div>
            </div>
            <!--end::Card toolbar-->
        </div>

        <div class="card-body pt-0">
            <!--begin::Table-->
            <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="table-responsive">
                    <p class="card-description">1. Berikut dibawah merupakan nama ilmuan terkemuka kecuali...</p>
                    <div class="form-check" style="padding-top: 10px">
                        <input class="form-check-input" type="radio" name="flexRadioDisabled" id="flexRadioDisabled">
                        <label class="form-check-label" for="flexRadioDisabled">
                            A. Nicola Tesla
                        </label>
                    </div>
                    <div class="form-check" style="padding-top: 10px">
                        <input class="form-check-input" type="radio" name="flexRadioDisabled" id="flexRadioCheckedDisabled">
                        <label class="form-check-label" for="flexRadioCheckedDisabled">
                            B. Sir Isaac Newton
                        </label>
                    </div>
                    <div class="form-check" style="padding-top: 10px">
                        <input class="form-check-input" type="radio" name="flexRadioDisabled" id="flexRadioCheckedDisabled">
                        <label class="form-check-label" for="flexRadioCheckedDisabled">
                            C. Ahmad Cucus
                        </label>
                    </div>
                    <div class="form-check" style="padding-top: 10px">
                        <input class="form-check-input" type="radio" name="flexRadioDisabled" id="flexRadioCheckedDisabled">
                        <label class="form-check-label" for="flexRadioCheckedDisabled">
                            D. Albert Einstein
                        </label>
                    </div>
                    <div class="form-check" style="padding-top: 10px">
                        <input class="form-check-input" type="radio" name="flexRadioDisabled" id="flexRadioCheckedDisabled">
                        <label class="form-check-label" for="flexRadioCheckedDisabled">
                            E. Ibnu Sina
                        </label>
                    </div>
                </div>
                <div class="row"><div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start"></div><div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end"><div class="dataTables_paginate paging_simple_numbers" id="kt_table_users_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="kt_table_users_previous"><a href="#" aria-controls="kt_table_users" data-dt-idx="0" tabindex="0" class="page-link"><i class="previous"></i></a></li><li class="paginate_button page-item active"><a href="#" aria-controls="kt_table_users" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="kt_table_users" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="kt_table_users" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item next" id="kt_table_users_next"><a href="#" aria-controls="kt_table_users" data-dt-idx="4" tabindex="0" class="page-link"><i class="next"></i></a></li></ul></div></div></div></div>
            <!--end::Table-->
        </div>


    </div>

@endsection
