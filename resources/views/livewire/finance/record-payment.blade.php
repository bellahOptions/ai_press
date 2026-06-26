<div>
    {{-- Page header --}}
    <div class="flex items-center gap-4 mb-6">
        <a href="{{ route('ops.invoices.index') }}"
           class="p-2 rounded-lg hover:bg-gray-100 text-gray-500 hover:text-gray-700 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>
        <div>
            <h2 class="text-xl font-bold text-gray-900">Record Payment</h2>
            <p class="text-sm text-gray-500 mt-0.5">{{ $invoice->invoice_number }}</p>
        </div>
    </div>

    <div class="max-w-xl space-y-6">

        {{-- Invoice summary card --}}
        <div class="bg-white rounded-2xl shadow-md p-5">
            <h3 class="font-semibold text-gray-800 mb-4">Invoice Summary</h3>
            <dl class="grid grid-cols-2 gap-3 text-sm">
                <div>
                    <dt class="text-gray-500 text-xs uppercase tracking-wide font-semibold mb-0.5">Invoice #</dt>
                    <dd class="font-mono font-semibold text-gray-800">{{ $invoice->invoice_number }}</dd>
                </div>
                <div>
                    <dt class="text-gray-500 text-xs uppercase tracking-wide font-semibold mb-0.5">Client</dt>
                    <dd class="font-medium text-gray-800">{{ $invoice->client?->name ?? '—' }}</dd>
                </div>
                <div>
                    <dt class="text-gray-500 text-xs uppercase tracking-wide font-semibold mb-0.5">Total</dt>
                    <dd class="font-bold text-gray-900">₦{{ number_format($invoice->total_kobo / 100, 2) }}</dd>
                </div>
                <div>
                    <dt class="text-gray-500 text-xs uppercase tracking-wide font-semibold mb-0.5">Balance Due</dt>
                    <dd class="font-bold text-red-600">₦{{ number_format($invoice->balance_kobo / 100, 2) }}</dd>
                </div>
            </dl>
        </div>

        {{-- Payment form --}}
        <div class="bg-white rounded-2xl shadow-md p-6">
            <h3 class="font-semibold text-gray-800 mb-4">Payment Details</h3>
            <form wire:submit="save" class="space-y-5">

                {{-- Amount --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Amount (₦) <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-500 font-medium text-sm">₦</span>
                        <input wire:model="amount"
                               type="number" step="0.01" min="0.01"
                               placeholder="0.00"
                               class="w-full pl-7 pr-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"/>
                    </div>
                    @error('amount') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>

                {{-- Method --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Payment Method <span class="text-red-500">*</span></label>
                    <select wire:model="method"
                            class="w-full text-sm border border-gray-200 rounded-lg px-3 py-2.5 focus:outline-none focus:ring-2 focus:ring-red-500 bg-white">
                        <option value="cash">Cash</option>
                        <option value="bank_transfer">Bank Transfer</option>
                        <option value="pos">POS</option>
                        <option value="paystack">Paystack</option>
                        <option value="flutterwave">Flutterwave</option>
                        <option value="cheque">Cheque</option>
                        <option value="other">Other</option>
                    </select>
                    @error('method') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>

                {{-- Reference --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Reference / Transaction ID</label>
                    <input wire:model="reference"
                           type="text" placeholder="TXN-12345…"
                           class="w-full text-sm border border-gray-200 rounded-lg px-3 py-2.5 focus:outline-none focus:ring-2 focus:ring-red-500"/>
                    @error('reference') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>

                {{-- Paid At --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Payment Date <span class="text-red-500">*</span></label>
                    <input wire:model="paidAt"
                           type="date"
                           class="w-full text-sm border border-gray-200 rounded-lg px-3 py-2.5 focus:outline-none focus:ring-2 focus:ring-red-500"/>
                    @error('paidAt') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>

                {{-- Notes --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Notes</label>
                    <textarea wire:model="notes" rows="2" placeholder="Additional notes…"
                              class="w-full text-sm border border-gray-200 rounded-lg px-3 py-2.5 focus:outline-none focus:ring-2 focus:ring-red-500 resize-none"></textarea>
                    @error('notes') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>

                {{-- Actions --}}
                <div class="flex items-center gap-3 pt-2">
                    <button type="submit"
                            wire:loading.attr="disabled"
                            class="flex-1 bg-gradient-to-r from-red-600 to-red-800 text-white text-sm font-semibold px-5 py-2.5 rounded-xl shadow hover:opacity-90 transition disabled:opacity-60">
                        <span wire:loading.remove wire:target="save">Record Payment</span>
                        <span wire:loading wire:target="save">Saving…</span>
                    </button>
                    <a href="{{ route('ops.invoices.index') }}"
                       class="px-5 py-2.5 text-sm font-semibold text-gray-600 border border-gray-200 rounded-xl hover:bg-gray-50 transition">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
