<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Absensi') }}
        </h2>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-4 lg:px-6">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="flex justify-between items-center py-2 px-4">
                            <span class="text-gray-500">Kelas: X</span>
                            <input type="date" disabled name="" id="" class="rounded-md text-gray-500">
                        </div>
                        <div class="overflow-hidden">
                            <table class="min-w-full">
                                <thead class="bg-white border-b">
                                    <tr>
                                        <th scope="col" class="text-sm text-gray-900 px-6 py-4 text-left">
                                            Nama
                                        </th>
                                        <th scope="col" class="text-sm text-gray-900 px-6 py-4 text-left">

                                        </th>
                                        <th scope="col" class="text-sm text-gray-900 px-6 py-4 text-left">
                                            Keterangan
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            ujang
                                        </td>
                                        <td class="text-sm text-gray-900 px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center space-x-3">
                                                <div class="flex space-x-2 items-center">
                                                    <input type="checkbox" class="rounded-full">
                                                    <span>Sakit</span>
                                                </div>
                                                <div class="flex space-x-2 items-center px-4">
                                                    <input type="checkbox" class="rounded-full">
                                                    <span>Izin</span>
                                                </div>
                                                <div class="flex space-x-2 items-center px-4">
                                                    <input type="checkbox" class="rounded-full">
                                                    <span>Alfa</span>
                                                </div>
                                                <div class="flex space-x-2 items-center">
                                                    <input type="checkbox" class="rounded-full">
                                                    <span>Hadir</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            sdfhsldfhdslf
                                        </td>
                                    </tr>
                                    <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            ksdgfdf
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center space-x-4">
                                                <div class="flex space-x-2 items-center">
                                                    <input type="checkbox" class="rounded-full">
                                                    <span>Sakit</span>
                                                </div>
                                                <div class="flex space-x-2 items-center px-4">
                                                    <input type="checkbox" class="rounded-full">
                                                    <span>Izin</span>
                                                </div>
                                                <div class="flex space-x-2 items-center px-4">
                                                    <input type="checkbox" class="rounded-full">
                                                    <span>Alfa</span>
                                                </div>
                                                <div class="flex space-x-2 items-center">
                                                    <input type="checkbox" class="rounded-full">
                                                    <span>Hadir</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            sdfhsldfhdslf
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="flex justify-end py-2 px-4">
                            <button class="bg-green-500 rounded-md px-4 py-2 text-white">
                                Simpan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
