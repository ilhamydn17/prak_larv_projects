@extends('Layouts.layout')

@section('content')
@if ($mahasiswas[0] == null)
<div class="alert alert-danger mt-3">
    Gaada bestiee
</div>
@endif
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2">
                <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
            </div>
            {{-- TUGAS PRAKTIKUM : MEMBUAT FITUR SEARCH --}}
            <form action="{{ route('mahasiswa.search') }}" method="POST">
                <div class="float-left my-2 input-group" style="width:300px">
                    @csrf
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon1">Cari</button>
                    <input type="text" class="form-control" name="src" value="{{ request('src') }}"
                        placeholder="berdasar nama..." aria-label="Example text with button addon"
                        aria-describedby="button-addon1">
                </div>
                <div class="float-right my-2">
                    <a class="btn btn-success" href="{{ route('mahasiswa.create') }}"> Input Mahasiswa</a>
                </div>
            </form>
        </div>
    </div>
    </div>
    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>Nim</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                {{-- <th>No. HP</th> --}}
                <th>Action</th>
            </tr>
            @foreach ($mahasiswas as $mahasiswa)
                <tr>

                    <td>{{ $mahasiswa->nim }}</td>
                    <td>{{ $mahasiswa->nama }}</td>
                    <td>{{ $mahasiswa->kelas->nama_kelas }}</td>
                    <td>{{ $mahasiswa->jurusan }}</td>
                    {{-- <td>{{ $mahasiswa->no_handphone }}</td> --}}
                    <td>
                        <form action="{{ route('mahasiswa.destroy', $mahasiswa->nim) }}" method="POST" class="d-flex p-1">
                            <a class="btn btn-info col-3 mr-1" href="{{ route('mahasiswa.show', $mahasiswa->nim) }}">Show</a>
                            <a class="btn btn-primary col-3 mr-1" href="{{ route('mahasiswa.edit', $mahasiswa->nim) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                            <a href="{{ route('mahasiswa.nilai',$mahasiswa->nim) }}" class="btn btn-warning">Nilai</a>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $mahasiswas->links() }}
    </div>
@endsection
