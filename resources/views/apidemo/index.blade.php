<h2>Jadual Solat Bulan {{ date('F Y') }}</h2>
<pre><h3>
Lokasi : {{$place}}
Sumber : {{$provider}}
</h3></pre>

<table border='1'>
    <thead>
        <tr bgcolor='#00FFFF'>
            <th>Hari</th>
            <th>Subuh</th>
            <th>Syuruk</th>
            <th>Zuhur</th>
            <th>Asar</th>
            <th>Khamis</th>
            <th>Jumaat</th>
        </tr>
    </thead>
    <tbody>
    @foreach($ptime as $i => $ptime)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ date('G:i a', $ptime[0]) }}</td>
            <td>{{ date('G:i a', $ptime[1]) }}</td>
            <td>{{ date('G:i a', $ptime[2]) }}</td>
            <td>{{ date('G:i a', $ptime[3]) }}</td>
            <td>{{ date('G:i a', $ptime[4]) }}</td>
            <td>{{ date('G:i a', $ptime[5]) }}</td>
        </tr>
    @endforeach
    </tbody>
</table>