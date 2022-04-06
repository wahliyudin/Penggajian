<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Gaji') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-2 lg:px-4">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-col w-full">
                    <div class="bg-blue-500 text-white px-4 py-2">
                        Filter Data Gaji
                    </div>
                    <div class="flex flex-col py-4 px-6 space-y-6 w-full">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center space-x-6">
                                <div class="flex space-x-2 items-center text-gray-500">
                                    <span>Bulan</span>
                                    <select name="" id="" class="text-sm rounded-md py-1 px-2 w-28">
                                        <option value="">Pilih Bulan</option>
                                    </select>
                                </div>
                                <div class="flex space-x-2 items-center text-gray-500">
                                    <span>Tahun</span>
                                    <select name="" id="" class="text-sm rounded-md py-1 px-2 w-28">
                                        <option value="">Pilih Tahun</option>
                                    </select>
                                </div>
                            </div>

                            <div class="flex items-center space-x-2">
                                <button
                                    class="text-white pr-3 pl-2 py-1 rounded-md bg-blue-500 text-sm flex items-center justify-center space-x-1">
                                    <i class='bx bxs-show'></i>
                                    <span>Tampilkan Data</span>
                                </button>
                                <button wire:click="create"
                                    class="text-white pr-3 pl-2 py-1 rounded-md bg-green-500 text-sm flex items-center justify-center space-x-1">
                                    <i class='bx bxs-printer'></i>
                                    <span>Cetak Data Gaji</span>
                                </button>
                            </div>
                        </div>

                        <div class="bg-blue-100 py-2 px-4 rounded-md text-gray-600">
                            Menampilkan Data Kehadiran Pegawai Bulan: 03 Tahun: 2021
                        </div>

                        <div class="flex flex-col w-full">
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
                                                        class="text-sm font-bold text-gray-900 px-4 py-2 text-left">
                                                        No.
                                                    </th>
                                                    <th scope="col"
                                                        class="text-sm font-bold text-gray-900 px-4 py-2 text-left">
                                                        NIK
                                                    </th>
                                                    <th scope="col"
                                                        class="text-sm font-bold text-gray-900 px-4 py-2 text-left">
                                                        Nama Pegawai
                                                    </th>
                                                    <th scope="col"
                                                        class="text-sm font-bold text-gray-900 px-4 py-2 text-left">
                                                        Gaji Pokok
                                                    </th>
                                                    <th scope="col"
                                                        class="text-sm font-bold text-gray-900 px-4 py-2 text-left">
                                                        Tunjangan Transport
                                                    </th>
                                                    <th scope="col"
                                                        class="text-sm font-bold text-gray-900 px-4 py-2 text-left">
                                                        Uang Makan
                                                    </th>
                                                    <th scope="col"
                                                        class="text-sm font-bold text-gray-900 px-4 py-2 text-left">
                                                        Potongan
                                                    </th>
                                                    <th scope="col"
                                                        class="text-sm font-bold text-gray-900 px-4 py-2 text-left">
                                                        Total Gaji
                                                    </th>
                                                    <th scope="col"
                                                        class="text-sm font-bold text-gray-900 px-4 py-2 text-left">
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data_gaji as $item)
                                                    <tr
                                                        class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                                        <td
                                                            class="px-4 py-2 whitespace-nowrap text-sm font-medium text-gray-900">
                                                            {{ $loop->iteration }}
                                                        </td>
                                                        <td
                                                            class="text-sm text-gray-900 font-light px-4 py-2 whitespace-nowrap">
                                                            {{ $item->pegawai->nik }}
                                                        </td>
                                                        <td
                                                            class="text-sm text-gray-900 font-light px-4 py-2 whitespace-nowrap">
                                                            {{ $item->pegawai->nama }}
                                                        </td>
                                                        <td
                                                            class="text-sm text-gray-900 font-light px-4 py-2 whitespace-nowrap">
                                                            {{ numberFormat($item->pegawai->jabatan->gaji_pokok) }}
                                                        </td>
                                                        <td
                                                            class="text-sm text-gray-900 font-light px-4 py-2 whitespace-nowrap">
                                                            {{ numberFormat($item->pegawai->jabatan->tunjangan_transport) }}
                                                        </td>
                                                        <td
                                                            class="text-sm text-gray-900 font-light px-4 py-2 whitespace-nowrap">
                                                            {{ numberFormat($item->pegawai->jabatan->uang_makan) }}
                                                        </td>
                                                        <td
                                                            class="text-sm text-gray-900 font-light px-4 py-2 whitespace-nowrap">
                                                            {{ numberFormat($item->potongan) }}
                                                        </td>
                                                        <td
                                                            class="text-sm text-gray-900 font-light px-4 py-2 whitespace-nowrap">
                                                            {{ numberFormat($item->total_gaji) }}
                                                        </td>
                                                        <td
                                                            class="text-sm text-gray-900 font-light px-4 py-2 whitespace-nowrap">
                                                            <div class="flex items-center space-x-2">
                                                                <button wire:click="show({{ $item->id }})"
                                                                    class="bg-blue-500 py-1 flex items-center space-x-1 pl-1.5 pr-2.5 rounded-md text-white">
                                                                    <i class='bx bx-show text-xl'></i>
                                                                    <span>show</span>
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

                            <div class="flex justify-between w-full pt-4">
                                {{ $data_gaji->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <x-jet-dialog-modal wire:model="modal">
        <x-slot name="title">
            @if (isset($absensi))
                Edit Absensi
            @else
                Create Absensi
            @endif
        </x-slot>

        <x-slot name="content">
            <div class="flex flex-col w-full space-y-4">
                <hr class="border border-red-300">
                <div class="flex space-x-2 items-start w-full">
                    <div class="flex flex-col space-y-2 w-full">
                        <livewire:component.search-pegawai />
                        @error('pegawai_id')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="flex space-x-2 items-start w-full">
                    <div class="flex flex-col space-y-2 w-1/3">
                        <label for="">Hadir</label>
                        <input type="number" wire:model="hadir" class="text-sm rounded-md w-full py-2 px-4">
                        @error('hadir')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col space-y-2 w-1/3">
                        <label for="">Sakit</label>
                        <input type="number" wire:model="sakit" class="text-sm rounded-md w-full py-2 px-4">
                        @error('sakit')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col space-y-2 w-1/3">
                        <label for="">Alpha</label>
                        <input type="number" wire:model="alpha" class="text-sm rounded-md w-full py-2 px-4">
                        @error('alpha')
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

            @if (isset($absensi))
                <x-jet-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
                    Update
                </x-jet-button>
            @else
                <x-jet-button class="ml-2" wire:click="store" wire:loading.attr="disabled">
                    Create
                </x-jet-button>
            @endif

        </x-slot>
    </x-jet-dialog-modal> --}}
</div>
