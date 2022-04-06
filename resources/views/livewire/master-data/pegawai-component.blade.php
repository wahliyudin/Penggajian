<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Pegawai') }}
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
                                            class="text-sm font-medium text-gray-900 px-4 py-2 text-left">
                                            No
                                        </th>
                                        <th scope="col"
                                            class="text-sm font-medium text-gray-900 px-4 py-2 text-left">
                                            NIK
                                        </th>
                                        <th scope="col"
                                            class="text-sm font-medium text-gray-900 px-4 py-2 text-left">
                                            Photo
                                        </th>
                                        <th scope="col"
                                            class="text-sm font-medium text-gray-900 px-4 py-2 text-left">
                                            Nama
                                        </th>
                                        <th scope="col"
                                            class="text-sm font-medium text-gray-900 px-4 py-2 text-left">
                                            Jenis Kelamin
                                        </th>
                                        <th scope="col"
                                            class="text-sm font-medium text-gray-900 px-4 py-2 text-left">
                                            Jabatan
                                        </th>
                                        <th scope="col"
                                            class="text-sm font-medium text-gray-900 px-4 py-2 text-left">
                                            Tanggal Masuk
                                        </th>
                                        <th scope="col"
                                            class="text-sm font-medium text-gray-900 px-4 py-2 text-left">
                                            Status Pegawai
                                        </th>
                                        <th scope="col"
                                            class="text-sm font-medium text-gray-900 px-4 py-2 text-left">
                                            Action
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($pegawais as $item)
                                        <tr
                                            class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                            <td
                                                class="px-4 py-2 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td
                                                class="text-sm text-gray-900 font-light px-4 py-2 whitespace-nowrap">
                                                {{ $item->nik }}
                                            </td>
                                            <td
                                                class="text-sm text-gray-900 font-light px-4 py-2 whitespace-nowrap">
                                                <img src="{{ $item->photo }}" class="h-14 w-14 object-cover rounded-full" alt="">
                                            </td>
                                            <td
                                                class="text-sm text-gray-900 font-light px-4 py-2 whitespace-nowrap">
                                                {{ Str::limit($item->nama, 18, '...') }}
                                            </td>
                                            <td
                                                class="text-sm text-gray-900 font-light px-4 py-2 whitespace-nowrap">
                                                {{ $item->jenis_kelamin }}
                                            </td>
                                            <td
                                                class="text-sm text-gray-900 font-light px-4 py-2 whitespace-nowrap">
                                                {{ $item->jabatan->nama }}
                                            </td>
                                            <td
                                                class="text-sm text-gray-900 font-light px-4 py-2 whitespace-nowrap">
                                                {{ $item->tgl_masuk }}
                                            </td>
                                            <td
                                                class="text-sm text-gray-900 font-light px-4 py-2 whitespace-nowrap">
                                                {{ $item->status }}
                                            </td>
                                            <td
                                                class="text-sm text-gray-900 font-light px-4 py-2 whitespace-nowrap">
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
                        {{ $pegawais->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-jet-dialog-modal wire:model="modal">
        <x-slot name="title">
            @if(isset($pegawai))
                Edit Pegawai
            @else
                Create Pegawai
            @endif
        </x-slot>

        <x-slot name="content">
            <div class="flex flex-col w-full space-y-4">
                <hr class="border border-red-300">
                <div class="flex justify-center items-center w-full py-2">
                    <div class="relative rounded-md overflow-hidden cursor-pointer group" style="width: 13rem; height: 13rem;">
                        <img src="{{ $photo }}" alt="pilih image" class="object-cover rounded-md w-full h-full" alt="">
                        <div class="absolute top-14 opacity-0 invisible group-hover:bg-gray-500 group-hover:bg-opacity-30 group-hover:top-0 group-hover:visible group-hover:opacity-100 w-full h-full flex justify-center items-center transition-all duration-300">
                            <a href="javascript:void(0)" id="lfm" data-input="thumbnail"
                               data-preview="holder" class="bg-blue-500 px-4 py-2 rounded-md text-white">
                                <i class='bx bxs-photo-album'></i> Choose
                            </a>
                        </div>
                    </div>
                    <input id="thumbnail" class="hidden" wire:model="photo" type="text">
                </div>
                <div class="flex space-x-2 items-start w-full">
                    <div class="flex flex-col space-y-2 w-1/3">
                        <label for="">NIK</label>
                        <input type="number" wire:model="nik" class="text-sm rounded-md w-full py-2 px-4">
                        @error('nik')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col space-y-2 w-1/3">
                        <label for="">Nama</label>
                        <input type="text" wire:model="nama" class="text-sm rounded-md w-full py-2 px-4">
                        @error('nama')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col space-y-2 w-1/3">
                        <label for="">Jenis Kelamin</label>
                        <select wire:model="jenis_kelamin" class="text-sm rounded-md w-full">
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="flex space-x-2 items-start w-full">
                    <div class="flex flex-col space-y-2 w-1/3">
                        <livewire:component.search-jabatan/>
                        @error('jabatan_id')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col space-y-2 w-1/3">
                        <label for="">Tanggal Masuk</label>
                        <input type="date" wire:model="tgl_masuk" id="tgl_masuk" class="text-sm rounded-md w-full">
                        @error('tgl_masuk')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col space-y-2 w-1/3">
                        <label for="">Status</label>
                        <select wire:model="status" class="text-sm rounded-md w-full">
                            <option value="tetap">Karyawan Tetap</option>
                            <option value="tidak tetap">Karyawan tidak tetap</option>
                        </select>
                        @error('status')
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

            @if(isset($pegawai))
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
    @push('css')
        <style>
            #holder img {
                width: 650px !important;
                height: 300px !important;
                border-radius: 5px;
            }

            #holder img:not(:last-child) {
                margin-right: 5px;
            }

        </style>
    @endpush
    @push('js')
        <script>
            $("#gaji_pokok").keyup(function(e) {
                if ($(this).val() !== 0){
                    $(this).val(formatRupiah($(this).val(), 'Rp. '));
                }
            });
        </script>
        <script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
        <script>
            $('#lfm').filemanager('image');
            $('#thumbnail').change(function (e) { 
                e.preventDefault();
                @this.photo = $(this).val();
            });
        </script>
    @endpush
</div>
