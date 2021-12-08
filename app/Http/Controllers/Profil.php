<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Support\Facades\Input; //untuk input::get
use Illuminate\Support\Facades\File;


class Profil extends Controller
{

    public function Biodata () {
        $data['web'] = array(
            'title' => 'Profil Biodata',
            'subbreadcrumb1' => 'Dashboard',
            'subbreadcrumb2' => 'Interface',
            'subbreadcrumb3' => 'List Data',
        );

        $data['guru'] = DB::table('tabelguru')
            ->select('Nip','Nama')
            ->where('Nip', Auth::user()->username)->first();


        return view('Konten.ProfilBiodata.Profil', $data);

    }

    public function Password () {
        $data['web'] = array(
            'title' => 'Kata Sandi',
            'subbreadcrumb1' => 'Dashboard',
            'subbreadcrumb2' => 'Interface',
            'subbreadcrumb3' => 'List Data',
        );

        $data['guru'] = DB::table('tabelguru')
            ->select('Nip','Nama')
            ->where('Nip', Auth::user()->username)->first();


        return view('Konten.ProfilBiodata.Password', $data);

    }


}
