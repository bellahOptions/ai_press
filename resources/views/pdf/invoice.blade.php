<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Invoice {{ $invoice->invoice_number }}</title>
<style>
  * { margin: 0; padding: 0; box-sizing: border-box; }
  body { font-family: DejaVu Sans, Arial, sans-serif; font-size: 12px; color: #111827; background: #fff; }
  .header { background: #991b1b; color: white; padding: 24px 32px; display: flex; justify-content: space-between; align-items: flex-start; }
  .company-name { font-size: 18px; font-weight: bold; }
  .company-sub { font-size: 11px; opacity: 0.8; margin-top: 3px; }
  .invoice-title { text-align: right; }
  .invoice-title h1 { font-size: 26px; font-weight: bold; letter-spacing: 2px; }
  .invoice-title p { font-size: 11px; opacity: 0.85; margin-top: 2px; }
  .body { padding: 28px 32px; }
  .meta-row { display: flex; justify-content: space-between; margin-bottom: 28px; }
  .meta-block h4 { font-size: 10px; text-transform: uppercase; letter-spacing: 0.8px; color: #6b7280; margin-bottom: 5px; }
  .meta-block p { font-size: 12px; color: #111827; line-height: 1.6; }
  table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
  thead tr { background: #f9fafb; border-bottom: 2px solid #e5e7eb; }
  thead th { text-align: left; padding: 8px 10px; font-size: 10px; text-transform: uppercase; letter-spacing: 0.6px; color: #6b7280; }
  thead th:last-child { text-align: right; }
  tbody tr { border-bottom: 1px solid #f3f4f6; }
  tbody td { padding: 8px 10px; font-size: 12px; }
  tbody td:last-child { text-align: right; }
  .totals { width: 260px; margin-left: auto; }
  .totals-row { display: flex; justify-content: space-between; padding: 5px 0; font-size: 12px; }
  .totals-row.total { border-top: 2px solid #111827; font-weight: bold; font-size: 15px; padding-top: 8px; margin-top: 4px; }
  .totals-row.balance { color: #991b1b; font-weight: bold; font-size: 14px; }
  .divider { border: none; border-top: 1px solid #e5e7eb; margin: 20px 0; }
  .notes-section h4 { font-size: 10px; text-transform: uppercase; letter-spacing: 0.6px; color: #6b7280; margin-bottom: 6px; }
  .notes-section p { font-size: 11px; color: #374151; line-height: 1.6; }
  .footer { background: #f9fafb; border-top: 1px solid #e5e7eb; padding: 16px 32px; text-align: center; font-size: 10px; color: #9ca3af; }
  .status-badge { display: inline-block; padding: 2px 10px; border-radius: 999px; font-size: 10px; font-weight: bold; text-transform: uppercase; }
  .status-paid { background: #dcfce7; color: #166534; }
  .status-partial { background: #fef9c3; color: #854d0e; }
  .status-overdue { background: #fee2e2; color: #991b1b; }
  .status-other { background: #f3f4f6; color: #374151; }
</style>
</head>
<body>

<div class="header">
    <div>
        <div class="company-name">ALET INSPIRATIONZ PRINTS LTD</div>
        <div class="company-sub">RC: 1878085 &bull; Lagos, Nigeria<br>info@aletinspirationz.com</div>
    </div>
    <div class="invoice-title">
        <h1>INVOICE</h1>
        <p>{{ $invoice->invoice_number }}</p>
        @php
            $badgeClass = match($invoice->status) {
                'paid'    => 'status-paid',
                'partial' => 'status-partial',
                'overdue' => 'status-overdue',
                default   => 'status-other',
            };
        @endphp
        <span class="status-badge {{ $badgeClass }}" style="margin-top:6px; display:inline-block;">{{ strtoupper($invoice->status) }}</span>
    </div>
</div>

<div class="body">

    <div class="meta-row">
        <div class="meta-block">
            <h4>Bill To</h4>
            <p><strong>{{ $invoice->client->name }}</strong></p>
            @if($invoice->client->company)
            <p>{{ $invoice->client->company }}</p>
            @endif
            @if($invoice->client->address)
            <p>{{ $invoice->client->address }}</p>
            @endif
            @if($invoice->client->email)
            <p>{{ $invoice->client->email }}</p>
            @endif
            @if($invoice->client->phone)
            <p>{{ $invoice->client->phone }}</p>
            @endif
        </div>
        <div class="meta-block" style="text-align:right;">
            <h4>Invoice Details</h4>
            <p><strong>Invoice #:</strong> {{ $invoice->invoice_number }}</p>
            @if($invoice->jobOrder)
            <p><strong>Job Order:</strong> {{ $invoice->jobOrder->job_number }}</p>
            @endif
            <p><strong>Date:</strong> {{ $invoice->created_at->format('d M Y') }}</p>
            @if($invoice->due_date)
            <p><strong>Due Date:</strong> {{ $invoice->due_date->format('d M Y') }}</p>
            @endif
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width:45%">Description</th>
                <th style="width:10%">Unit</th>
                <th style="width:12%; text-align:right;">Qty</th>
                <th style="width:16%; text-align:right;">Unit Price</th>
                <th style="width:17%; text-align:right;">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoice->items as $item)
            <tr>
                <td>{{ $item->description }}</td>
                <td>{{ $item->unit }}</td>
                <td style="text-align:right;">{{ number_format($item->quantity, 0) }}</td>
                <td style="text-align:right;">₦{{ number_format($item->unit_price_kobo / 100, 2) }}</td>
                <td style="text-align:right;">₦{{ number_format($item->total_kobo / 100, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="totals">
        <div class="totals-row">
            <span>Subtotal</span>
            <span>₦{{ number_format($invoice->subtotal_kobo / 100, 2) }}</span>
        </div>
        @if($invoice->discount_kobo > 0)
        <div class="totals-row">
            <span>Discount</span>
            <span>-₦{{ number_format($invoice->discount_kobo / 100, 2) }}</span>
        </div>
        @endif
        @if($invoice->vat_percent > 0)
        <div class="totals-row">
            <span>VAT ({{ $invoice->vat_percent }}%)</span>
            <span>₦{{ number_format($invoice->vat_kobo / 100, 2) }}</span>
        </div>
        @endif
        <div class="totals-row total">
            <span>TOTAL</span>
            <span>₦{{ number_format($invoice->total_kobo / 100, 2) }}</span>
        </div>
        @if($invoice->advance_paid_kobo > 0)
        <div class="totals-row" style="color:#16a34a; margin-top:6px;">
            <span>Advance Paid</span>
            <span>-₦{{ number_format($invoice->advance_paid_kobo / 100, 2) }}</span>
        </div>
        @endif
        @php $paid = $invoice->payments->sum('amount_kobo'); @endphp
        @if($paid > 0)
        <div class="totals-row" style="color:#16a34a;">
            <span>Payments Received</span>
            <span>-₦{{ number_format($paid / 100, 2) }}</span>
        </div>
        @endif
        <div class="totals-row balance">
            <span>BALANCE DUE</span>
            <span>₦{{ number_format($invoice->balance_kobo / 100, 2) }}</span>
        </div>
    </div>

    @if($invoice->payment_instructions || $invoice->notes)
    <hr class="divider">
    <div style="display:flex; gap:32px;">
        @if($invoice->payment_instructions)
        <div class="notes-section" style="flex:1;">
            <h4>Payment Instructions</h4>
            <p>{{ $invoice->payment_instructions }}</p>
        </div>
        @endif
        @if($invoice->notes)
        <div class="notes-section" style="flex:1;">
            <h4>Notes</h4>
            <p>{{ $invoice->notes }}</p>
        </div>
        @endif
    </div>
    @endif

</div>

<div class="footer">
    Thank you for your business with Alet Inspirationz Prints Limited &bull; info@aletinspirationz.com &bull; Lagos, Nigeria
</div>

</body>
</html>
