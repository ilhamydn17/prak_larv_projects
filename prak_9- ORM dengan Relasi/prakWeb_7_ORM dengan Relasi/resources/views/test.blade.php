<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tesiing</title>
</head>

<body>

    {{-- @dd($mhs) --}}

    <table>
        <tr>
            <th>Nama</th>
            <th>Matkul</th>
        </tr>
        {{-- <tr>
            <td>{{ $mhs->nama }}</td>
            @foreach ($mhs->matakuliah as $item)
            <td>{{ $item->nama_matkul }}, {{ $item->sks }} SKS</td>
            @endforeach
        </tr> --}}
        @foreach ($mhs as $m)
            <tr>
                <td>{{ $m->nama }}</td>
                @foreach ($m->matakuliah as $item)
                <td>{{ $item->nama_matkul }},{{ $item->sks }} SKS, {{ $item->pivot->nilai }} , {{ $item->pivot->mata_kuliah_id }}| </td>
                @endforeach
            </tr>
        @endforeach
    </table>

</body>

</html>
