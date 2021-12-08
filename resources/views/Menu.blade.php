<div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">
    <div class="menu-item">
        <div class="menu-content pb-2">
            <span class="menu-section text-muted text-uppercase fs-8 ls-1">Dashboard</span>
        </div>
    </div>
    <div class="menu-item">
        <a class="menu-link {{ (request()->segment(1) == 'dashboard') ? 'active' : '' }}"
           href="{{route('dashboard')}}">
            <span class="menu-icon">
                <span class="svg-icon svg-icon-2">
                    <i class="fas fa-fire"></i>
                </span>
            </span>
            <span class="menu-title">Dashboard</span>
        </a>
    </div>

    <div class="menu-item">
        <div class="menu-content pt-8 pb-0">
            <span class="menu-section text-muted text-uppercase fs-8 ls-1">Akademik</span>
        </div>
    </div>
    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
        <span class="menu-link {{ (request()->segment(1) == 'presensikelas') ? 'active' : '' }}">
            <span class="menu-icon">
                <!--begin::Svg Icon | path: icons/duotune/abstract/abs042.svg-->
                <span class="svg-icon svg-icon-2">
                   <i class="far fa-bookmark"></i>
                </span>
                <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Presensi Kelas</span>
            <span class="menu-arrow"></span>
        </span>

            <div class="menu-sub menu-sub-accordion menu-active-bg">
            <div class="menu-item">
                <a class="menu-link" href="{{route('presensikelas')}}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Presensi Kelas</span>
                </a>
                <a class="menu-link" href="{{route('rekappresensi')}}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Rekap Presensi</span>
                </a>
            </div>
        </div>
    </div>


    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
        <span class="menu-link {{ (request()->segment(1) == 'bahanajardantugas') ? 'active' : '' }}">
            <span class="menu-icon">
                <!--begin::Svg Icon | path: icons/duotune/abstract/abs042.svg-->
                <span class="svg-icon svg-icon-2">
                   <i class="fas fa-inbox"></i>
                </span>
                <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Bahan Ajar/Tugas</span>
            <span class="menu-arrow"></span>
        </span>

        <div class="menu-sub menu-sub-accordion menu-active-bg">
            <div class="menu-item">
                <a class="menu-link" href="{{route('materi')}}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Bahan Ajar</span>
                </a>
                <a class="menu-link" href="{{route('tugas')}}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Tugas</span>
                </a>
            </div>
        </div>
    </div>

{{--    <div class="menu-item">--}}
{{--        <a class="menu-link {{ (request()->segment(1) == 'bahanajardantugas') ? 'active' : '' }}" href="{{route('materi')}}">--}}
{{--            <span class="menu-icon">--}}
{{--                <span class="svg-icon svg-icon-2">--}}
{{--                    <i class="fas fa-inbox"></i>--}}
{{--                </span>--}}
{{--            </span>--}}
{{--            <span class="menu-title">Bahan Ajar/ Tugas</span>--}}
{{--        </a>--}}
{{--    </div>--}}


    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
        <span class="menu-link {{ (request()->segment(1) == 'quizdanujian') ? 'active' : '' }}">
            <span class="menu-icon">
                <!--begin::Svg Icon | path: icons/duotune/abstract/abs042.svg-->
                <span class="svg-icon svg-icon-2">
                   <i class="far fa-calendar"></i>
                </span>
                <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Quiz/Ujian Online</span>
            <span class="menu-arrow"></span>
        </span>

        <div class="menu-sub menu-sub-accordion menu-active-bg">
            <div class="menu-item">
                <a class="menu-link" href="{{route('quiz')}}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Quiz</span>
                </a>
                <a class="menu-link" href="{{route('ujian')}}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Ujian</span>
                </a>
            </div>
        </div>
    </div>

{{--    <div class="menu-item">--}}
{{--        <a class="menu-link {{ (request()->segment(1) == 'quizdanujian') ? 'active' : '' }}" href="{{route('quiz')}}">--}}
{{--            <span class="menu-icon">--}}
{{--                <span class="svg-icon svg-icon-2">--}}
{{--                    <i class="far fa-calendar"></i>--}}
{{--                </span>--}}
{{--            </span>--}}
{{--            <span class="menu-title">Quiz/ Ujian Online</span>--}}
{{--        </a>--}}
{{--    </div>--}}


{{--    <div class="menu-item">--}}
{{--        <a class="menu-link " href="/metronic8/demo1/../demo1/dashboards/light-aside.html">--}}
{{--            <span class="menu-icon">--}}
{{--                <span class="svg-icon svg-icon-2">--}}
{{--                    <i class="fas fa-fire"></i>--}}
{{--                </span>--}}
{{--            </span>--}}
{{--            <span class="menu-title">Bimbingan Konseling</span>--}}
{{--        </a>--}}
{{--    </div>--}}

{{--    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">--}}
{{--        <span class="menu-link">--}}
{{--            <span class="menu-icon">--}}
{{--                <!--begin::Svg Icon | path: icons/duotune/abstract/abs042.svg-->--}}
{{--                <span class="svg-icon svg-icon-2">--}}
{{--                   <i class="fas fa-coffee"></i>--}}
{{--                </span>--}}
{{--                <!--end::Svg Icon-->--}}
{{--            </span>--}}
{{--            <span class="menu-title">Forum Diskusi</span>--}}
{{--            <span class="menu-arrow"></span>--}}
{{--        </span>--}}

{{--        <div class="menu-sub menu-sub-accordion menu-active-bg">--}}
{{--            <div class="menu-item">--}}
{{--                <a class="menu-link" href="/metronic8/demo1/../demo1/layouts/toolbars/toolbar-1.html">--}}
{{--                    <span class="menu-bullet">--}}
{{--                        <span class="bullet bullet-dot"></span>--}}
{{--                    </span>--}}
{{--                    <span class="menu-title">Forum Publik</span>--}}
{{--                </a>--}}
{{--                <a class="menu-link" href="/metronic8/demo1/../demo1/layouts/toolbars/toolbar-1.html">--}}
{{--                    <span class="menu-bullet">--}}
{{--                        <span class="bullet bullet-dot"></span>--}}
{{--                    </span>--}}
{{--                    <span class="menu-title">Forum Guru</span>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
        <span class="menu-link  {{ (request()->segment(1) == 'manajemennilai') ? 'active' : '' }}">
            <span class="menu-icon">
                <!--begin::Svg Icon | path: icons/duotune/abstract/abs042.svg-->
                <span class="svg-icon svg-icon-2">
                   <i class="fas fa-plus-square"></i>
                </span>
                <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Manajemen Nilai</span>
            <span class="menu-arrow"></span>
        </span>

        <div class="menu-sub menu-sub-accordion menu-active-bg">
            <div class="menu-item">
                <a class="menu-link" href="{{route('komponennilai')}}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Input Komponen Nilai</span>
                </a>
                <a class="menu-link" href="{{route('inputnilai')}}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Input Nilai</span>
                </a>
                <a class="menu-link" href="{{route('rekapnilai')}}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Lihat Rekap Nilai</span>
                </a>
            </div>
        </div>
    </div>

    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
        <span class="menu-link  {{ (request()->segment(1) == 'walikelas') ? 'active' : '' }}">
            <span class="menu-icon">
                <!--begin::Svg Icon | path: icons/duotune/abstract/abs042.svg-->
                <span class="svg-icon svg-icon-2">
                   <i class="far fa-plus-square"></i>
                </span>
                <!--end::Svg Icon-->
            </span>
            <span class="menu-title">Wali Kelas</span>
            <span class="menu-arrow"></span>
        </span>

        <div class="menu-sub menu-sub-accordion menu-active-bg">
            <div class="menu-item">
                <a class="menu-link" href="{{route('kelolapresensi')}}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Kelola Presensi</span>
                </a>
                <a class="menu-link" href="{{route('kelolanilai')}}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Kelola Nilai</span>
                </a>
                <a class="menu-link" href="{{route('kelolaraport')}}">
                    <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Kelola Raport</span>
                </a>
            </div>
        </div>
    </div>

{{--    <div class="menu-item">--}}
{{--        <div class="menu-content pt-8 pb-0">--}}
{{--            <span class="menu-section text-muted text-uppercase fs-8 ls-1">Administrasi</span>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">--}}
{{--        <span class="menu-link {{ (request()->segment(1) == 'laporankinerja') ? 'active' : '' }}">--}}
{{--            <span class="menu-icon">--}}
{{--                <!--begin::Svg Icon | path: icons/duotune/abstract/abs042.svg-->--}}
{{--                <span class="svg-icon svg-icon-2">--}}
{{--                   <i class="fab fa-wpforms"></i>--}}
{{--                </span>--}}
{{--                <!--end::Svg Icon-->--}}
{{--            </span>--}}
{{--            <span class="menu-title">Laporan Kinerja</span>--}}
{{--            <span class="menu-arrow"></span>--}}
{{--        </span>--}}

{{--        <div class="menu-sub menu-sub-accordion menu-active-bg">--}}
{{--            <div class="menu-item">--}}
{{--                <a class="menu-link" href="{{route('presensikerja')}}">--}}
{{--                    <span class="menu-bullet">--}}
{{--                        <span class="bullet bullet-dot"></span>--}}
{{--                    </span>--}}
{{--                    <span class="menu-title">Presensi Kerja</span>--}}
{{--                </a>--}}
{{--                <a class="menu-link" href="{{route('laporankerja')}}">--}}
{{--                    <span class="menu-bullet">--}}
{{--                        <span class="bullet bullet-dot"></span>--}}
{{--                    </span>--}}
{{--                    <span class="menu-title">Laporan Kerja</span>--}}
{{--                </a>--}}
{{--                <a class="menu-link" href="{{route('jadwalmengajar')}}">--}}
{{--                    <span class="menu-bullet">--}}
{{--                        <span class="bullet bullet-dot"></span>--}}
{{--                    </span>--}}
{{--                    <span class="menu-title">Jadwal Mengajar</span>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">--}}
{{--        <span class="menu-link">--}}
{{--            <span class="menu-icon">--}}
{{--                <!--begin::Svg Icon | path: icons/duotune/abstract/abs042.svg-->--}}
{{--                <span class="svg-icon svg-icon-2">--}}
{{--                   <i class="fas fa-dollar-sign"></i>--}}
{{--                </span>--}}
{{--                <!--end::Svg Icon-->--}}
{{--            </span>--}}
{{--            <span class="menu-title">Keuangan</span>--}}
{{--            <span class="menu-arrow"></span>--}}
{{--        </span>--}}

{{--        <div class="menu-sub menu-sub-accordion menu-active-bg">--}}
{{--            <div class="menu-item">--}}
{{--                <a class="menu-link" href="/metronic8/demo1/../demo1/layouts/toolbars/toolbar-1.html">--}}
{{--                    <span class="menu-bullet">--}}
{{--                        <span class="bullet bullet-dot"></span>--}}
{{--                    </span>--}}
{{--                    <span class="menu-title">Slip Gaji</span>--}}
{{--                </a>--}}
{{--                <a class="menu-link" href="/metronic8/demo1/../demo1/layouts/toolbars/toolbar-1.html">--}}
{{--                    <span class="menu-bullet">--}}
{{--                        <span class="bullet bullet-dot"></span>--}}
{{--                    </span>--}}
{{--                    <span class="menu-title">Rekap Gaji</span>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}



</div>
