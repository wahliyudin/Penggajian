<ul class="metismenu fixed left-0 top-0 bg-blue-500 h-screen w-52 space-y-2" id="menu">
    <div class="flex justify-center items-center py-4 border-b">
        <span class="text-white uppercase font-bold">penggajian</span>
    </div>
    <li class="px-4">
        <a href="{{ route('dashboard') }}" class="text-gray-200 flex py-2 items-center space-x-2 font-bold"
            aria-expanded="true">
            <i class='bx bxs-dashboard text-xl'></i>
            <span class="text-sm">Dashboard</span>
        </a>
    </li>
    @role('administrator')
        <li class="{{ Request::is('master-data/*') ? 'mm-active' : '' }} px-4">
            <a href="#" class="has-arrow text-gray-200 flex py-2 items-center space-x-2 font-bold"
                aria-expanded="{{ Request::is('master-data/*') }}">
                <i class='bx bxs-data text-xl'></i>
                <span class="text-sm">Master Data</span>
            </a>
            <ul class="flex flex-col bg-white rounded-md">
                <li class="px-2 pt-2">
                    <a href="{{ route('pegawai') }}"
                        class="{{ request()->routeIs('pegawai') ? 'text-blue-500 bg-gray-100' : 'text-gray-500' }} hover:text-blue-500 px-4 py-2 flex text-sm hover:bg-gray-100 transition-all duration-300 rounded-md">Data
                        Pegawai</a>
                </li>
                <li class="px-2 pb-2">
                    <a href="{{ route('jabatan') }}"
                        class="{{ request()->routeIs('jabatan') ? 'text-blue-500 bg-gray-100' : 'text-gray-500' }} hover:text-blue-500 px-4 py-2 flex text-sm hover:bg-gray-100 text-gray-500 transition-all duration-300 rounded-md">Data
                        Jabatan</a>
                </li>
            </ul>
        </li>
        <li class="{{ Request::is('transaksi/*') ? 'mm-active' : '' }} px-4">
            <a href="#" class="has-arrow text-gray-200 flex py-2 items-center space-x-2 font-bold"
                aria-expanded="{{ Request::is('transaksi/*') ? 'mm-active' : '' }}">
                <i class='bx bx-transfer-alt text-xl'></i>
                <span class="text-sm">Transaksi</span>
            </a>
            <ul class="flex flex-col bg-white rounded-md">
                <li class="pt-2">
                    <a href="{{ route('data-absensi') }}"
                        class="{{ request()->routeIs('data-absensi') ? 'text-blue-500 bg-gray-100' : 'text-gray-500' }} hover:text-blue-500 px-4 py-2 flex text-sm hover:bg-gray-100 text-gray-500 transition-all duration-300 rounded-md">Data
                        Absensi</a>
                </li>
                <li class="">
                    <a href="{{ route('setting-potongan-gaji') }}"
                        class="{{ request()->routeIs('setting-potongan-gaji') ? 'text-blue-500 bg-gray-100' : 'text-gray-500' }} hover:text-blue-500 px-4 py-2 flex text-sm hover:bg-gray-100 text-gray-500 transition-all duration-300 rounded-md">Setting
                        Potongan Gaji</a>
                </li>
                <li class="pb-2">
                    <a href="{{ route('data-gaji') }}"
                        class="{{ request()->routeIs('data-gaji') ? 'text-blue-500 bg-gray-100' : 'text-gray-500' }} hover:text-blue-500 px-4 py-2 flex text-sm hover:bg-gray-100 text-gray-500 transition-all duration-300 rounded-md">Data
                        Gaji</a>
                </li>
            </ul>
        </li>
        <li class="px-4">
            <a href="#" class="has-arrow text-gray-200 flex py-2 items-center space-x-2 font-bold" aria-expanded="false">
                <i class='bx bx-file text-xl'></i>
                <span class="text-sm">Laporan</span>
            </a>
            <ul class="flex flex-col bg-white rounded-md">
                <li class="px-2 pt-2">
                    <a href=""
                        class="px-4 py-2 flex text-sm hover:bg-gray-100 text-gray-500 transition-all duration-300 rounded-md">Laporan
                        Gaji</a>
                </li>
                <li class="px-2">
                    <a href=""
                        class="px-4 py-2 flex text-sm hover:bg-gray-100 text-gray-500 transition-all duration-300 rounded-md">Laporan
                        Absensi</a>
                </li>
                <li class="px-2 pb-2">
                    <a href=""
                        class="px-4 py-2 flex text-sm hover:bg-gray-100 text-gray-500 transition-all duration-300 rounded-md">Slip
                        Gaji</a>
                </li>
            </ul>
        </li>
    @endrole
    @role('pegawai')
        <li class="px-4">
            <a href="{{ route('data-gaji') }}" class="text-gray-200 flex py-2 items-center space-x-2 font-bold" aria-expanded="false">
                <i class='bx bx-money text-xl'></i>
                <span class="text-sm">Data Gaji</span>
            </a>
        </li>
    @endrole
    <li class="px-4">
        <form method="POST" action="{{ route('logout') }}" x-data>
            @csrf
            <a href="{{ route('logout') }}" @click.prevent="$root.submit();"
                class="text-gray-200 flex py-2 items-center space-x-2 font-bold" aria-expanded="false">
                <i class='bx bx-log-out text-xl'></i>
                <span class="text-sm">Logout</span>
            </a>
        </form>
    </li>
</ul>
@push('js')
    <script>
        $("#menu").metisMenu();
    </script>
@endpush
