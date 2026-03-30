<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us Message</title>
</head>
<body style="margin:0; padding:0; background-color:#f4f6f9; font-family: Arial, Helvetica, sans-serif;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background-color:#f4f6f9; padding:40px 0;">
        <tr>
            <td align="center">
                <table role="presentation" width="600" cellspacing="0" cellpadding="0" style="background-color:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 2px 8px rgba(0,0,0,0.08);">

                    {{-- Header --}}
                    <tr>
                        <td style="background: linear-gradient(135deg, #003d6b 0%, #00a1d1 100%); padding:32px 40px; text-align:center;">
                            <h1 style="margin:0; color:#ffffff; font-size:22px; font-weight:700; letter-spacing:0.5px;">
                                New Contact Message
                            </h1>
                            <p style="margin:6px 0 0; color:rgba(255,255,255,0.85); font-size:13px;">
                                PT Krakatau Baja Konstruksi — Company Website
                            </p>
                        </td>
                    </tr>

                    {{-- Body --}}
                    <tr>
                        <td style="padding:32px 40px;">

                            {{-- Sender Info --}}
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="margin-bottom:24px;">
                                <tr>
                                    <td style="padding:14px 18px; background-color:#f0f7fc; border-left:4px solid #00a1d1; border-radius:6px;">
                                        <p style="margin:0 0 4px; font-size:11px; color:#666; text-transform:uppercase; letter-spacing:1px; font-weight:600;">Pengirim</p>
                                        <p style="margin:0; font-size:16px; color:#1a1a1a; font-weight:600;">{{ $data['username'] }}</p>
                                    </td>
                                </tr>
                            </table>

                            {{-- Detail Table --}}
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="border:1px solid #e8ecf0; border-radius:8px; overflow:hidden; margin-bottom:24px;">
                                <tr>
                                    <td style="padding:12px 18px; background-color:#f8f9fb; border-bottom:1px solid #e8ecf0; font-size:12px; color:#888; text-transform:uppercase; letter-spacing:0.8px; font-weight:600; width:140px;">
                                        Email
                                    </td>
                                    <td style="padding:12px 18px; border-bottom:1px solid #e8ecf0; font-size:14px; color:#333;">
                                        <a href="mailto:{{ $data['email'] }}" style="color:#00a1d1; text-decoration:none;">{{ $data['email'] }}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:12px 18px; background-color:#f8f9fb; border-bottom:1px solid #e8ecf0; font-size:12px; color:#888; text-transform:uppercase; letter-spacing:0.8px; font-weight:600;">
                                        Telepon
                                    </td>
                                    <td style="padding:12px 18px; border-bottom:1px solid #e8ecf0; font-size:14px; color:#333;">
                                        {{ $data['phone'] }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:12px 18px; background-color:#f8f9fb; font-size:12px; color:#888; text-transform:uppercase; letter-spacing:0.8px; font-weight:600;">
                                        Jenis Inquiry
                                    </td>
                                    <td style="padding:12px 18px; font-size:14px; color:#333;">
                                        <span style="display:inline-block; background-color:#e8f5fa; color:#006d96; padding:4px 12px; border-radius:20px; font-size:12px; font-weight:600;">
                                            {{ $data['inquiry_type'] }}
                                        </span>
                                    </td>
                                </tr>
                            </table>

                            {{-- Message --}}
                            <div style="margin-bottom:24px;">
                                <p style="margin:0 0 8px; font-size:12px; color:#888; text-transform:uppercase; letter-spacing:0.8px; font-weight:600;">Pesan</p>
                                <div style="padding:16px 18px; background-color:#fafbfc; border:1px solid #e8ecf0; border-radius:8px; font-size:14px; color:#333; line-height:1.7;">
                                    {{ $data['message'] }}
                                </div>
                            </div>

                        </td>
                    </tr>

                    {{-- Footer --}}
                    <tr>
                        <td style="padding:20px 40px; background-color:#f8f9fb; border-top:1px solid #e8ecf0; text-align:center;">
                            <p style="margin:0; font-size:12px; color:#999; line-height:1.6;">
                                Email ini dikirim otomatis dari formulir Contact Us di website
                                <a href="https://bajakonstruksi.co.id" style="color:#00a1d1; text-decoration:none;">bajakonstruksi.co.id</a>
                            </p>
                            <p style="margin:6px 0 0; font-size:11px; color:#bbb;">
                                &copy; {{ date('Y') }} PT Krakatau Baja Konstruksi. All rights reserved.
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>
