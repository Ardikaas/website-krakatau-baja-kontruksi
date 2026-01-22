<h2>Laporan Whistle Blowing System</h2>

<p><strong>Nomor Tiket:</strong> {{ $data['ticket'] }}</p>
<p><strong>Judul Kasus:</strong> {{ $data['judul'] }}</p>
<p><strong>Tipe Insiden:</strong> {{ $data['tipe'] }}</p>

<p><strong>Deskripsi:</strong></p>
<p>{{ $data['kejadian'] }}</p>

@if(!empty($data['isUser']))
<p>
    Terima kasih telah menyampaikan laporan.
    Nomor tiket ini dapat digunakan untuk tindak lanjut.
</p>
@endif
