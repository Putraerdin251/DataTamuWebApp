<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

/**
 * Class Handler berfungsi untuk menangani semua exception/error yang terjadi dalam aplikasi
 * Class ini meng-extend ExceptionHandler dari Laravel untuk menggunakan fitur exception handling bawaan
 */
class Handler extends ExceptionHandler
{
    /**
     * Mendefinisikan level log untuk tipe exception tertentu
     * Digunakan untuk menentukan tingkat keparahan log yang berbeda untuk exception yang berbeda
     * Contoh: 'critical' untuk error fatal, 'error' untuk exception biasa
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * Daftar tipe exception yang tidak perlu dilaporkan
     * Exception yang didaftarkan disini tidak akan masuk ke log aplikasi
     * Berguna untuk mengabaikan exception yang tidak terlalu penting
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * Daftar input yang tidak akan di-flash ke session saat terjadi validation exception
     * Ini penting untuk keamanan, terutama untuk data sensitif seperti password
     * Data yang terdaftar disini tidak akan tersimpan di session flash data
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Mendaftarkan callback untuk penanganan exception
     * Method ini digunakan untuk mendefinisikan logika custom dalam menangani exception
     * Dapat digunakan untuk menambahkan logging khusus atau mengirim notifikasi
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            // Tambahkan logika custom untuk menangani exception disini
        });
    }
}
