<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboard extends Controller
{

    public function index () {
        $data['web'] = array(
            'title' => 'Dashboard',
            'subbreadcrumb1' => '',
            'subbreadcrumb2' => ''
        );
        return view('Konten.Dashboard', $data);
    }

}
