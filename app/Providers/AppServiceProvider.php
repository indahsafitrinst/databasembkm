<?php

namespace App\Providers;

use App\Http\View\Composers\NotifikasiComposer;
use App\Http\View\Composers\NotifikasiDSNComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      View::composer(['profil','dashboardmhs','halkrs','halkhs','merdekabelajar','pengajuanmbkm','pengajuankonvnilai','ubahkrs'],NotifikasiComposer::class);
      View::composer([
        'profildsn',
        'daftarkonvnilai',
        'daftarkonvnilaisearch',
        'daftarmhsmbkm',
        'daftarmhsmbkmsearch',
        'dashboarddosen',
        'detailmhsmbkm',
        'dkmndikirim',
        'dkmndikirimsearch',
        'errordsn',
        'mhsdibimbing',
        'mhsdibimbingsearch',
        'pengumumanbuat',
        'pengumumansearch',
        'pengumumandaftar',
        'pengumumanedit',
        'pengumumantampil',
        'permohonanmbkm',
        'permohonanmbkmsearch',
        'prosesterimakonvnilai',
        'prosesterimambkm',
        'daftarkrsmahasiswa',
        'detailkrsmahasiswa',
        'daftarkhsmahasiswa',
        'daftarkhsmahasiswa1'
      ],NotifikasiDSNComposer::class);

    }
}
