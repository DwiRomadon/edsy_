<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\QuizUjian;
use App\Http\Controllers\BahanAjarTugas;
use App\Http\Controllers\LaporanKinerja;
use App\Http\Controllers\PresensiKelas;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Profil;
use App\Http\Controllers\ManajemenNilai;
use App\Http\Controllers\Walikelas;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => ['guestAuth']], function() {

    Route::get('/auth/login', [AuthController::class, 'login'])->name('login');
    Route::post('/auth/postlogin', [AuthController::class, 'postlogin'])->name('aksilogin');
    // Route::get('/auth/logout', [AuthController::class, 'logout'])->name('logout');
});



// Route::group(['middleware' => ['auth','ChekRole:guru']], function() {
Route::group(['middleware' => ['guru']], function() {

    Route::get('/', [Dashboard::class, 'index']);
    Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');

    Route::get('/presensikelas/vpresensikelas', [PresensiKelas::class, 'PresensiKelas'])->name('presensikelas');
    Route::get('/presensikelas/rekapabsenkelas', [PresensiKelas::class, 'RekapPresensi'])->name('rekappresensi');
    Route::get('/presensikelas/inputabsen/{id}', [PresensiKelas::class, 'InputAbsen'])->name('inputabsen');
    Route::get('/presensikelas/datarekapabsen', [PresensiKelas::class, 'DataRekap'])->name('datarekapabsen');
    Route::post('/presensikelas/filterrekap', [PresensiKelas::class, 'filterRekap'])->name('filterRekap');

    Route::get('/laporankinerja/jadwalmengajar', [LaporanKinerja::class, 'JadwalMengajar'])->name('jadwalmengajar');
    Route::get('/laporankinerja/laporankerja', [LaporanKinerja::class, 'LaporanKerja'])->name('laporankerja');
    Route::get('/laporankinerja/presensikerja', [LaporanKinerja::class, 'PresensiKerja'])->name('presensikerja');

    Route::get('/manajemennilai/inputnilai', [ManajemenNilai::class, 'InputNilai'])->name('inputnilai');
    Route::get('/manajemennilai/inputnilaipengetahuan/{id}', [ManajemenNilai::class, 'InputNilaiPengetahuan'])->name('inputnilaipengetahuan');
    Route::get('/manajemennilai/inputnilaiketerampilan/{id}', [ManajemenNilai::class, 'InputNilaiKeterampilan'])->name('inputnilaiketerampilan');
    Route::get('/manajemennilai/komponennilai', [ManajemenNilai::class, 'KomponenNilai'])->name('komponennilai');
    Route::get('/manajemennilai/rekapnilai', [ManajemenNilai::class, 'RekapNilai'])->name('rekapnilai');
    Route::get('/manajemennilai/daftarkomponennilai/{id}', [ManajemenNilai::class, 'ViewKomponenNilai'])->name('daftarkomponennilai');
    Route::post('/manajemennilai/cekmapelkomponen', [ManajemenNilai::class, 'CekMapel'])->name('cekmapelkomponen');
    Route::post('/manajemennilai/simpankomponen', [ManajemenNilai::class, 'SimpanKomponen'])->name('simpankomponen');
    Route::get('/manajemennilai/hapuskomponen/{id}', [ManajemenNilai::class, 'HapusKomponen'])->name('hapuskomponen');
    Route::post('/manajemennilai/cekeditkomponen', [ManajemenNilai::class, 'CekEditKomponen'])->name('cekeditkomponen');
    Route::put('/manajemennilai/simpanubah/{id}', [ManajemenNilai::class, 'SimpanUbah'])->name('simpanubah');

    Route::get('/bahanajardantugas/formlink', [BahanAjarTugas::class, 'formlink'])->name('formlink');
    Route::get('/bahanajardantugas/formfile', [BahanAjarTugas::class, 'formfile'])->name('formfile');
    Route::get('/bahanajardantugas/tambahsoal/{id}', [BahanAjarTugas::class, 'TambahTugas'])->name('tambahtugas');

    Route::post('/bahanajardantugas/pilihkomponen', [BahanAjarTugas::class, 'pilihkomponen'])->name('pilihkomponen');
    Route::post('/bahanajardantugas/simpantugas', [BahanAjarTugas::class, 'simpantugas'])->name('simpantugas');
    Route::get('/bahanajardantugas/ubahsoal/{id}', [BahanAjarTugas::class, 'editsoal'])->name('ubahsoal');

    Route::put('/bahanajardantugas/simpaneditsoal/{id}', [QuizUjian::class, 'simpaneditsoal'])->name('simpaneditsoal');


    Route::get('/soalpg/{id}', [BahanAjarTugas::class, 'ShowPG'])->name('soalpg');
    Route::get('/soalessay/{id}', [BahanAjarTugas::class, 'ShowEssay'])->name('soalessay');
    Route::get('/uploadsoalfile', [BahanAjarTugas::class, 'ShowUploadFile'])->name('uploadsoalfile');

    Route::get('/bahanajardantugas/downloadfiletugas/{id}', [BahanAjarTugas::class, 'downloadTugasFile'])->name('downloadfiletugas');

    Route::get('/bahanajardantugas/materi', [BahanAjarTugas::class, 'Materi'])->name('materi');
    Route::post('/bahanajardantugas/materi', [BahanAjarTugas::class, 'uploadMateri'])->name('uploadMateri');

    Route::get('/bahanajardantugas/tugas', [BahanAjarTugas::class, 'Tugas'])->name('tugas');
    Route::get('/bahanajardantugas/detailmateri/{id}', [BahanAjarTugas::class, 'DetailMateri'])->name('detailmateri');
    Route::get('/bahanajardantugas/lihattugas/{id}', [BahanAjarTugas::class, 'LihatTugas'])->name('lihattugas');
    Route::get('/bahanajardantugas/hapusmateri/{id}', [BahanAjarTugas::class, 'hapusMateri'])->name('hapusmateri');
    Route::post('/bahanajardantugas/getdetailmateri', [BahanAjarTugas::class, 'GetDetailMateri'])->name('getdetailmateri');
    Route::post('/bahanajardantugas/simpaneditmateri', [BahanAjarTugas::class, 'SaveMateriEdit'])->name('simpaneditmateri');
    Route::post('/bahanajardantugas/getvideo', [BahanAjarTugas::class, 'Getvideo'])->name('getvideo');
    Route::get('/bahanajardantugas/downloadmateri/{id}', [BahanAjarTugas::class, 'downloadMateri'])->name('downloadmateri');

    Route::get('/quizdanujian/tambahsoal/{id}', [QuizUjian::class, 'TambahSoal'])->name('tambahsoal');

    Route::get('/quizdanujian/quiz', [QuizUjian::class, 'Quiz'])->name('quiz');
    Route::get('/quizdanujian/lihatquiz/{id}', [QuizUjian::class, 'LihatQuiz'])->name('lihatquiz');
    Route::get('/quizdanujian/ujian', [QuizUjian::class, 'Ujian'])->name('ujian');
    Route::get('/quizdanujian/lihatujian/{id}', [QuizUjian::class, 'LihatUjian'])->name('lihatujian');

    Route::get('/quizdanujian/lihatsoal', [QuizUjian::class, 'LihatSoal'])->name('lihatsoal');

    Route::get('/walikelas/kelolanilai', [Walikelas::class, 'KelolaNilai'])->name('kelolanilai');
    Route::get('/walikelas/datanilai', [Walikelas::class, 'DataNilai'])->name('datanilai');
    Route::get('/walikelas/kelolapresensi', [Walikelas::class, 'KelolaPresensi'])->name('kelolapresensi');
    Route::get('/walikelas/kelolaraport', [Walikelas::class, 'KelolaRaport'])->name('kelolaraport');
    Route::get('/walikelas/lihatraport', [Walikelas::class, 'ViewRaport'])->name('lihatraport');

    Route::get('/profil/biodata', [Profil::class, 'Biodata'])->name('biodata');
    Route::get('/profil/katasandi', [Profil::class, 'Password'])->name('password');

    Route::get('/auth/logout', [AuthController::class, 'logout'])->name('logout');

});


// Route::group(['middleware' => ['siswa']], function() {
//     Route::get('/admin', function () { return view('welcome'); })->name('siswa');
// });

Route::get('/welcome', function () { return view('welcome'); });
