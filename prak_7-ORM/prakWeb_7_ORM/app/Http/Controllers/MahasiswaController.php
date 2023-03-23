<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //mengambil data dari model mahasiswa
        // $mahasiswas = Mahasiswa::all();

        // TUGAS PRAKTIKUM : MEMBUAT FITUR SEARCH BERDASAR NAMA MAHASISWA
        $search = request('src');

        if (!empty($search)) {
            $mahasiswas = Mahasiswa::where(
                'nama',
                'like',
                "%$search%"
            )->paginate(5);
        } else {
            $mahasiswas = Mahasiswa::paginate(5);
        }

        // -- TUGAS PRAKTIKUM : MEMBUAT PAGINATION --
        // $mahasiswas = Mahasiswa::paginate(5);

        //mengembalikan ke view home/index, dengan mengirimkan data2 mahasiswa
        return view('mahasiswas.index', compact('mahasiswas'));
        with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //halaman untuk menambahkan data mahasiswa baru
        return view('mahasiswas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //untuk melakukan validasi data
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'no_handphone' => 'required',
        ]);

        // fungsi eloquent untuk menambah data
        Mahasiswa::create($request->all());

        // jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $nim)
    {
        //menampilkan detail mahasiswa berdasarkan nim
        $mahasiswa = Mahasiswa::find($nim);

        return view('mahasiswas.detail', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $nim)
    {
        //menampilkan data mahasiswa yang akan diedit berdasarkan nim
        $mahasiswa = Mahasiswa::find($nim);

        return view('mahasiswas.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $nim)
    {
        //melakukan validasi data
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'no_handphone' => 'required',
        ]);

        // fungsi eloquent untuk mengupdate data inputan
        Mahasiswa::find($nim)->update($request->all());

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
