@extends('Layouts.layout')

@section('content')

    <div class="container mt-5">

        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Tambah Mahasiswa
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your i
                            nput.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post" action="{{ route('mahasiswa.store') }}" id="myForm">
                        @csrf
                        <div class="form-group">
                            <label for="Nim">Nim</label>
                            <br>
                            <input type="text" name="nim" class="formcontrol" id="Nim" aria-describedby="Nim">
                        </div>
                        <div class="form-group">
                            <label for="Nama">Nama</label>
                            <br>
                            <input type="Nama" name="nama" class="formcontrol" id="Nama" aria-describedby="Nama">
                        </div>
                        <div class="form-group">
                            <label for="Kelas">Kelas</label>
                            <br>
                            <input type="Kelas" name="kelas" class="formcontrol" id="Kelas"
                                aria-describedby="password">
                        </div>
                        <div class="form-group">
                            <label for="Jurusan">Jurusan</label>
                            <br>
                            <input type="Jurusan" name="jurusan" class="formcontrol" id="Jurusan"
                                aria-describedby="Jurusan">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <br>
                            <input type="email" name="email" class="formcontrol" id="Email"
                                aria-describedby="Email">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <br>
                            <input type="date" name="tanggal_lahir" class="formcontrol" id="tanggal_lahir"
                                aria-describedby="Tanggal_lahir">
                        </div>
                        <div class="form-group">
                            <label for="No_Handphone">No_Handphone</label>
                            <br>
                            <input type="No_Handphone" name="no_handphone" class="formcontrol" id="No_Handphone"
                                aria-describedby="No_Handphone">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
