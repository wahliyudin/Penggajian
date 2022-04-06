<?php

use App\Http\Livewire\Absensi;
use App\Http\Livewire\DataGaji as LivewireDataGaji;
use App\Http\Livewire\MasterData\JabatanComponent;
use App\Http\Livewire\MasterData\PegawaiComponent;
use App\Http\Livewire\Transaksi\DataAbsensi;
use App\Http\Livewire\Transaksi\DataGaji;
use App\Http\Livewire\Transaksi\SettingPotonganGaji;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade\Pdf;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::group(['prefix' => 'admin', 'middleware' => ['role:administrator']], function () {
        Route::prefix('master-data')->group(function () {
            Route::get('pegawai', PegawaiComponent::class)->name('pegawai');
            Route::get('jabatan', JabatanComponent::class)->name('jabatan');
        });
        Route::prefix('transaksi')->group(function () {
            Route::get('data-absensi', DataAbsensi::class)->name('data-absensi');
            Route::get('setting-potongan-gaji', SettingPotonganGaji::class)->name('setting-potongan-gaji');
            Route::get('data-gaji', DataGaji::class)->name('data-gaji');
        });
        Route::prefix('exports')->group(function () {
            Route::get('gaji', function () {
                return view('exports.gaji');
            });
        });
    });

    Route::group(['middleware' => ['role:pegawai']], function () {
        Route::get('data-gaji', LivewireDataGaji::class)->name('data-gaji');
    });
});

Route::get('absensi', Absensi::class)->name('absensi');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
