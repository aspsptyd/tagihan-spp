<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiswaStoreRequest;
use App\Http\Requests\SiswaUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Siswa as ModelSiswa;
use App\Models\User as ModelUser;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    private $viewIndex = 'siswa_index';
    private $viewCreate = 'siswa_form';
    private $viewEdit = 'siswa_form';
    private $viewShow = 'siswa_show';
    private $routePrefix = 'siswa';

    private $accessClass = 'Data Siswa';
    
    public function index(Request $request)
    {
        if  ($request->filled('q')) {
            $models = ModelSiswa::search($request->q)->paginate(10);
        } else {
            $models = ModelSiswa::latest()->paginate(10);
        }

        return view('operator.' . $this->viewIndex, [
            'models' => $models,
            'routePrefix' => $this->routePrefix,
            'title' => $this->accessClass
        ]);
    }

    public function create()
    {
        $data = [
            'model' => new ModelSiswa(),
            'method' => 'POST',
            'route' => $this->routePrefix . '.store',
            'button' => 'SIMPAN',
            'title' => 'Tambah ' . $this->accessClass,
            'wali' => ModelUser::where('akses', 'wali')->pluck('name', 'id')
        ];
        return view('operator.' . $this->viewCreate, $data);
    }

    public function store(SiswaStoreRequest $request)
    {
        $requestData = $request->validated();

        if ($request->hasFile('foto')) {
            $requestData['foto'] = $request->file('foto')->store('public');
        }

        $requestData['user_id'] = auth()->user()->id;

        if ($request->filled('wali_id')) {
            $requestData['wali_status'] = 'ok';
        }

        ModelSiswa::create($requestData);
        flash('Data berhasil disimpan');
        return redirect()->route($this->routePrefix . '.index');
    }

    public function show($id)
    {
        return view('operator.' . $this->viewShow, [
            'model' => ModelSiswa::find($id),
            'title' => 'Detail Siswa',
            'access_menu' => $this->accessClass
        ]);
    }

    public function edit($id)
    {
        $data = [
            'model' => ModelSiswa::findOrFail($id),
            'method' => 'PUT',
            'route' => [$this->routePrefix . '.update', $id],
            'button' => 'UPDATE',
            'title' => 'Ubah ' . $this->accessClass,
            'wali' => ModelUser::where('akses', 'wali')->pluck('name', 'id')
        ];

        return view('operator.' . $this->viewEdit, $data);
    }

    public function update(SiswaUpdateRequest $request, $id)
    {
        $requestData = $request->validated();

        $model = ModelSiswa::find($id);

        if ($request->hasFile('foto')) {
            !is_null($model->foto) && Storage::delete($model->foto);
            $requestData['foto'] = $request->file('foto')->store('public');
        }

        $requestData['user_id'] = auth()->user()->id;

        if ($request->filled('wali_id')) {
            $requestData['wali_status'] = 'ok';
        }

        $model->fill($requestData);
        $model->save();

        flash('Data berhasil diupdate');
        return redirect()->route($this->routePrefix . '.index');
    }

    public function destroy($id)
    {
        $model = ModelSiswa::find($id);
        Storage::delete($model->foto);
        $model->delete();
        flash('Data berhasil dihapus');
        return back();
    }
}
