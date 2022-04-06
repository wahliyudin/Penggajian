<div class="flex flex-col space-y-2 relative">
    <label>Jabatan</label>
    <div class="space-y-2 w-full relative" x-data="{active: false}">
        <div>
            <input @click="active = !active" id="jabatan" type="text" class="w-full rounded-md text-sm py-2 px-2"
                   wire:model="jabatan">
        </div>
        <div x-show="active" class="bg-white w-full shadow-md rounded-md overflow-hidden z-[100] absolute">
            <ul @click="active = !active" @click.away="active = !active" class="flex flex-col max-h-48 overflow-y-auto">
                @forelse ($resultJabatans as $result)
                    <li>
                        <span class="py-2 px-4 cursor-pointer hover:bg-blue-500 transition-all duration-300 hover:text-white flex w-full text-sm"
                              wire:click="selectJabatan({{ $result->id }})">{{ $result->nama }}</span>
                    </li>
                @empty
                    <li>
                        <span class="py-2 px-4 flex w-full text-sm">Not Found...</span>
                    </li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
@push('js')
    <script>
        $('#jabatan').focus(function(e) {
            e.preventDefault();
            @this.jabatan = '';
            $(this).val('');
        });
    </script>
@endpush
