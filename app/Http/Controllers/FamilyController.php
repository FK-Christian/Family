<?php

namespace App\Http\Controllers;

use App\Family;
use App\DataTables\FamilyDataTable;
use Illuminate\Http\Request;

class FamilyController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FamilyDataTable $familyDataTable) {
        return $familyDataTable->render('family.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return redirect()->route('users.show', auth()->user()->id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\family  $family
     * @return \Illuminate\Http\Response
     */
    public function show($family_id) {
        $user = Family::where('id',$family_id)->first()->user;
        return redirect()->route('users.show', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\family  $family
     * @return \Illuminate\Http\Response
     */
    public function edit(Family $family) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\family  $family
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Family $family) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\family  $family
     * @return \Illuminate\Http\Response
     */
    public function destroy($family_id) {
        return redirect()->route('family.index');
    }

}
