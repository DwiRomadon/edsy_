<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Walikelas extends Controller
{

    public function KelolaNilai () {
        $data['web'] = array(
            'title' => 'Kelola Nilai',
            'subbreadcrumb1' => 'Dashboard',
            'subbreadcrumb2' => 'Interface',
            'subbreadcrumb3' => 'List Data',
        );
        return view('Konten.WaliKelas.KelolaNilai', $data);

    }
    public function DataNilai () {
        $data['web'] = array(
            'title' => 'Data Nilai',
            'subbreadcrumb1' => 'Dashboard',
            'subbreadcrumb2' => 'Interface',
            'subbreadcrumb3' => 'List Data',
        );
        return view('Konten.WaliKelas.DataNilai', $data);

    }

    public function KelolaPresensi () {
        $data['web'] = array(
            'title' => 'Kelola Presensi',
            'subbreadcrumb1' => 'Dashboard',
            'subbreadcrumb2' => 'Interface',
            'subbreadcrumb3' => 'List Data',
        );
        return view('Konten.WaliKelas.KelolaPresensi', $data);

    }

    public function KelolaRaport () {
        $data['web'] = array(
            'title' => 'Kelola Raport',
            'subbreadcrumb1' => 'Dashboard',
            'subbreadcrumb2' => 'Interface',
            'subbreadcrumb3' => 'List Data',
        );
        return view('Konten.WaliKelas.KelolaRaport', $data);

    }

    public function ViewRaport () {
        $data['web'] = array(
            'title' => 'Lihat Raport',
            'subbreadcrumb1' => 'Dashboard',
            'subbreadcrumb2' => 'Interface',
            'subbreadcrumb3' => 'List Data',
        );
        return view('Konten.WaliKelas.ViewRaport', $data);

    }

}
