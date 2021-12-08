<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Support\Facades\Input; //untuk input::get
use Illuminate\Support\Facades\Hash;

class PresensiKelas extends Controller
{

    public function __construct(){

        date_default_timezone_set('Asia/Jakarta');

    }

    public function PresensiKelas() {

        $data['web'] = array(
            'title' => 'Presensi Kelas',
            'subbreadcrumb1' => 'Dashboard',
            'subbreadcrumb2' => 'Interface',
            'subbreadcrumb3' => 'List Data',
        );

        $tanggal = date('Y-m-d');
        $day = date('D', strtotime($tanggal));
        $dayList = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        );


       $data['jadwal'] = DB::table('v_tb_jadwal_guru')
                         ->where('NIP', Auth::user()->username)
                         ->where('Status','Y')
                       //   ->where('Hari', 'Kamis')->get();
                         ->where('Hari', $dayList[$day])->get();

                       //    echo $data['jadwal'] ;

        return view('Konten.PresensiKelas.PresensiKelas', $data);

    }

    public function InputAbsen($id) {

        $data['web'] = array(
            'title' => 'Input Presensi Kelas',
            'subbreadcrumb1' => 'Dashboard',
            'subbreadcrumb2' => 'Interface',
            'subbreadcrumb3' => 'List Data',
        );
        return view('Konten.PresensiKelas.InputAbsen', $data);

    }

    public function RekapPresensi() {

        $data['web'] = array(
            'title' => 'Rekap Presensi',
            'subbreadcrumb1' => 'Dashboard',
            'subbreadcrumb2' => 'Interface',
            'subbreadcrumb3' => 'List Data',
        );

        $data['semester'] = DB::table('v_tb_jadwal_guru')
                            ->select('Semester')
                            ->where('NIP', Auth::user()->username)
                            ->groupBy('Semester')
                            ->get();

        $data['kelas'] = DB::table('v_tb_jadwal_guru')
                            ->select('KelompokKelas')
                            ->where('NIP', Auth::user()->username)
                            ->groupBy('KelompokKelas')
                            ->get();

        $data['rkjadwal'] = DB::table('v_tb_jadwal_guru')
                         ->distinct('Kodemapel', 'NamaKelompokKelas')
                                 ->where('NIP', Auth::user()->username)->get();

        return view('Konten.PresensiKelas.RekapPresensi', $data);

    }

    public function filterRekap(Request $request) {

        if($request->kelas == '' || $request->kelas == NULL){

            $rkjadwal =   DB::table('v_tb_jadwal_guru')
                ->where('NIP', Auth::user()->username)
             ->where('Semester','like', "%$request->semester%")->get();

        $hasil =  view('Konten.PresensiKelas.viewtabelrekap', array('rkjadwal' =>$rkjadwal));


        }else{
            $rkjadwal =   DB::table('v_tb_jadwal_guru')
            ->where('KelompokKelas',$request->kelas)
                ->where('NIP', Auth::user()->username)
             ->where('Semester','like', "%$request->semester%")->get();

         $hasil =  view('Konten.PresensiKelas.viewtabelrekap', array('rkjadwal' =>$rkjadwal));


        }


            // $callback = array(
            //     'hasil' => $hasil, // Set array hasil dengan isi dari view.php yang diload tadi
            // );
           // echo json_encode($hasil);
            echo $hasil;

    }

    public function DataRekap() {

        $data['web'] = array(
            'title' => 'Data Rekap Presensi',
            'subbreadcrumb1' => 'Dashboard',
            'subbreadcrumb2' => 'Interface',
            'subbreadcrumb3' => 'List Data',
        );
        return view('Konten.PresensiKelas.DataRekap', $data);

    }

}
