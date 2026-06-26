<div>
    {{-- Page header --}}
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-xl font-bold text-gray-900">{{ $clientId ? 'Edit Client' : 'New Client' }}</h2>
            <p class="text-sm text-gray-500 mt-0.5">{{ $clientId ? 'Update client details' : 'Add a new client to the system' }}</p>
        </div>
        <a href="{{ route('ops.clients.index') }}"
           class="text-sm font-medium text-gray-600 hover:text-gray-900 flex items-center gap-1.5">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Back to Clients
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-md p-6">
        <form wire:submit="save" class="space-y-6">

            {{-- Row 1: Name + Company --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Full Name <span class="text-red-500">*</span></label>
                    <input wire:model="name" type="text" placeholder="John Doe"
                           class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent @error('name') border-red-400 @enderror"/>
                    @error('name') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Company</label>
                    <input wire:model="company" type="text" placeholder="Acme Ltd"
                           class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"/>
                </div>
            </div>

            {{-- Row 2: Email + Phone --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input wire:model="email" type="email" placeholder="john@example.com"
                           class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent @error('email') border-red-400 @enderror"/>
                    @error('email') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                    <input wire:model="phone" type="text" placeholder="+234 800 000 0000"
                           class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent"/>
                </div>
            </div>

            {{-- Row 3: Segment + Lead Source --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Segment <span class="text-red-500">*</span></label>
                    <select wire:model="segment"
                            class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 bg-white">
                        <option value="personal">Personal</option>
                        <option value="sme">SME</option>
                        <option value="corporate">Corporate</option>
                        <option value="government">Government</option>
                        <option value="ngo">NGO</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Lead Source <span class="text-red-500">*</span></label>
                    <select wire:model="lead_source"
                            class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 bg-white">
                        <option value="walk_in">Walk-in</option>
                        <option value="referral">Referral</option>
                        <option value="instagram">Instagram</option>
                        <option value="facebook">Facebook</option>
                        <option value="google">Google</option>
                        <option value="website">Website</option>
                        <option value="whatsapp">WhatsApp</option>
                        <option value="other">Other</option>
                    </select>
                </div>
            </div>

            {{-- Address --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                <textarea wire:model="address" rows="2" placeholder="Street, City, State"
                          class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 resize-none"></textarea>
            </div>

            {{-- Notes --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Notes</label>
                <textarea wire:model="notes" rows="3" placeholder="Any additional details…"
                          class="w-full px-3 py-2 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 resize-none"></textarea>
            </div>

            {{-- Actions --}}
            <div class="flex items-center justify-end gap-3 pt-2 border-t border-gray-100">
                <a href="{{ route('ops.clients.index') }}"
                   class="text-sm font-medium text-gray-600 hover:text-gray-900 px-4 py-2 rounded-lg hover:bg-gray-100 transition">
                    Cancel
                </a>
                <button type="submit"
                        class="bg-gradient-to-r from-red-600 to-red-800 text-white text-sm font-semibold px-6 py-2 rounded-xl shadow hover:opacity-90 transition flex items-center gap-2">
                    <svg class="w-4 h-4" wire:loading fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                    </svg>
                    Save Client
                </button>
            </div>
        </form>
    </div>
</div>
