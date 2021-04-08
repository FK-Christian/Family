<?php

namespace App\Http\Controllers;

use App\Models\Family;

class UserMarriagesController extends Controller {

    /**
     * Show user marriage list.
     *
     * @param  \App\Family  $user
     * @return \Illuminate\View\View
     */
    public function index(Family $user) {
        $marriages = $user->marriages()->with('husband', 'wife')
                        ->withCount('childs')->get();

        return view('users.marriages', compact('user', 'marriages'));
    }

}
