<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class SiswaUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        // Mengambil segment untuk mendapatkan data => dd(Request::segment(3)); => {URL}/operator/siswa/31 atau dengan cara
        // dd($this->siswa);
        return [
            'wali_id' => 'nullable',
            'nama' => 'required',
            'nisn' => 'required|unique:siswas,nisn,' . $this->siswa,
            // 'nisn' => 'required|unique:siswas,nisn,' . Request::segment(3),
            'jurusan' => 'required',
            'kelas' => 'required',
            'angkatan' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:5000'
        ];
    }
}
