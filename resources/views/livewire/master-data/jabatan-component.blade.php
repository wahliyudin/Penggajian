<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Jabatan') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-4 lg:px-6">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="flex w-full items-center justify-end px-4 py-4">
                        <button wire:click="create" class="border border-blue-500 hover:bg-blue-500 hover:text-white transition-all duration-300 text-blue-500 rounded-md pl-3 pr-4 py-2 flex items-center space-x-1">
                            <i class='bx bx-plus tex-xl'></i>
                            <span>Tambah</span>
                        </button>
                    </div>
                    <div class="flex w-full items-center justify-between px-4 py-4">
                        <div class="flex items-center text-sm space-x-2">
                            <span>Show</span>
                            <select wire:model="perPage" class="text-sm py-1 w-20 rounded-md">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            <span>entries</span>
                        </div>
                        <div class="flex items-center space-x-2 text-sm">
                            <span>Search :</span>
                            <input type="search" wire:model="search" class="text-sm py-1 px-2 rounded-md">
                        </div>
                    </div>
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full">
                                    <thead class="bg-white border-b">
                                        <tr>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                No
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Nama
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Gaji Pokok
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Tunjangan Transport
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Uang Makan
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Total
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jabatans as $item)
                                            <tr
                                                class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ $item->nama }}
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ numberFormat($item->gaji_pokok) }}
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ numberFormat($item->tunjangan_transport) }}
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ numberFormat($item->uang_makan) }}
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ numberFormat($item->total) }}
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center space-x-2">
                                                        <button wire:click="edit({{ $item->id }})" class="bg-blue-500 px-2 flex py-2 rounded-md text-white">
                                                            <i class='bx bxs-edit'></i>
                                                        </button>
                                                        <button wire:click="delete({{ $item->id }})" class="bg-red-500 px-2 flex py-2 rounded-md text-white">
                                                            <i class='bx bxs-trash-alt'></i>
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
                    <div class="flex w-full px-4 py-2">
                        {{ $jabatans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-jet-dialog-modal wire:model="modal">
        <x-slot name="title">
            @if(isset($jabatan))
                Edit Jabatan
            @else
                Create Jabatan
            @endif
        </x-slot>

        <x-slot name="content">
            <div class="flex flex-col w-full space-y-4">
                <hr class="border border-red-300">
                <div class="flex space-x-2 items-start w-full">
                    <div class="flex flex-col space-y-2 w-1/2">
                        <label for="">Nama</label>
                        <input type="text" wire:model="nama" class="text-sm rounded-md w-full py-2 px-4">
                        @error('nama')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col space-y-2 w-1/2">
                        <label for="">Gaji Pokok</label>
                        <input type="text" wire:model="gaji_pokok" id="gaji_pokok" class="text-sm rounded-md w-full">
                        @error('gaji_pokok')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="flex space-x-2 items-start w-full">
                    <div class="flex flex-col space-y-2 w-1/2">
                        <label for="">Tunjangan Transport</label>
                        <input type="text" wire:model="tunjangan_transport" id="tunjangan_transport" class="text-sm rounded-md w-full py-2 px-4">
                        @error('tunjangan_transport')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col space-y-2 w-1/2">
                        <label for="">Uang Makan</label>
                        <input type="text" wire:model="uang_makan" id="uang_makan" class="text-sm rounded-md w-full">
                        @error('uang_makan')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="flex items-center justify-between w-full py-4">
                    <span class="uppercase text-xl">Total</span>
                    <span class="text-3xl text-white px-2 py-1 rounded-md {{ $total < 0 && isset($total) ? 'bg-red-500' : 'bg-blue-500' }}">{{ $total }}</span>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="closeModal" wire:loading.attr="disabled">
                Batal
            </x-jet-secondary-button>

            @if(isset($jabatan))
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
        $("#gaji_pokok").keyup(function(e) {
            if ($(this).val() !== 0){
                $(this).val(formatRupiah($(this).val(), 'Rp. '));
            }
        });
        $("#tunjangan_transport").keyup(function(e) {
            if ($(this).val() !== 0){
                $(this).val(formatRupiah($(this).val(), 'Rp. '));
            }
        });
        $("#uang_makan").keyup(function(e) {
            if ($(this).val() !== 0){
                $(this).val(formatRupiah($(this).val(), 'Rp. '));
            }
        });
    </script>
    @endpush
</div>
