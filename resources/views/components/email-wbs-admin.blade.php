<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan WBS Baru</title>
</head>
<body style="margin:0; padding:0; background-color:#f4f6f9; font-family: Arial, Helvetica, sans-serif;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background-color:#f4f6f9; padding:40px 0;">
        <tr>
            <td align="center">
                <table role="presentation" width="600" cellspacing="0" cellpadding="0" style="background-color:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 2px 8px rgba(0,0,0,0.08);">

                    {{-- Header --}}
                    <tr>
                        <td style="background: linear-gradient(135deg, #8b0000 0%, #cc3333 100%); padding:32px 40px; text-align:center;">
                            <h1 style="margin:0; color:#ffffff; font-size:22px; font-weight:700; letter-spacing:0.5px;">
                                Laporan WBS Baru
                            </h1>
                            <p style="margin:8px 0 0; color:rgba(255,255,255,0.85); font-size:13px;">
                                Whistle Blowing System — PT Krakatau Baja Konstruksi
                            </p>
                        </td>
                    </tr>

                    {{-- Body --}}
                    <tr>
                        <td style="padding:32px 40px;">

                            {{-- Ticket Number --}}
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="margin-bottom:24px;">
                                <tr>
                                    <td style="padding:14px 18px; background-color:#fff3f3; border-left:4px solid #cc3333; border-radius:6px;">
                                        <p style="margin:0 0 4px; font-size:11px; color:#666; text-transform:uppercase; letter-spacing:1px; font-weight:600;">Nomor Tiket</p>
                                        <p style="margin:0; font-size:18px; color:#8b0000; font-weight:700; font-family: 'Courier New', monospace;">{{ $data['ticket'] }}</p>
                                    </td>
                                </tr>
                            </table>

                            {{-- Kasus Info --}}
                            <p style="margin:0 0 8px; font-size:12px; color:#888; text-transform:uppercase; letter-spacing:0.8px; font-weight:600;">Informasi Kasus</p>
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="border:1px solid #e8ecf0; border-radius:8px; overflow:hidden; margin-bottom:24px;">
                                <tr>
                                    <td style="padding:12px 18px; background-color:#f8f9fb; border-bottom:1px solid #e8ecf0; font-size:12px; color:#888; text-transform:uppercase; letter-spacing:0.8px; font-weight:600; width:160px;">
                                        Judul Kasus
                                    </td>
                                    <td style="padding:12px 18px; border-bottom:1px solid #e8ecf0; font-size:14px; color:#333; font-weight:600;">
                                        {{ $data['judul'] }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:12px 18px; background-color:#f8f9fb; border-bottom:1px solid #e8ecf0; font-size:12px; color:#888; text-transform:uppercase; letter-spacing:0.8px; font-weight:600;">
                                        Tipe Insiden
                                    </td>
                                    <td style="padding:12px 18px; border-bottom:1px solid #e8ecf0; font-size:14px; color:#333;">
                                        <span style="display:inline-block; background-color:#fff3f3; color:#8b0000; padding:4px 12px; border-radius:20px; font-size:12px; font-weight:600;">
                                            {{ $data['tipe'] }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:12px 18px; background-color:#f8f9fb; border-bottom:1px solid #e8ecf0; font-size:12px; color:#888; text-transform:uppercase; letter-spacing:0.8px; font-weight:600;">
                                        Lokasi
                                    </td>
                                    <td style="padding:12px 18px; border-bottom:1px solid #e8ecf0; font-size:14px; color:#333;">
                                        {{ $data['lokasi'] ?? '-' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:12px 18px; background-color:#f8f9fb; font-size:12px; color:#888; text-transform:uppercase; letter-spacing:0.8px; font-weight:600;">
                                        Tanggal Kejadian
                                    </td>
                                    <td style="padding:12px 18px; font-size:14px; color:#333;">
                                        {{ $data['tanggal'] ?? '-' }}
                                    </td>
                                </tr>
                            </table>

                            {{-- Kejadian --}}
                            <div style="margin-bottom:24px;">
                                <p style="margin:0 0 8px; font-size:12px; color:#888; text-transform:uppercase; letter-spacing:0.8px; font-weight:600;">Detail Kejadian</p>
                                <div style="padding:16px 18px; background-color:#fafbfc; border:1px solid #e8ecf0; border-radius:8px; font-size:14px; color:#333; line-height:1.7;">
                                    {{ $data['kejadian'] }}
                                </div>
                            </div>

                            {{-- Terlapor --}}
                            <p style="margin:0 0 8px; font-size:12px; color:#888; text-transform:uppercase; letter-spacing:0.8px; font-weight:600;">Data Terlapor</p>
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="border:1px solid #e8ecf0; border-radius:8px; overflow:hidden; margin-bottom:24px;">
                                <tr>
                                    <td style="padding:12px 18px; background-color:#f8f9fb; border-bottom:1px solid #e8ecf0; font-size:12px; color:#888; text-transform:uppercase; letter-spacing:0.8px; font-weight:600; width:160px;">
                                        Nama
                                    </td>
                                    <td style="padding:12px 18px; border-bottom:1px solid #e8ecf0; font-size:14px; color:#333;">
                                        {{ $data['nama_terlapor'] ?? '-' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:12px 18px; background-color:#f8f9fb; font-size:12px; color:#888; text-transform:uppercase; letter-spacing:0.8px; font-weight:600;">
                                        Jabatan
                                    </td>
                                    <td style="padding:12px 18px; font-size:14px; color:#333;">
                                        {{ $data['jabatan_terlapor'] ?? '-' }}
                                    </td>
                                </tr>
                            </table>

                            {{-- Dampak --}}
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="margin-bottom:24px;">
                                <tr>
                                    <td style="padding:14px 18px; background-color:#fff8e6; border-left:4px solid #e6a800; border-radius:6px;">
                                        <p style="margin:0 0 4px; font-size:11px; color:#666; text-transform:uppercase; letter-spacing:1px; font-weight:600;">Perkiraan Kerugian</p>
                                        <p style="margin:0; font-size:16px; color:#8b6900; font-weight:700;">Rp {{ number_format($data['kerugian'] ?? 0) }}</p>
                                    </td>
                                </tr>
                            </table>

                            {{-- Pelapor --}}
                            <p style="margin:0 0 8px; font-size:12px; color:#888; text-transform:uppercase; letter-spacing:0.8px; font-weight:600;">Data Pelapor</p>
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="border:1px solid #e8ecf0; border-radius:8px; overflow:hidden; margin-bottom:24px;">
                                <tr>
                                    <td style="padding:12px 18px; background-color:#f8f9fb; border-bottom:1px solid #e8ecf0; font-size:12px; color:#888; text-transform:uppercase; letter-spacing:0.8px; font-weight:600; width:160px;">
                                        Nama
                                    </td>
                                    <td style="padding:12px 18px; border-bottom:1px solid #e8ecf0; font-size:14px; color:#333;">
                                        {{ $data['nama_pelapor'] ?? 'Anonim' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:12px 18px; background-color:#f8f9fb; border-bottom:1px solid #e8ecf0; font-size:12px; color:#888; text-transform:uppercase; letter-spacing:0.8px; font-weight:600;">
                                        Email
                                    </td>
                                    <td style="padding:12px 18px; border-bottom:1px solid #e8ecf0; font-size:14px; color:#333;">
                                        @if(!empty($data['email_pelapor']))
                                            <a href="mailto:{{ $data['email_pelapor'] }}" style="color:#00a1d1; text-decoration:none;">{{ $data['email_pelapor'] }}</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:12px 18px; background-color:#f8f9fb; font-size:12px; color:#888; text-transform:uppercase; letter-spacing:0.8px; font-weight:600;">
                                        Kontak
                                    </td>
                                    <td style="padding:12px 18px; font-size:14px; color:#333;">
                                        {{ $data['kontak'] ?? '-' }}
                                    </td>
                                </tr>
                            </table>

                            {{-- Lampiran --}}
                            @if(!empty($data['file']))
                            <div style="margin-bottom:24px;">
                                <p style="margin:0 0 8px; font-size:12px; color:#888; text-transform:uppercase; letter-spacing:0.8px; font-weight:600;">📎 Lampiran</p>
                                <div style="padding:12px 18px; background-color:#f0f7fc; border:1px solid #d0e4f0; border-radius:8px; font-size:13px; color:#333; font-family:'Courier New', monospace;">
                                    {{ $data['file'] }}
                                </div>
                            </div>
                            @endif

                        </td>
                    </tr>

                    {{-- Footer --}}
                    <tr>
                        <td style="padding:20px 40px; background-color:#fef2f2; border-top:1px solid #fdd; text-align:center;">
                            <p style="margin:0; font-size:12px; color:#a33; line-height:1.6; font-weight:600;">
                                Email ini bersifat RAHASIA dan CONFIDENTIAL.
                            </p>
                            <p style="margin:4px 0 0; font-size:11px; color:#c66;">
                                Dilarang menyebarkan isi laporan tanpa izin pihak berwenang.
                            </p>
                            <p style="margin:10px 0 0; font-size:11px; color:#bbb;">
                                &copy; {{ date('Y') }} PT Krakatau Baja Konstruksi — Whistle Blowing System
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>
