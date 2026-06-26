<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;

class OpsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function dashboard()       { return view('ops.dashboard'); }

    // CRM
    public function clients()         { return view('ops.clients.index'); }
    public function clientCreate()    { return view('ops.clients.create'); }
    public function clientEdit($id)   { return view('ops.clients.edit', ['clientId' => $id]); }
    public function leads()           { return view('ops.leads.index'); }

    // ORM
    public function quotations()      { return view('ops.quotations.index'); }
    public function jobs()            { return view('ops.jobs.index'); }
    public function jobShow($id)      { return view('ops.jobs.show', ['jobId' => $id]); }
    public function production()      { return view('ops.production.index'); }

    // Dispatch
    public function dispatch()        { return view('ops.dispatch.index'); }

    // ERM
    public function inventory()       { return view('ops.inventory.index'); }
    public function inventoryCreate() { return view('ops.inventory.create'); }
    public function stockAdjust($id)  { return view('ops.inventory.adjust', ['materialId' => $id]); }
    public function suppliers()       { return view('ops.suppliers.index'); }
    public function purchaseOrders()  { return view('ops.purchase-orders.index'); }

    // Finance
    public function invoices()        { return view('ops.invoices.index'); }
    public function invoiceCreate()   { return view('ops.invoices.create'); }
    public function invoiceShow($id)  { return view('ops.invoices.show', ['invoiceId' => $id]); }
    public function invoicePdf($id)
    {
        $invoice = Invoice::with(['client', 'items', 'payments', 'jobOrder'])->findOrFail($id);
        $pdf = Pdf::loadView('pdf.invoice', compact('invoice'))->setPaper('a4');
        return $pdf->download('invoice-' . $invoice->invoice_number . '.pdf');
    }
    public function recordPayment($invoiceId) { return view('ops.invoices.payment', ['invoiceId' => $invoiceId]); }
    public function expenses()        { return view('ops.expenses.index'); }
    public function payroll()         { return view('ops.payroll.index'); }

    // Admin
    public function staff()           { return view('ops.staff.index'); }
    public function reports()         { return view('ops.reports.index'); }
}
