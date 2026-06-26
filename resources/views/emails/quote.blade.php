<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>New Quote Request</title>
<style>
  body { margin: 0; padding: 0; background: #f3f4f6; font-family: 'Helvetica Neue', Arial, sans-serif; }
  .wrapper { max-width: 640px; margin: 40px auto; background: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 24px rgba(0,0,0,0.08); }
  .header { background: linear-gradient(135deg, #dc2626, #991b1b); padding: 36px 40px; text-align: center; }
  .header h1 { color: #ffffff; font-size: 22px; font-weight: 700; margin: 0; }
  .header p { color: rgba(255,255,255,0.8); font-size: 14px; margin: 6px 0 0; }
  .badge { display: inline-block; background: rgba(255,255,255,0.2); color: #fff; font-size: 12px; font-weight: 600; padding: 4px 12px; border-radius: 999px; margin-top: 12px; letter-spacing: 0.5px; }
  .body { padding: 36px 40px; }
  .section-title { font-size: 13px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.8px; color: #dc2626; border-bottom: 2px solid #fee2e2; padding-bottom: 8px; margin: 28px 0 16px; }
  .grid { display: grid; grid-template-columns: 1fr 1fr; gap: 0 20px; }
  .label { font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.7px; color: #6b7280; margin-bottom: 3px; }
  .value { font-size: 14px; color: #111827; margin: 0 0 18px; }
  .detail-box { font-size: 14px; color: #374151; line-height: 1.7; padding: 14px 16px; background: #f9fafb; border-radius: 8px; border: 1px solid #e5e7eb; white-space: pre-wrap; margin-bottom: 8px; }
  .highlight { background: #fef2f2; border: 1px solid #fecaca; border-radius: 8px; padding: 16px; margin-top: 24px; }
  .highlight p { margin: 0; font-size: 13px; color: #991b1b; }
  .highlight strong { display: block; font-size: 15px; color: #7f1d1d; margin-bottom: 4px; }
  .footer { background: #111827; padding: 24px 40px; text-align: center; }
  .footer p { color: #9ca3af; font-size: 12px; margin: 0; }
  .footer a { color: #f87171; text-decoration: none; }
</style>
</head>
<body>
<div class="wrapper">
  <div class="header">
    <h1>New Quote Request</h1>
    <p>Received via aletinspirationz.com</p>
    <span class="badge">{{ $serviceType }}</span>
  </div>

  <div class="body">
    <p class="section-title">Client Details</p>
    <div class="grid">
      <div>
        <p class="label">Full Name</p>
        <p class="value">{{ $clientName }}</p>
      </div>
      <div>
        <p class="label">Company / Organization</p>
        <p class="value">{{ $company ?: 'Not provided' }}</p>
      </div>
      <div>
        <p class="label">Email</p>
        <p class="value"><a href="mailto:{{ $clientEmail }}" style="color:#dc2626;">{{ $clientEmail }}</a></p>
      </div>
      <div>
        <p class="label">Phone</p>
        <p class="value">{{ $clientPhone ?: 'Not provided' }}</p>
      </div>
    </div>

    <p class="section-title">Project Details</p>
    <div class="grid">
      <div>
        <p class="label">Service Type</p>
        <p class="value">{{ $serviceType }}</p>
      </div>
      <div>
        <p class="label">Quantity / Volume</p>
        <p class="value">{{ $quantity ?: 'Not specified' }}</p>
      </div>
      <div>
        <p class="label">Desired Timeline</p>
        <p class="value">{{ $timeline ?: 'Flexible' }}</p>
      </div>
      <div>
        <p class="label">Budget Range</p>
        <p class="value">{{ $budget ?: 'To be discussed' }}</p>
      </div>
    </div>

    <p class="label">Project Description</p>
    <div class="detail-box">{{ $projectDetails }}</div>

    <div class="highlight">
      <strong>Action Required</strong>
      <p>Reply to this email to respond to {{ $clientName }} directly — their address is pre-set as the reply-to header.</p>
    </div>
  </div>

  <div class="footer">
    <p>Alet Inspirationz Prints Limited &bull; Lagos, Nigeria</p>
    <p style="margin-top:6px;"><a href="mailto:info@aletinspirationz.com">info@aletinspirationz.com</a></p>
  </div>
</div>
</body>
</html>
