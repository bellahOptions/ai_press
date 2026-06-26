<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>New Contact Message</title>
<style>
  body { margin: 0; padding: 0; background: #f3f4f6; font-family: 'Helvetica Neue', Arial, sans-serif; }
  .wrapper { max-width: 620px; margin: 40px auto; background: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 24px rgba(0,0,0,0.08); }
  .header { background: linear-gradient(135deg, #dc2626, #991b1b); padding: 36px 40px; text-align: center; }
  .header img { width: 140px; margin-bottom: 12px; }
  .header h1 { color: #ffffff; font-size: 22px; font-weight: 700; margin: 0; letter-spacing: -0.3px; }
  .header p { color: rgba(255,255,255,0.8); font-size: 14px; margin: 6px 0 0; }
  .body { padding: 36px 40px; }
  .label { font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.8px; color: #6b7280; margin-bottom: 4px; }
  .value { font-size: 15px; color: #111827; margin: 0 0 20px; padding: 12px 16px; background: #f9fafb; border-left: 3px solid #dc2626; border-radius: 0 6px 6px 0; }
  .message-box { font-size: 15px; color: #374151; line-height: 1.7; padding: 16px; background: #f9fafb; border-radius: 8px; border: 1px solid #e5e7eb; white-space: pre-wrap; }
  .reply-note { margin-top: 28px; padding: 14px 16px; background: #fef2f2; border: 1px solid #fecaca; border-radius: 8px; font-size: 13px; color: #991b1b; }
  .footer { background: #111827; padding: 24px 40px; text-align: center; }
  .footer p { color: #9ca3af; font-size: 12px; margin: 0; }
  .footer a { color: #f87171; text-decoration: none; }
</style>
</head>
<body>
<div class="wrapper">
  <div class="header">
    <h1>New Contact Message</h1>
    <p>Received via aletinspirationz.com</p>
  </div>

  <div class="body">
    <p class="label">From</p>
    <p class="value">{{ $senderName }}</p>

    <p class="label">Email</p>
    <p class="value"><a href="mailto:{{ $senderEmail }}" style="color:#dc2626;">{{ $senderEmail }}</a></p>

    <p class="label">Phone</p>
    <p class="value">{{ $senderPhone ?: 'Not provided' }}</p>

    <p class="label">Subject</p>
    <p class="value">{{ $subject }}</p>

    <p class="label">Message</p>
    <div class="message-box">{{ $messageBody }}</div>

    <div class="reply-note">
      <strong>Reply directly</strong> to this email to respond to {{ $senderName }} — their address is already set as the reply-to.
    </div>
  </div>

  <div class="footer">
    <p>Alet Inspirationz Prints Limited &bull; Lagos, Nigeria</p>
    <p style="margin-top:6px;"><a href="mailto:info@aletinspirationz.com">info@aletinspirationz.com</a></p>
  </div>
</div>
</body>
</html>
