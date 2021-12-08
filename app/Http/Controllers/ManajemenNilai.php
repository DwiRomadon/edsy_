<?php


namespace App\Http\Controllers;
use App\Models\ModelKomponen;
use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Support\Facades\Input; //untuk input::get
use Illuminate\Support\Facades\Hash;

class ManajemenNilai extends Controller
{

    public function __construct(){

        date_default_timezone_set('Asia/Jakarta');

    }

    public function RekapNilai () {
        $data['web'] = array(
            'title' => 'Rekap Nilai',
            'subbreadcrumb1' => 'Dashboard',
            'subbreadcrumb2' => 'Interface',
            'subbreadcrumb3' => 'List Data',
        );
        return view('Konten.ManajemenNilai.RekapNilai', $data);

    }

    public function InputNilai () {
        $data['web'] = array(
            'title' => 'Input Nilai',
            'subbreadcrumb1' => 'Dashboard',
            'subbreadcrumb2' => 'Interface',
            'subbreadcrumb3' => 'List Data',
        );

        $data['mapel'] = DB::table('v_tb_jadwal_guru')
            ->select('idMapel','NIP','Kodemapel','idkelompokkls','Tahun','Semester','KelompokKelas','Jurusan','Namamapel','NamaKelompokKelas')->distinct('Kodemapel', 'NamaKelompokKelas')
            ->where('Status','Y')
            ->where('NIP', Auth::user()->username)->get();

        return view('Konten.ManajemenNilai.InputNilai', $data);

    }

    public function InputNilaiPengetahuan ($id) {
        $data['web'] = array(
            'title' => 'Input Nilai Pengetahuan',
            'subbreadcrumb1' => 'Dashboard',
            'subbreadcrumb2' => 'Interface',
            'subbreadcrumb3' => 'List Data',
        );

        $code = base64_decode($id);
        $id =  $params = explode('>', $code);

        $data['pengetahuan'] = DB::table('tb_komponen_nilai')
            ->where('type', 'pengetahuan')
            ->where('nip', $id[0])
            ->where('kode_mapel', $id[1])
            ->where('tahun', $id[2])
            ->where('semester', $id[3])
            ->where('idkelompokkls', $id[4])->get();


        return view('Konten.ManajemenNilai.InputNilaiPengetahuan', $data);

    }

    public function InputNilaiKeterampilan ($id) {
        $data['web'] = array(
            'title' => 'Input Nilai Keterampilan',
            'subbreadcrumb1' => 'Dashboard',
            'subbreadcrumb2' => 'Interface',
            'subbreadcrumb3' => 'List Data',
        );

        $code = base64_decode($id);
        $id =  $params = explode('>', $code);

        $data['keterampilan'] = DB::table('tb_komponen_nilai')
            ->where('type', 'keterampilan')
            ->where('nip', $id[0])
            ->where('kode_mapel', $id[1])
            ->where('tahun', $id[2])
            ->where('semester', $id[3])
            ->where('idkelompokkls', $id[4])->get();



        return view('Konten.ManajemenNilai.InputNilaiKeterampilan', $data);

    }

    public function KomponenNilai () {
        $data['web'] = array(
            'title' => 'Komponen Nilai',
            'subbreadcrumb1' => 'Dashboard',
            'subbreadcrumb2' => 'Interface',
            'subbreadcrumb3' => 'List Data',
        );

        $data['mapel'] = DB::table('v_tb_jadwal_guru')
             ->select('idMapel','NIP','Kodemapel','idkelompokkls','Tahun','Semester','KelompokKelas','Jurusan','Namamapel','NamaKelompokKelas')->distinct('Kodemapel', 'NamaKelompokKelas')
            ->where('Status','Y')
            ->where('NIP', Auth::user()->username)->get();

        return view('Konten.ManajemenNilai.KomponenNilai', $data);

    }

    public function ViewKomponenNilai ($id) {
        $data['web'] = array(
            'title' => 'Daftar Komponen Nilai',
            'subbreadcrumb1' => 'Dashboard',
            'subbreadcrumb2' => 'Interface',
            'subbreadcrumb3' => 'List Data',
        );

        $code = base64_decode($id);
        $id =  $params = explode('>', $code);

        $data['pengetahuan'] = DB::table('tb_komponen_nilai')
            ->where('type', 'pengetahuan')
            ->where('nip', $id[0])
            ->where('kode_mapel', $id[1])
            ->where('tahun', $id[2])
            ->where('semester', $id[3])
            ->where('idkelompokkls', $id[4])->get();

        $data['keterampilan'] = DB::table('tb_komponen_nilai')
            ->where('type', 'keterampilan')
            ->where('nip', $id[0])
            ->where('kode_mapel', $id[1])
            ->where('tahun', $id[2])
            ->where('semester', $id[3])
            ->where('idkelompokkls', $id[4])->get();



        return view('Konten.ManajemenNilai.ViewKomponen', $data);

    }

    public function CekMapel(Request $request){

        $id =  $request->id;
        $params = explode('>', $id);

        $datanya = DB::table('v_tb_jadwal_guru')
            ->where('Status','Y')
            ->where('NIP', $params[0])
            ->where('idMapel', $params[1])
            ->where('Tahun', $params[2])
            ->where('Semester', $params[3])
            ->where('idkelompokkls', $params[4])->first();

        $cekpresentase = DB::table('tb_komponen_nilai')
            ->select(DB::raw('SUM(bobot) as totalbobot'))
            ->where('type', strtolower($params[5]))
            ->where('nip', $params[0])
            ->where('kode_mapel', $params[1])
            ->where('tahun', $params[2])
            ->where('semester', $params[3])
            ->where('idkelompokkls', $params[4])->first();

        $typeKomponen = array('type' => $params[5]);


        if ($cekpresentase-> totalbobot == NULL){
            $jumlah = array('totalbobot' => 0 ) ;
        }else{
            $jumlah = $cekpresentase;
        }

        return response()->json([$datanya,$typeKomponen,$jumlah]);


    }

    public function SimpanKomponen(Request $request){

        $id =  $request->paramsnya;
        $params = explode('>', $id);

        $data= array(
            'nama_komponen' => $request->namakomponen,
            'type' => strtolower($params[5]),
            'bobot' => $request->bobot,
            'nip'=> $params[0],
            'kode_mapel' => $params[1],
            'tahun' => $params[2],
            'semester' => $params[3],
            'created_at' => date('Y-m-d H:i:s'),
            'idkelompokkls'=> $params[4],
        );

        $input =  ModelKomponen::insert($data);

        if ($input):
            echo 'success';
        else:
           echo 'gagal';
        endif;

    }

    public function HapusKomponen ($id){

        $params = base64_decode($id);

        $Hapus = ModelKomponen::where('id',$params)->delete();

        if ($Hapus){
            return back()->with(['success' => 'Data Komponen Berhasil Dihapus !']);
        }else{
            return back()->with(['warning' => 'Data Komponen Gagal Dihapus !']);
        }

    }

    public function CekEditKomponen (Request $request){

        $ids =  $request->id;
        $idx = explode('-', $ids);

        $dataSekarang = DB::table('tb_komponen_nilai')
            ->where('id', $idx[0])->first();

        $typeKomponen = array('type' =>  $idx[1]);


        $cekpresentase = DB::table('tb_komponen_nilai')
            ->select(DB::raw('SUM(bobot) as totalbobot'))
            ->where('type', strtolower($idx[1]))
            ->where('nip', $dataSekarang->nip)
            ->where('kode_mapel',$dataSekarang->kode_mapel)
            ->where('tahun', $dataSekarang->tahun)
            ->where('semester', $dataSekarang->semester)
            ->where('idkelompokkls', $dataSekarang->idkelompokkls)->first();



        return response()->json([$dataSekarang,$typeKomponen,$cekpresentase]);

    }

    public function SimpanUbah ($id, Request $request){

        $idx = ModelKomponen::find($id);

        $idx->bobot =  $request->editbobot;
        $idx->nama_komponen = $request->editnamakomponen;

       if( $idx->save()){
           echo 'success';
       }else{
           echo 'gagal';
       }

    }


}
