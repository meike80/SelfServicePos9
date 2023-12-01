<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Profil</title>
</head>
<body>

    <h1>Profil</h1>
    <hr>
    <table border='0'>
        @if(isset($nama) && $nama == 'Lilis Risnawati')
    <tr>
        <td>Nama Saya :</td>
        <td>{{ $nama }}</td>
    </tr>
        @endif

    </table>

    <hr>
    <h1>Contoh Penerapan</h1>
    <br> Nama= Lilis Risnawati 

    <h1>Contoh forelse </h1>
    <table>
        @forelse(['Risna'] as $data)
            <tr>
                <td> {{ $data }} </td>
            </tr>
        @empty
            <tr>
                <td colspan="2">Data tidak ditemukan</td>
            </tr>
        @endforelse
    </table>

    <h1>Contoh for</h1>
    <table>
        @for($i = 0; $i < 5; $i++)
            <tr>
                <td>{{ $i }}</td>
            </tr>
        @endfor
    </table>

    <hr>

    <h1>Contoh pengulangan</h1>
    <table>
        @foreach(['Risna'] as $data)
            <tr>
                <td>{{ $data }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
