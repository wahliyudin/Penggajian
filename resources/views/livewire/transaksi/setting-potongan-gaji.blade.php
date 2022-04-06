<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Setting Potongan Gaji') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full">
                                    <thead class="bg-white border-b">
                                        <tr>
                                            <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                                No.
                                            </th>
                                            <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                                Potongan Gaji
                                            </th>
                                            <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                                Jumlah Potongan
                                            </th>
                                            <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_potongan_gaji as $item)
                                            <tr
                                                class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    <span class="capitalize">{{ $item->nama }}</span>
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ numberFormat($item->potongan) }}
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center space-x-2">
                                                        <button wire:click='edit({{ $item->id }})'
                                                            class="bg-blue-500 px-2 flex py-2 rounded-md text-white">
                                                            <i class='bx bxs-edit'></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-jet-dialog-modal wire:model="modal">
        <x-slot name="title">
            <div class="flex justify-between items-center">
                @if (isset($potonganGaji))
                    <span> Edit Potongan Gaji</span>
                @else
                    <span> Create Potongan Gaji</span>
                @endif

                <span class="capitalize text-blue-500">{{ $nama }}</span>
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="flex flex-col w-full space-y-4">
                <hr class="border border-red-300">
                <div class="flex space-x-2 items-start w-full">
                    <div class="flex flex-col space-y-2 w-full">
                        <label for="">Jumlah Potongan</label>
                        <input type="text" id="potongan" wire:model="potongan"
                            class="text-sm rounded-md w-full py-2 px-4">
                        @error('potongan')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="closeModal" wire:loading.attr="disabled">
                Batal
            </x-jet-secondary-button>

            @if (isset($potonganGaji))
                <x-jet-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
                    Update
                </x-jet-button>
            @else
                <x-jet-button class="ml-2" wire:click="store" wire:loading.attr="disabled">
                    Create
                </x-jet-button>
            @endif

        </x-slot>
    </x-jet-dialog-modal>

    @push('js')
        <script>
            $("#potongan").keyup(function(e) {
                if ($(this).val() !== 0) {
                    $(this).val(formatRupiah($(this).val(), 'Rp. '));
                }
            });
        </script>
    @endpush
</div>
