<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('messages.reset_your_password_text') }} - TravelConnect</title>
</head>
<body style="margin:0;background:#f1f6f4;color:#173042;font-family:Arial,Helvetica,sans-serif;">
    <div style="padding:32px 16px;">
        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="max-width:600px;margin:0 auto;background:#ffffff;border:1px solid #dbe3e5;border-radius:16px;overflow:hidden;">
            <tr>
                <td style="padding:28px 32px;background:#173042;color:#ffffff;">
                    <p style="margin:0;font-size:20px;font-weight:700;letter-spacing:.02em;">Travel<span style="color:#f6c9bb;font-weight:400;">Connect</span></p>
                </td>
            </tr>
            <tr>
                <td style="padding:40px 32px 32px;">
                    <p style="margin:0 0 12px;color:#e76f51;font-size:12px;font-weight:700;letter-spacing:.16em;text-transform:uppercase;">{{ __('messages.account_recovery') }}</p>
                    <h1 style="margin:0 0 20px;font-size:30px;line-height:1.2;color:#173042;">{{ __('messages.reset_your_password_text') }}</h1>
                    <p style="margin:0 0 16px;font-size:16px;line-height:1.7;">{{ __('messages.hello_name', ['name' => $name]) }}</p>
                    <p style="margin:0 0 24px;font-size:16px;line-height:1.7;color:#607985;">{{ __('messages.we_received_reset_request') }}</p>
                    <p style="margin:0 0 28px;"><a href="{{ $resetUrl }}" style="display:inline-block;padding:14px 24px;border-radius:8px;background:#e76f51;color:#ffffff;font-size:15px;font-weight:700;text-decoration:none;">{{ __('messages.reset_my_password') }}</a></p>
                    <div style="padding:16px 18px;border-left:4px solid #e76f51;background:#f8faf9;color:#607985;font-size:14px;line-height:1.6;">{{ __('messages.secure_link_expires_in_minutes', ['minutes' => $expiration]) }}</div>
                    <p style="margin:24px 0 0;font-size:14px;line-height:1.6;color:#607985;">{{ __('messages.if_you_did_not_request_reset') }}</p>
                </td>
            </tr>
            <tr>
                <td style="padding:24px 32px;border-top:1px solid #e7eceb;color:#8a9ba0;font-size:12px;line-height:1.6;">{{ __('messages.travelconnect_team') }}<br>{{ __('messages.automated_message') }}</td>
            </tr>
        </table>
    </div>
</body>
</html>
