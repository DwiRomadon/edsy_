<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanKinerja extends Controller
{

    public function PresensiKerja() {

        $data['web'] = array(
            'title' => 'Presensi Kerja',
            'subbreadcrumb1' => 'Dashboard',
            'subbreadcrumb2' => 'Interface',
            'subbreadcrumb3' => 'List Data',
        );
        return view('Konten.LaporanKinerja.PresensiKerja', $data);

    }

    public function LaporanKerja() {

        $data['web'] = array(
            'title' => 'Laporan Kerja',
            'subbreadcrumb1' => 'Dashboard',
            'subbreadcrumb2' => 'Interface',
            'subbreadcrumb3' => 'List Data',
        );
        return view('Konten.LaporanKinerja.LaporanKerja', $data);

    }

    public function JadwalMengajar() {

        $data['web'] = array(
            'title' => 'Jadwal Mengajar',
            'subbreadcrumb1' => 'Dashboard',
            'subbreadcrumb2' => 'Interface',
            'subbreadcrumb3' => 'List Data',
        );
        return view('Konten.LaporanKinerja.JadwalMengajar', $data);

    }

}
