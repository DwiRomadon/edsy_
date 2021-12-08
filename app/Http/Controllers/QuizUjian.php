<?php


namespace App\Http\Controllers;

use App\Models\ModelBahanFile;
use App\Models\ModelMateriTugas;
use App\Models\ModelTugas;
use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Support\Facades\Input; //untuk input::get
use Illuminate\Support\Facades\File;

class QuizUjian extends Controller
{

    public function __construct(){

        date_default_timezone_set('Asia/Jakarta');

    }

    public function Quiz () {
        $data['web'] = array(
            'title' => 'Quiz',
            'subbreadcrumb1' => 'Dashboard',
            'subbreadcrumb2' => 'Interface',
            'subbreadcrumb3' => 'List Data',
        );

        $data['guru'] = DB::table('tabelguru')
            ->select('Nip','Nama')
            ->where('Nip', Auth::user()->username)->first();

        $data['mapel'] = DB::table('v_tb_jadwal_guru')
            ->select('idMapel','NIP','Kodemapel','idkelompokkls','Tahun','Semester','KelompokKelas','Jurusan','Namamapel','NamaKelompokKelas')->distinct('Kodemapel', 'NamaKelompokKelas')
            ->where('Status','Y')
            ->where('NIP', Auth::user()->username)->get();

        return view('Konten.QuizUjian.Quiz', $data);

    }

    public function LihatQuiz ($id) {
        $data['web'] = array(
            'title' => 'Lihat Quiz',
            'subbreadcrumb1' => 'Dashboard',
            'subbreadcrumb2' => 'Interface',
            'subbreadcrumb3' => 'List Data',
        );

        $ids = base64_decode($id);
        $params = explode('>', $ids);


        $data['tugas'] = DB::table('tb_tugas')
            ->where('nip', Auth::user()->username)
            ->where('id_kelompok_kelas', $params[4])
            ->where('id_mapel', $params[1])
            ->where('tahun', $params[2])
            ->where('semester', $params[3])
            ->where('jenis_tugas', $params[5])->get();


        return view('Konten.BahanAjarTugas.LihatTugas', $data);
    }

    public function Ujian () {
        $data['web'] = array(
            'title' => 'Ujian',
            'subbreadcrumb1' => 'Dashboard',
            'subbreadcrumb2' => 'Interface',
            'subbreadcrumb3' => 'List Data',
        );

        $data['guru'] = DB::table('tabelguru')
            ->select('Nip','Nama')
            ->where('Nip', Auth::user()->username)->first();

        $data['mapel'] = DB::table('v_tb_jadwal_guru')
            ->select('idMapel','NIP','Kodemapel','idkelompokkls','Tahun','Semester','KelompokKelas','Jurusan','Namamapel','NamaKelompokKelas')->distinct('Kodemapel', 'NamaKelompokKelas')
            ->where('Status','Y')
            ->where('NIP', Auth::user()->username)->get();


        return view('Konten.QuizUjian.Ujian', $data);

    }

    public function LihatUjian ($id) {
        $data['web'] = array(
            'title' => 'Lihat Ujian',
            'subbreadcrumb1' => 'Dashboard',
            'subbreadcrumb2' => 'Interface',
            'subbreadcrumb3' => 'List Data',
        );


        $ids = base64_decode($id);
        $params = explode('>', $ids);


        $data['tugas'] = DB::table('tb_tugas')
            ->where('nip', Auth::user()->username)
            ->where('id_kelompok_kelas', $params[4])
            ->where('id_mapel', $params[1])
            ->where('tahun', $params[2])
            ->where('semester', $params[3])
            ->where('jenis_tugas', $params[5])->get();


        return view('Konten.BahanAjarTugas.LihatTugas', $data);


    }

    public function TambahSoal ($id) {
        $data['web'] = array(
            'title' => 'Tambah Soal',
            'subbreadcrumb1' => 'Dashboard',
            'subbreadcrumb2' => 'Interface',
            'subbreadcrumb3' => 'List Data',
        );

        $idx = base64_decode($id);
        $params = explode('>', $idx);

        $data['tugas'] = DB::table('v_tb_jadwal_guru')
            ->where('Status','Y')
            ->where('NIP', $params[0])
            ->where('idMapel', $params[1])
            ->where('Tahun', $params[2])
            ->where('Semester', $params[3])
            ->where('idkelompokkls', $params[4])->first();

       // return view('Konten.QuizUjian.TambahSoal', $data);

        return view('Konten.BahanAjarTugas.TambahTugas', $data);

    }

    public function LihatSoal () {
        $data['web'] = array(
            'title' => 'Lihat Soal',
            'subbreadcrumb1' => 'Dashboard',
            'subbreadcrumb2' => 'Interface',
            'subbreadcrumb3' => 'List Data',
        );
        return view('Konten.QuizUjian.LihatSoal', $data);

    }

    public function simpaneditsoal ($id,Request $request){


        $ids = base64_decode($id);
        $idx = explode('>', $ids);

        $data = array(
            'tgl_mulai' => $request->tglmulai,
            'tgl_selesai' => $request->tglselesai,
            'keterangan' => $request->keterangan,
            'nama_tugas' => $request->namatugas,
            'id_komponen_nilai' => $request->komponenE,
        );


        $update = ModelTugas::where('id', $idx[0])
            ->update($data);

        if ($update):

            if ($idx[1] == 'PG'):

            elseif ($idx[1] == 'Essay'):



            elseif ($idx[1] == 'File'):

                if ($request->file('soal_file')) {
                    $filemateri = $request->file('soal_file');
                    $filenya = Auth::user()->username.'-'.$filemateri->getClientOriginalName();
                    $filemateri->move(public_path('SoalTugas'), $filenya);

                    $formfile = array(
                        'file' => $filenya,
                    );

                   $updateFile =  DB::table('tb_soal')
                       ->where('id', $request->idsoal)
                        ->update($formfile);

                        if ($updateFile):
                            $files = 'SoalTugas/'.$request->filelawas;
                            File::delete($files);
                            return back()->with(['success' => 'Data Soal File Berhasil Disimpan']);
                         else:
                             return back()->with(['warning' => 'Gagal Menyimpan Data Soal File!']);
                        endif;


                }

            endif;

         else:
             return back()->with(['warning' => 'Gagal Menyimpan Data Soal !']);
        endif;



    }

}
