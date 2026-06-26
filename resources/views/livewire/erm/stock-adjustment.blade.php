<div>
    {{-- Page header --}}
    <div class="flex items-center gap-4 mb-6">
        <a href="{{ route('ops.inventory.index') }}"
           class="p-2 rounded-lg hover:bg-gray-100 text-gray-500 hover:text-gray-700 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>
        <div>
            <h2 class="text-xl font-bold text-gray-900">Stock Adjustment</h2>
            <p class="text-sm text-gray-500 mt-0.5">Adjust stock for: <span class="font-medium text-gray-700">{{ $material->name }}</span></p>
        </div>
    </div>

    <div class="max-w-xl">
        {{-- Material summary card --}}
        <div class="bg-white rounded-2xl shadow-md p-5 mb-6 flex items-center justify-between">
            <div>
                <p class="text-xs text-gray-500 uppercase tracking-wide font-semibold mb-1">Material</p>
                <p class="font-bold text-gray-900 text-lg">{{ $material->name }}</p>
                <p class="text-sm text-gray-500 font-mono">{{ $material->sku }}</p>
            </div>
            <div class="text-right">
                <p class="text-xs text-gray-500 uppercase tracking-wide font-semibold mb-1">Current Stock</p>
                <p class="font-bold text-2xl {{ $material->isLowStock() ? 'text-red-600' : 'text-gray-900' }}">
                    {{ number_format($material->current_stock, 2) }}
                </p>
                <p class="text-sm text-gray-500">{{ $material->unit }}</p>
            </div>
        </div>

        {{-- Adjustment form --}}
        <div class="bg-white rounded-2xl shadow-md p-6">
            <form wire:submit="save" class="space-y-5">

                {{-- Type --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Adjustment Type <span class="text-red-500">*</span></label>
                    <select wire:model="type"
                            class="w-full text-sm border border-gray-200 rounded-lg px-3 py-2.5 focus:outline-none focus:ring-2 focus:ring-red-500 bg-white">
                        <option value="stock_in">Stock In (Add)</option>
                        <option value="stock_out">Stock Out (Remove)</option>
                        <option value="adjustment">Manual Adjustment (Remove)</option>
                    </select>
                    @error('type')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Quantity --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Quantity ({{ $material->unit }}) <span class="text-red-500">*</span>
                    </label>
                    <input wire:model="quantity"
                           type="number"
                           step="0.001"
                           min="0.001"
                           placeholder="0.00"
                           class="w-full text-sm border border-gray-200 rounded-lg px-3 py-2.5 focus:outline-none focus:ring-2 focus:ring-red-500"/>
                    @error('quantity')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Notes --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Notes</label>
                    <textarea wire:model="notes"
                              rows="3"
                              placeholder="Reason for adjustment…"
                              class="w-full text-sm border border-gray-200 rounded-lg px-3 py-2.5 focus:outline-none focus:ring-2 focus:ring-red-500 resize-none"></textarea>
                    @error('notes')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Actions --}}
                <div class="flex items-center gap-3 pt-2">
                    <button type="submit"
                            wire:loading.attr="disabled"
                            class="flex-1 bg-gradient-to-r from-red-600 to-red-800 text-white text-sm font-semibold px-5 py-2.5 rounded-xl shadow hover:opacity-90 transition disabled:opacity-60">
                        <span wire:loading.remove wire:target="save">Save Adjustment</span>
                        <span wire:loading wire:target="save">Saving…</span>
                    </button>
                    <a href="{{ route('ops.inventory.index') }}"
                       class="px-5 py-2.5 text-sm font-semibold text-gray-600 border border-gray-200 rounded-xl hover:bg-gray-50 transition">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
