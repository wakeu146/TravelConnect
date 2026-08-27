<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Your TravelConnect security code</title>
</head>
<body style="margin:0;background:#f0f2f5;color:#1c2b33;font-family:Arial,Helvetica,sans-serif;">
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#f0f2f5;">
        <tr>
            <td align="center" style="padding:32px 16px;">
                <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width:560px;background:#ffffff;">
                    <tr>
                        <td style="padding:22px 32px;border-bottom:1px solid #e4e6eb;">
                            <p style="margin:0;color:#173042;font-size:21px;font-weight:700;letter-spacing:-.2px;">Travel<span style="color:#e76f51;font-weight:400;">Connect</span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:36px 32px 32px;">
                            <p style="margin:0 0 8px;color:#687078;font-size:13px;line-height:1.5;">Account security</p>
                            <h1 style="margin:0 0 22px;color:#1c2b33;font-size:25px;font-weight:600;line-height:1.3;">Your security code</h1>
                            <p style="margin:0 0 16px;color:#1c2b33;font-size:16px;line-height:1.6;">Hello {{ $name }},</p>
                            <p style="margin:0 0 24px;color:#4e5962;font-size:15px;line-height:1.7;">We received a request to reset your TravelConnect password. Enter the code below to continue.</p>
                            <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="margin:0 0 24px;background:#f5f6f7;border:1px solid #e4e6eb;">
                                <tr><td align="center" style="padding:22px 16px;"><span style="color:#173042;font-size:32px;font-weight:700;letter-spacing:8px;">{{ $code }}</span></td></tr>
                            </table>
                            <p style="margin:0 0 20px;color:#687078;font-size:13px;line-height:1.6;">This code expires in {{ $expiration }} minutes. For your security, never share this code with anyone.</p>
                            <p style="margin:0;color:#687078;font-size:13px;line-height:1.6;">If you did not request this code, you can ignore this email. Your password will not change.</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:20px 32px;border-top:1px solid #e4e6eb;color:#8a9299;font-size:12px;line-height:1.6;">TravelConnect<br>This is an automated security message. Please do not reply.</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
