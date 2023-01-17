<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa as Model;
use App\Models\User;

class SiswaController extends Controller
{
    private $viewIndex = 'siswa_index';
    private $viewCreate = 'siswa_form';
    private $routePrefix = 'siswa';

    private $accessClass = 'Data Siswa';
    
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
            'title' => 'Tambah ' . $this->accessClass,
            'wali' => User::where('akses', 'wali')->pluck('name', 'id')
        ];
        return view('operator.' . $this->viewCreate, $data);
    }

    public function store(Request $request)
    {
        $requestData = $request->validate([
            'wali_id' => 'nullable',
            'nama' => 'required',
            'nisn' => 'required|unique:siswas',
            'jurusan' => 'required',
            'kelas' => 'required',
            'angkatan' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:5000'
        ]);

        if ($request->hasFile('foto')) {
            $requestData['foto'] = $request->file('foto')->store('public');
        }

        $requestData['user_id'] = auth()->user()->id;

        if ($request->filled('wali_id')) {
            $requestData['wali_status'] = 'ok';
        }

        Model::create($requestData);
        flash('Data berhasil disimpan');
        return redirect()->route($this->routePrefix . '.index');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
