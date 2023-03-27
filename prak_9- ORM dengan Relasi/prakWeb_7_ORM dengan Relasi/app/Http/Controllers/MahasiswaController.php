<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Kelas;
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

        // if (!empty($search)) {
        //     $mahasiswas = Mahasiswa::where(
        //         'nama',
        //         'like',
        //         "%$search%"
        //     )->paginate(5);
        // } else {
        //     $mahasiswas = Mahasiswa::paginate(5);
        // }

        $mahasiswas = Mahasiswa::with('kelas')->paginate(3);
        $paginate = Mahasiswa::orderBy('nim', 'asc')->paginate(3);

        return view('mahasiswas.index', [
            'mahasiswas' => $mahasiswas,
            'paginate' => $paginate,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::all();
        //halaman untuk menambahkan data mahasiswa baru
        return view('mahasiswas.create', ['kelas' => $kelas]);
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
            'kelas_id' => 'required',
            'jurusan' => 'required',
            'no_handphone' => 'required',
        ]);

        $mahasiswa = new Mahasiswa();
        $mahasiswa->nim = $request->get('nim');
        $mahasiswa->nama = $request->get('nama');
        $mahasiswa->jurusan = $request->get('jurusan');
        $mahasiswa->no_handphone = $request->get('no_handphone');
        $mahasiswa->save();

        $kelas = new Kelas();
        $kelas->id = $request->get('kelas_id');

        $mahasiswa->kelas()->associate($kelas);
        $mahasiswa->save();

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
        $mahasiswa = Mahasiswa::with('kelas')
            ->where('nim', $nim)
            ->first();

        return view('mahasiswas.detail', compact('mahasiswa'));
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
    public function update(Request $request, string $nim)
    {
        //melakukan validasi data
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'kelas_id' => 'required',
            'jurusan' => 'required',
            'no_handphone' => 'required',
        ]);

        $mahasiswa = Mahasiswa::with('kelas')
            ->where('nim', $nim)
            ->first();
        $mahasiswa->nim = $request->get('nim');
        $mahasiswa->nama = $request->get('nama');
        $mahasiswa->jurusan = $request->get('jurusan');
        $mahasiswa->no_handphone = $request->get('no_handphone');
        $mahasiswa->save();

        $kelas = new Kelas();
        $kelas->id = $request->get('kelas_id');

        $mahasiswa->kelas()->associate($kelas);
        $mahasiswa->save();

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
