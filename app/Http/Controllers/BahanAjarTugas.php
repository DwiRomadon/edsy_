<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Support\Facades\Input; //untuk input::get
use Illuminate\Support\Facades\Hash;
use App\Models\ModelMateriTugas;
use App\Models\ModelBahanVideo;
use App\Models\ModelBahanFile;
use App\Models\ModelTugas;
use Illuminate\Support\Facades\File;
use phpDocumentor\Reflection\Types\Null_;


class BahanAjarTugas extends Controller
{

    public function __construct(){

        date_default_timezone_set('Asia/Jakarta');

    }

    public function Materi () {
        $data['web'] = array(
            'title' => 'Materi',
            'subbreadcrumb1' => 'Dashboard',
            'subbreadcrumb2' => 'Interface',
            'subbreadcrumb3' => 'List Data',
        );

        $data['materi'] = DB::table('v_tb_jadwal_guru')
            ->select('idMapel','NIP','Kodemapel','idkelompokkls','Tahun','Semester','KelompokKelas','Jurusan','Namamapel','NamaKelompokKelas')->distinct('Kodemapel')
          //  ->where('Status','Y')
            ->where('NIP', Auth::user()->username)->get();

        $data['kelas'] = DB::table('v_tb_jadwal_guru')
            ->select('KelompokKelas')->distinct('KelompokKelas')
          //  ->where('Status','Y')
            ->where('NIP', Auth::user()->username)->get();

        $data['mapel'] = DB::table('v_tb_jadwal_guru')
            ->select('idMapel','Namamapel')->distinct('Namamapel')
            //  ->where('Status','Y')
            ->where('NIP', Auth::user()->username)->get();

        $data['guru'] = DB::table('tabelguru')
            ->select('Nip','Nama')
            ->where('Nip', Auth::user()->username)->first();


        return view('Konten.BahanAjarTugas.Materi', $data);

    }

    public function uploadMateri (Request $request) {

//        $request->validate([
//            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//        ]);

        if ($request->file('filemateri')) {
            $filemateri = $request->file('filemateri');
            $filenya = Auth::user()->username.'-'.$filemateri->getClientOriginalName();
            $filemateri->move(public_path('BahanAjarMateri'), $filenya);
        }

        $data = array(
            'nip' => Auth::user()->username,
            'mapel_id' => $request->mapel,
            'judul' => $request->bab,
            'keterangan' => $request->keterangan,
            'aktiv' => 'true',
            'tingkat_kelas' => $request->tkelas,
            'created_at' => date('Y-m-d H:i:s'),


        );

        $inputMateri = ModelMateriTugas::insert($data);

        if ($inputMateri){

            $lastid =    ModelMateriTugas::latest('id')->first();

            if ($request->checklink != '' || $request->checklink != Null){

                $formvideo = array(

                    'id_bahan_ajar' => $lastid->id,
                    'judul_video' => $request->judulvideo,
                    'link' => $request->linkvideo
                );

                ModelBahanVideo::insert($formvideo);

            }

            if($request->checkfile != '' || $request->checkfile != Null){

                $formfile = array(

                    'id_bahan_ajar' => $lastid->id,
                    'judul_file' => $request->judulmateri,
                    'file' => $filenya
                );
                ModelBahanFile::insert($formfile);

            }

            return back()->with(['success' => 'Data Materi Berhasil Disimpan !']);

        }else{
            return back()->with(['warning' => 'Gagal Meyimpan Data Materi!']);
        }
    }

    public function formfile (){
        return view('Konten.BahanAjarTugas.FormFile');
    }
    public function formlink (){
        return view('Konten.BahanAjarTugas.FormLinkVideo');
    }

    public function Getvideo (Request $request){

        $cekV = ModelBahanVideo::where('id',$request->id)->first();

        $idlink =  substr($cekV->link,-11);
        $link = 'https://www.youtube.com/embed/'.$idlink;

        $frame = " <iframe width='560' height='315' src='".$link."' title='".$cekV->judul_video."' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen>
                     </iframe>";

        return response()->json([$frame, $cekV->judul_video]);

    }

    public function downloadMateri($id){
        $cariFileDb = ModelBahanFile::where('id',$id)->first(); //Mencari model atau objek yang dicari
        $file = public_path() . '/BahanAjarMateri/' . $cariFileDb->file;//Mencari file dari model yang sudah dicari
        return response()->download($file, $cariFileDb->file); //Download file yang dicari berdasarkan nama file
    }

    public function DetailMateri ($id) {

        $ids =  base64_decode($id);
        $idx = explode('>', $ids);

        $data['web'] = array(
            'title' => 'Detail Materi',
            'subbreadcrumb1' => 'Dashboard',
            'subbreadcrumb2' => 'Interface',
            'subbreadcrumb3' => 'List Data',
        );

        $data['materi'] = DB::table('v_tb_bahan_ajar')
            ->where('nip', Auth::user()->username)
            ->where('mapel_id', $idx[1])
          //  ->where('tingkat_kelas', $idx[2])
            ->get();


        $data['kelas'] = DB::table('v_tb_jadwal_guru')
            ->select('KelompokKelas')->distinct('KelompokKelas')
            ->where('NIP', Auth::user()->username)->get();

        $data['mapel'] = DB::table('v_tb_jadwal_guru')
            ->select('idMapel','Namamapel')->distinct('Namamapel')
            ->where('NIP', Auth::user()->username)->get();


        return view('Konten.BahanAjarTugas.DetailMateri', $data);

    }

    public function GetDetailMateri (Request $request) {

        $ids = $request->id;
        $idx = explode('q', $ids);

        $datanya = DB::table('v_tb_bahan_ajar')
            ->where('id', $idx[0])
            ->first();

        if ($idx[1] != ''){
        $dataF = DB::table('tb_bahan_file')
            ->where('id', $idx[1])
            ->first();
        }else{
            $dataF= 0;
        }

        if ($idx[2] != '') {
            $dataV = DB::table('tb_bahan_video')
                ->where('id', $idx[2])
                ->first();
        }else{
            $dataV= 0;
        }

        return response()->json([$datanya,$dataF,$dataV]);

    }

    public function SaveMateriEdit (Request $request){


        $data = array(

            'mapel_id' => $request->emapel,
            'judul' => $request->ebab,
            'keterangan' => $request->eketerangan,
            'aktiv' => $request->status,
            'tingkat_kelas' => $request->etkelas,

        );

        $update = ModelMateriTugas::where('id', $request->idnya)
            ->update($data);

        if ($update){

            //ngurus video
            if ($request->ejudulvideo != '' || $request->ejudulvideo != Null || $request->elinkvideo != '' || $request->elinkvideo == Null){
                $cekV = ModelBahanVideo::where('id',$request->idv)->first();

                $formvideo = array(
                    'id_bahan_ajar' => $request->idnya,
                    'judul_video' => $request->ejudulvideo,
                    'link' => $request->elinkvideo
                );
                if (!empty($cekV)){
                    //update
                     ModelBahanVideo::where('id', $request->idv)
                        ->update($formvideo);

                }else{
                    //insertbaru
                    ModelBahanVideo::insert($formvideo);
                }
            }

            //ngurus file
                if ($request->file('efilemateri')) {
                    $filemateri = $request->file('efilemateri');
                    $filenya = Auth::user()->username.'-'.$filemateri->getClientOriginalName();
                    $filemateri->move(public_path('BahanAjarMateri'), $filenya);

                    $cekF = ModelBahanFile::where('id',$request->idf)->first();

                    $formfile = array(

                        'id_bahan_ajar' =>$request->idnya,
                        'judul_file' => $request->ejudulmateri,
                        'file' => $filenya
                    );

                    if (!empty($cekF)){
                        //update
                        ModelBahanFile::where('id', $request->idf)
                            ->update($formfile);

                    }else{
                        //insertbaru
                        ModelBahanFile::insert($formfile);
                    }

                }elseif ($request->ejudulmateri != ''){
                    $formfileJudul = array(
                        'judul_file' => $request->ejudulmateri,
                    );

                    ModelBahanFile::where('id', $request->idf)
                        ->update($formfileJudul);
                }

            return back()->with(['success' => 'Data Materi Berhasil Diubah ']);

        }else{
            return back()->with(['warning' => 'Gagal Mengubah Data Materi!']);
        }






    }

    public function hapusMateri ($id){

        $ids =  base64_decode($id);
        $idx = explode('>', $ids);


        if ($idx[3] != ''){
            ModelBahanVideo::where('id', $idx[3])->delete();
        }
        if ($idx[2] != '') {
            ModelBahanFile::where('id', $idx[2])->delete();
        }

            if ($idx[1] != '' || $idx[1] != Null){
                $files = 'BahanAjarMateri/'.$idx[1];
                File::delete($files);
            }


            $cekVideo =  ModelBahanVideo::where('id_bahan_ajar',$idx[0])->first();
            $cekFile =  ModelBahanFile::where('id_bahan_ajar',$idx[0])->first();


        //    dd($cekVideo);

            if (empty($cekFile) and empty($cekVideo)){

               $hapusM = ModelMateriTugas::find($idx[0]);
               $hapusM->delete();

                return back()->with(['success' => 'Data Materi Berhasil Dihapus !']);

            }else{

                return back()->with(['success' => 'Data Materi Berhasil Dihapus !']);

             }


    }

    public function Tugas () {
        $data['web'] = array(
            'title' => 'Tugas',
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


        return view('Konten.BahanAjarTugas.Tugas', $data);

    }

    public function TambahTugas ($id) {
        $data['web'] = array(
            'title' => 'Tambah Tugas',
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

        return view('Konten.BahanAjarTugas.TambahTugas', $data);

    }

    public function pilihkomponen (Request $request){

        $idx = base64_decode($request->id);
        $params = explode('>', $idx);


        $komponen = DB::table('tb_komponen_nilai')
            ->where('nip', $params[0])
            ->where('kode_mapel', $params[1])
            ->where('tahun', $params[2])
            ->where('semester', $params[3])
            ->where('idkelompokkls', $params[4])
            ->where('type', strtolower($params[6]))
            ->orderBy('id', 'asc')->get();

       return response()->json(['data' => $komponen,'code' => 200 ]);
    }



    public function simpantugas(Request $request){

        $ids = base64_decode($request->master);
        $master = explode('>', $ids);

        $masterInput = array(

            'nip' => $master[0],
            'id_kelompok_kelas' => $master[4],
            'type' => $request->jenisSoal,
            'tgl_mulai' => $request->tglmulai,
            'tgl_selesai' => $request->tglselesai,
            'id_komponen_nilai' => $request->komponen,
            'keterangan' => $request->keterangan,
            'created_at' => date('Y-m-d H:i:s'),
            'id_mapel' => $master[1],
            'tahun' => $master[2],
            'semester' => $master[3],
            'nama_tugas' => $request->namatugas,
            'jenis_tugas' => $master[5]

        );

        $input = ModelTugas::insertGetId($masterInput);

        if ($input):

            if ($request->jenisSoal == 'PG'):

                for ($i=1; $i <= $request->jmlh ; $i++) {
                    $insertsoalpg =  DB::table('tb_soal')->insert(
                        [
                            'id_tugas' => $input,
                            'soal' => $request->input('soal_'.$i),
                            'pilihan_a' => $request->input('jwb_'.$i.'_a'),
                            'pilihan_b' => $request->input('jwb_'.$i.'_b'),
                            'pilihan_c' => $request->input('jwb_'.$i.'_c'),
                            'pilihan_d' => $request->input('jwb_'.$i.'_d'),
                            'pilihan_e' => $request->input('jwb_'.$i.'_e'),
                            'jawaban_benar' => $request->input('kunci_'.$i),
                            'created_at' => date('Y-m-d H:i:s'),

                        ]
                    );

                }

                if ($insertsoalpg){
                    return back()->with(['success' => 'Data Soal Pilihan Ganda Berhasil Disimpan']);
                }else{
                    return back()->with(['warning' => 'Gagal Menyimpan Data Soal Pilihan Ganda!']);
                }

            elseif ($request->jenisSoal == 'Essay'):

                for ($i=1; $i <= $request->jmlh ; $i++) {
                    $insertsoal =  DB::table('tb_soal')->insert(
                        [
                            'id_tugas' => $input,
                            'soal' => $request->input('soal_'.$i),
                            'created_at' => date('Y-m-d H:i:s'),

                        ]
                    );

                }

                if ($insertsoal){
                    return back()->with(['success' => 'Data Soal Essay Berhasil Disimpan']);
                }else{
                    return back()->with(['warning' => 'Gagal Menyimpan Data Soal Essay!']);
                }


            elseif ($request->jenisSoal == 'File'):

                if ($request->file('soal_file')) {
                    $filemateri = $request->file('soal_file');
                    $filenya = Auth::user()->username.'-'.$filemateri->getClientOriginalName();
                    $filemateri->move(public_path('SoalTugas'), $filenya);
                }
                $insertfile =  DB::table('tb_soal')->insert(
                    [
                        'id_tugas' => $input,
                        'soal' => '-',
                        'file' => $filenya,
                        'created_at' => date('Y-m-d H:i:s'),

                    ]
                );

                if ($insertfile){
                    return back()->with(['success' => 'Data Soal File Berhasil Disimpan']);
                }else{
                    return back()->with(['warning' => 'Gagal Menyimpan Data Soal File!']);
                }


            endif;

        else:
            return back()->with(['warning' => 'Gagal Menyimpan Data Soal Master!']);
         endif;

    }

    public function ShowPG ($id){

        $jumlah['jumlahsoalpg'] = $id;
        return view('Konten.BahanAjarTugas.TambahPG', $jumlah);

    }

    public function ShowEssay ($id){

        $jumlah['jumlahsoalpg'] = $id;
        return view('Konten.BahanAjarTugas.TambahEssay', $jumlah);

    }

    public function ShowUploadFile (){

        return view('Konten.BahanAjarTugas.TambahTugasFile');

    }

    public function LihatTugas ($id) {

        $data['web'] = array(
            'title' => 'Lihat Tugas',
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

    public function editsoal ($id) {

        $data['web'] = array(
            'title' => 'Lihat Tugas',
            'subbreadcrumb1' => 'Dashboard',
            'subbreadcrumb2' => 'Interface',
            'subbreadcrumb3' => 'List Data',
        );

        $ids = base64_decode($id);

        $data['tugas'] = DB::table('tb_tugas')
                        ->where('id', $ids )
                        ->where('nip', Auth::user()->username)->first();

        $data['komponen'] = DB::table('tb_komponen_nilai')
            ->select('nama_komponen')
            ->where('id', $data['tugas']->id_komponen_nilai )->first();


        $data['kelas'] =  DB::table('v_tb_jadwal_guru')
                          //  ->select('Namamapel','KelompokKelas', 'Jurusan', 'NamaKelompokKelas')
                            ->where('idMapel', $data['tugas']->id_mapel)
                            ->where('Tahun',  $data['tugas']->tahun)
                             ->where('Semester',  $data['tugas']->semester)
                             ->where('idkelompokkls',  $data['tugas']->id_kelompok_kelas)
                            ->where('NIP', Auth::user()->username)->first();

       // return json_encode( $data['kelas']);

        $data['soal'] = DB::table('tb_soal')
                        ->where('id_tugas', $ids )
                       // ->where('nip', Auth::user()->username)
                        ->orderBy('id', 'asc')
                        ->get();


        return view('Konten.BahanAjarTugas.EditSoal', $data);

    }


    public function downloadTugasFile($id){
        $cariFileDb = DB::table('tb_soal')
                        ->where('id_tugas',$id)->first(); //Mencari model atau objek yang dicari
        $file = public_path() . '/SoalTugas/' . $cariFileDb->file;//Mencari file dari model yang sudah dicari
        return response()->download($file, $cariFileDb->file); //Download file yang dicari berdasarkan nama file
    }

}
