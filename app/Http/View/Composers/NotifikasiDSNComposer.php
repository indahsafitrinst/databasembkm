<?php

namespace App\Http\View\Composers;

use DB;
use Illuminate\View\View;


class NotifikasiDSNComposer
{

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        //CATCH NOTIFIKASI DISINI
        $notifcatch = DB::table('tbl_notifikasi')->where('nip', session('nip'))->get();
        //untuk badge
        $notifnew = DB::table('tbl_notifikasi')
        ->where('nip', session('nip'))
        ->get();


        $composertesting = "ngetest aja ni";
        $view->with('notifcatch', $notifcatch)->with('newnotif', $notifnew->count());
    }
}
