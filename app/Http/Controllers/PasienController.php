<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PasienController extends Controller
{
    public function index()
    {
        $pasiens = Pasien::all();

        return view('pages.pasien.index', [
            'pasiens' => $pasiens,
        ]);
    }

    public function create()
    {
        return view('pages.pasien.create');
    }

   public function edit(Pasien $pasien)
{
    return view('pages.pasien.edit', compact('pasien'));
}

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_pasien' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'required|date',
            'no_telp' => 'required|string|max:13',
            'alamat' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $pasien = Pasien::findOrFail($id);
        $pasien->update($request->only([
            'nama_pasien', 'jenis_kelamin', 'tanggal_lahir', 'no_telp', 'alamat'
        ]));

        return redirect('/pasien')->with('success', 'Data pasien berhasil diperbarui');
    }

    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();

        return redirect('/pasien')->with('success', 'Berhasil menghapus data');
    }

    public function deleteConfirmation($id)
{
    $pasien = Pasien::findOrFail($id);
    return view('pages.pasien.delete', compact('pasien'));
}


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_pasien' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'required|date',
            'no_telp' => 'required|string|max:13',
            'alamat' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (auth()->user()->pasien) {
            return redirect()->back()->with('error', 'Anda sudah terdaftar sebagai pasien');
        }

        try {
            auth()->user()->pasien()->create([
                'nama_pasien' => $request->nama_pasien,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tanggal_lahir' => $request->tanggal_lahir,
                'no_telp' => $request->no_telp,
                'alamat' => $request->alamat,
            ]);

            return redirect('/')->with('success', 'Pendaftaran pasien berhasil!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }
}
