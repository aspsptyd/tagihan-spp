<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa as Model; 

class SiswaController extends Controller
{
    private $viewIndex = 'siswa_index';
    private $viewCreate = 'siswa_form';
    private $viewEdit = 'siswa_form';
    private $routePrefix = 'siswa';

    private $accessClass = 'Data Wali Murid';
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('operator.' . $this->viewIndex);
    }
}
