<div class="grid grid-cols-2 h-[300px]">
    <form wire:submit.prevent="submit">
        <!-- izquierda -->
        <div class="flex justify-center items-center bg-blue-200 text-[5em]">
            <input type="number" wire:model="totalTicket" value="{{ $totalTicket }}">
            @error('total') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="p-3">
            <button>Efectivo</button>
            <button>Tarjeta</button>
        </div>
        <button type="submit">Save Contact</button>
        <!-- derecha -->
        <div class="flex justify-center items-center bg-blue-200 text-[5em]">
            <select name="type_pay" wire:model="type_pay" id="type_pay">
                <option value="tarjeta">tarjeta</option>
                <option value="efectivo">efectivo</option>
            </select>
            @error('type_pay') <span class="error">{{ $message }}</span> @enderror
        </div>
    </form>
</div>
