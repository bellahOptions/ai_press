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
            <h2 class="text-xl font-bold text-gray-900">{{ $invoiceId ? 'Edit Invoice' : 'New Invoice' }}</h2>
            <p class="text-sm text-gray-500 mt-0.5">{{ $invoiceId ? 'Update invoice details and line items' : 'Create a new client invoice' }}</p>
        </div>
    </div>

    <form wire:submit="save" class="space-y-6">

        {{-- Header details --}}
        <div class="bg-white rounded-2xl shadow-md p-6">
            <h3 class="font-semibold text-gray-800 mb-4">Invoice Details</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

                {{-- Client --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Client <span class="text-red-500">*</span></label>
                    <select wire:model.live="clientId"
                            class="w-full text-sm border border-gray-200 rounded-lg px-3 py-2.5 focus:outline-none focus:ring-2 focus:ring-red-500 bg-white">
                        <option value="">Select client…</option>
                        @foreach($this->clients as $client)
                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                        @endforeach
                    </select>
                    @error('clientId') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>

                {{-- Job Order --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Job Order</label>
                    <select wire:model="jobOrderId"
                            class="w-full text-sm border border-gray-200 rounded-lg px-3 py-2.5 focus:outline-none focus:ring-2 focus:ring-red-500 bg-white"
                            {{ !$clientId ? 'disabled' : '' }}>
                        <option value="">None</option>
                        @foreach($this->jobOrders as $jo)
                        <option value="{{ $jo->id }}">{{ $jo->job_number }} ({{ $jo->status }})</option>
                        @endforeach
                    </select>
                    @error('jobOrderId') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>

                {{-- Due Date --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Due Date</label>
                    <input wire:model="dueDate" type="date"
                           class="w-full text-sm border border-gray-200 rounded-lg px-3 py-2.5 focus:outline-none focus:ring-2 focus:ring-red-500"/>
                    @error('dueDate') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>

                {{-- VAT % --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">VAT %</label>
                    <input wire:model.live="vatPercent" type="number" step="0.01" min="0" max="100" placeholder="0"
                           class="w-full text-sm border border-gray-200 rounded-lg px-3 py-2.5 focus:outline-none focus:ring-2 focus:ring-red-500"/>
                    @error('vatPercent') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>

                {{-- Discount --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Discount (₦)</label>
                    <input wire:model.live="discountKobo" type="number" min="0" placeholder="0"
                           class="w-full text-sm border border-gray-200 rounded-lg px-3 py-2.5 focus:outline-none focus:ring-2 focus:ring-red-500"/>
                    <p class="mt-1 text-xs text-gray-400">Enter in kobo (e.g. 500000 = ₦5,000.00)</p>
                    @error('discountKobo') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>

                {{-- Advance Paid --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Advance Paid (kobo)</label>
                    <input wire:model="advancePaidKobo" type="number" min="0" placeholder="0"
                           class="w-full text-sm border border-gray-200 rounded-lg px-3 py-2.5 focus:outline-none focus:ring-2 focus:ring-red-500"/>
                    @error('advancePaidKobo') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>

                {{-- Notes --}}
                <div class="sm:col-span-2 lg:col-span-3">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Notes</label>
                    <textarea wire:model="notes" rows="2" placeholder="Internal notes…"
                              class="w-full text-sm border border-gray-200 rounded-lg px-3 py-2.5 focus:outline-none focus:ring-2 focus:ring-red-500 resize-none"></textarea>
                </div>

                {{-- Payment Instructions --}}
                <div class="sm:col-span-2 lg:col-span-3">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Payment Instructions</label>
                    <textarea wire:model="paymentInstructions" rows="2" placeholder="Bank details, payment terms…"
                              class="w-full text-sm border border-gray-200 rounded-lg px-3 py-2.5 focus:outline-none focus:ring-2 focus:ring-red-500 resize-none"></textarea>
                </div>

            </div>
        </div>

        {{-- Line items --}}
        <div class="bg-white rounded-2xl shadow-md p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-semibold text-gray-800">Line Items</h3>
                <button type="button" wire:click="addItem"
                        class="inline-flex items-center gap-1.5 text-sm font-medium text-red-600 hover:text-red-800 px-3 py-1.5 rounded-lg hover:bg-red-50 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Add Row
                </button>
            </div>

            @error('items') <p class="mb-3 text-sm text-red-600">{{ $message }}</p> @enderror

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-gray-100">
                            <th class="text-left pb-2 font-semibold text-gray-600 pr-3">Description</th>
                            <th class="text-left pb-2 font-semibold text-gray-600 pr-3 w-24">Unit</th>
                            <th class="text-right pb-2 font-semibold text-gray-600 pr-3 w-28">Qty</th>
                            <th class="text-right pb-2 font-semibold text-gray-600 pr-3 w-36">Unit Price (kobo)</th>
                            <th class="text-right pb-2 font-semibold text-gray-600 w-36">Line Total</th>
                            <th class="w-8"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach($items as $i => $item)
                        <tr>
                            <td class="py-2 pr-3">
                                <input wire:model="items.{{ $i }}.description"
                                       type="text" placeholder="Description…"
                                       class="w-full text-sm border border-gray-200 rounded-lg px-3 py-1.5 focus:outline-none focus:ring-2 focus:ring-red-500"/>
                                @error("items.{$i}.description") <p class="mt-0.5 text-xs text-red-600">{{ $message }}</p> @enderror
                            </td>
                            <td class="py-2 pr-3">
                                <input wire:model="items.{{ $i }}.unit"
                                       type="text" placeholder="pcs"
                                       class="w-full text-sm border border-gray-200 rounded-lg px-3 py-1.5 focus:outline-none focus:ring-2 focus:ring-red-500"/>
                            </td>
                            <td class="py-2 pr-3">
                                <input wire:model.live="items.{{ $i }}.quantity"
                                       type="number" step="0.001" min="0" placeholder="1"
                                       class="w-full text-sm border border-gray-200 rounded-lg px-3 py-1.5 text-right focus:outline-none focus:ring-2 focus:ring-red-500"/>
                            </td>
                            <td class="py-2 pr-3">
                                <input wire:model.live="items.{{ $i }}.unit_price_kobo"
                                       type="number" min="0" placeholder="0"
                                       class="w-full text-sm border border-gray-200 rounded-lg px-3 py-1.5 text-right focus:outline-none focus:ring-2 focus:ring-red-500"/>
                            </td>
                            <td class="py-2 text-right font-medium text-gray-900 pr-3">
                                ₦{{ number_format(((float)($item['quantity'] ?? 0) * (float)($item['unit_price_kobo'] ?? 0)) / 100, 2) }}
                            </td>
                            <td class="py-2">
                                @if(count($items) > 1)
                                <button type="button" wire:click="removeItem({{ $i }})"
                                        class="p-1 text-gray-400 hover:text-red-600 transition rounded">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Totals summary --}}
            <div class="mt-6 border-t border-gray-100 pt-4 flex justify-end">
                <div class="space-y-1.5 min-w-[260px]">
                    <div class="flex justify-between text-sm text-gray-600">
                        <span>Subtotal</span>
                        <span class="font-medium">₦{{ number_format($this->getSubtotalKobo() / 100, 2) }}</span>
                    </div>
                    @if($discountKobo > 0)
                    <div class="flex justify-between text-sm text-gray-600">
                        <span>Discount</span>
                        <span class="font-medium text-red-600">- ₦{{ number_format($discountKobo / 100, 2) }}</span>
                    </div>
                    @endif
                    @if($vatPercent > 0)
                    <div class="flex justify-between text-sm text-gray-600">
                        <span>VAT ({{ $vatPercent }}%)</span>
                        <span class="font-medium">₦{{ number_format($this->getVatKobo() / 100, 2) }}</span>
                    </div>
                    @endif
                    <div class="flex justify-between text-base font-bold text-gray-900 border-t border-gray-100 pt-2 mt-2">
                        <span>Total</span>
                        <span>₦{{ number_format($this->getTotalKobo() / 100, 2) }}</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Submit --}}
        <div class="flex items-center gap-3">
            <button type="submit"
                    wire:loading.attr="disabled"
                    class="bg-gradient-to-r from-red-600 to-red-800 text-white text-sm font-semibold px-6 py-2.5 rounded-xl shadow hover:opacity-90 transition disabled:opacity-60">
                <span wire:loading.remove wire:target="save">{{ $invoiceId ? 'Update Invoice' : 'Create Invoice' }}</span>
                <span wire:loading wire:target="save">Saving…</span>
            </button>
            <a href="{{ route('ops.invoices.index') }}"
               class="px-5 py-2.5 text-sm font-semibold text-gray-600 border border-gray-200 rounded-xl hover:bg-gray-50 transition">
                Cancel
            </a>
        </div>
    </form>
</div>
