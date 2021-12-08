<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BimbinganKonseling extends Controller
{

    public function index () {
        $data['web'] = array(
            'title' => 'Dashboard'
        );
        return view('Konten.Dashboard', $data);
    }

}
