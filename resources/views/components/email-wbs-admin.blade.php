<h2>Laporan WBS Baru</h2>

<hr>

<p><strong>Nomor Tiket:</strong> {{ $data['ticket'] }}</p>
<p><strong>Judul Kasus:</strong> {{ $data['judul'] }}</p>
<p><strong>Tipe Insiden:</strong> {{ $data['tipe'] }}</p>

<h3>Detail Kejadian</h3>
<p>{{ $data['kejadian'] }}</p>

<h3>Terlapor</h3>
<p>Nama: {{ $data['nama_terlapor'] ?? '-' }}</p>
<p>Jabatan: {{ $data['jabatan_terlapor'] ?? '-' }}</p>

<h3>Lokasi & Waktu</h3>
<p>Lokasi: {{ $data['lokasi'] ?? '-' }}</p>
<p>Tanggal: {{ $data['tanggal'] ?? '-' }}</p>

<h3>Dampak</h3>
<p>Perkiraan Kerugian: Rp {{ number_format($data['kerugian'] ?? 0) }}</p>

<h3>Pelapor</h3>
<p>Nama: {{ $data['nama_pelapor'] ?? 'Anonim' }}</p>
<p>Email: {{ $data['email_pelapor'] ?? '-' }}</p>
<p>Kontak: {{ $data['kontak'] ?? '-' }}</p>

@if($data['file'])
<h3>Lampiran</h3>
<p>
    File tersimpan di server:<br>
    <code>{{ $data['file'] }}</code>
</p>
@endif

<hr>

<p style="color:red">
    Email ini bersifat rahasia. Dilarang menyebarkan isi laporan tanpa izin.
</p>
