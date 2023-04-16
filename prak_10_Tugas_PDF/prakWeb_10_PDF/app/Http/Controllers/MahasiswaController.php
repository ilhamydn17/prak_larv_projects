<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMahasiswaRequest;
use App\Http\Requests\UpdateMahasiswaRequest;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          // mengambil inputan yang memiliki name 'src'
          $search = request('src');

          if (!empty($search)) {
              $mahasiswas = Mahasiswa::where(
                  'nama',
                  'like',
                  "%$search%"
              )->paginate(3);
          } else {
              $mahasiswas = Mahasiswa::with('kelas')->paginate(3);
          }

          // $mahasiswas = Mahasiswa::with('kelas')->paginate(3);
          // $paginate = Mahasiswa::orderBy('nim', 'asc')->paginate(3);

          return view('mahasiswas.index', [
              'mahasiswas' => $mahasiswas,
          ]);
    }

    public function search(Request $request) {
        $mahasiswas = Mahasiswa::where('nama', 'like', "%$request->src%")->paginate(3);
        return view('mahasiswas.index', compact('mahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::all();
        //halaman untuk menambahkan data mahasiswa baru
        return view('mahasiswas.create', compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMahasiswaRequest $request)
    {
        Mahasiswa::create($request->validated());
        // jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $nim)
    {
        //menampilkan detail mahasiswa berdasarkan nim
        $mahasiswa = Mahasiswa::with('kelas')
            ->where('nim', $nim)
            ->first();

            return view('mahasiswas.detail', compact('mahasiswa'));
    }

    public function showMatkul(string $nim)
    {
        // menampilkan detail mahasiswa berdasarkan nim
        $mahasiswa = Mahasiswa::with(['matakuliah','kelas'])
            ->where('nim', $nim)
            ->first();

        return view('mahasiswas.detail_matkul', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $nim)
    {
        //menampilkan data mahasiswa yang akan diedit berdasarkan nim
        $mahasiswa = Mahasiswa::with('kelas')
            ->where('nim', $nim)
            ->first();
        $kelas = Kelas::all();

        return view('mahasiswas.edit', compact('mahasiswa', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMahasiswaRequest $request, string $nim)
    {
         //update data mahasiswa
         Mahasiswa::updated($request->validated());

         // jika data behasil diupdate, akan kembali ke halaman home/index
         return redirect()
             ->route('mahasiswa.index')
             ->with('success', 'Data Mahasiswa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $nim)
    {
        //fungsi eloquent untuk menghapus data
        Mahasiswa::find($nim)->delete();
        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil dihapus');
    }
}
