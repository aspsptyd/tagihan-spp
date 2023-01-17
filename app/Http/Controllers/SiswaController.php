<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa as Model; 

class SiswaController extends Controller
{
    private $viewIndex = 'siswa_index';
    private $viewCreate = 'siswa_form';
    private $routePrefix = 'siswa';

    private $accessClass = 'Data Siswa';
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('operator.' . $this->viewIndex, [
            'models' => Model::latest()
                ->paginate(50),
            'routePrefix' => $this->routePrefix,
            'title' => $this->accessClass
        ]);
    }

    public function create()
    {
        $data = [
            'model' => new Model(),
            'method' => 'POST',
            'route' => $this->routePrefix . '.store',
            'button' => 'SIMPAN',
            'title' => 'Tambah ' . $this->accessClass
        ];
        return view('operator.' . $this->viewCreate, $data);
    }

}
