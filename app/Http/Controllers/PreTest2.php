<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;

use function PHPSTORM_META\type;

class PreTest2 extends Controller
{
    public $data = [];

    public function index()
    {
        $siswa = siswa::all();
        $this->data['siswa'] = $siswa;
        return view('pretest2', $this->data);
    }

    public function specific($id)
    {
        $data = siswa::find($id);
        return Response()->json($data);   
    }

    public function create(Request $request)
    {
        try {
            $validateData = $request->validate([
                'nama' => 'required|string|max:255',
                'umur' => 'required|integer|min:1',
                'kelas' => 'required|string|max:50',
            ]);

            siswa::create([
                'nama' => $validateData['nama'],
                'umur' => $validateData['umur'],
                'kelas' => $validateData['kelas'],
            ]);
            
            SweetAlert()->addSuccess('Data berhasil disimpan');
            return redirect()->route('pretest2');
        } catch (\Throwable $th) {
            SweetAlert()->addError('Data gagal disimpan');
            return redirect()->route('pretest2');
        }
    }

    public function edit(Request $request)
    {
        try {
            $data = siswa::find($request->input('edit_id'));

            $validateData = $request->validate([
                'nama' => 'required|string|max:255',
                'umur' => 'required|integer|min:1',
                'kelas' => 'required|string|max:50',
            ]);

            $data->update([
                'nama' => $validateData['nama'],
                'umur' => $validateData['umur'],
                'kelas' => $validateData['kelas'],
            ]);
            
            SweetAlert()->addSuccess('Data berhasil ubah');
            return redirect()->route('pretest2');
        } catch (\Throwable $th) {
            SweetAlert()->addError('Data gagal ubah');
            return redirect()->route('pretest2');
        }
    }

    public function delete($id)
    {
        try {
            $data = siswa::find($id);
            $data->delete();
            SweetAlert()->addSuccess('Data berhasil hapus');
            return redirect()->route('pretest2');
        } catch (\Throwable $th) {
            SweetAlert()->addError('Data gagal hapus');
            return redirect()->route('pretest2');
        }
    }
}
