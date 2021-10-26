<?php

namespace App\Http\Controllers;

use App\PaginatonSetting;
use Illuminate\Http\Request;

class PaginatonSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginationsettings = PaginatonSetting::all();
        return view("pagination.index", ["paginationsettings" => $paginationsettings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paginationsettings = PaginatonSetting::all();
        return view("pagination.create", ["paginationsettings" => $paginationsettings]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paginatonsetting = new Paginatonsetting;
        $paginatonsetting->title = $request->paginaton_title;
        $paginatonsetting->value = $request->paginaton_value;
        $paginatonsetting->visible = $request->paginaton_visible;
        $paginatonsetting->save();

        return redirect()->route("pagination.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PaginatonSetting  $paginatonSetting
     * @return \Illuminate\Http\Response
     */
    public function show(PaginatonSetting $paginatonsetting)
    {
        return view('pagination.show',["paginatonsetting" => $paginatonsetting]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PaginatonSetting  $paginatonSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(PaginatonSetting $paginatonsetting)
    {
        // $paginatonSetting = PaginatonSetting::all();
        return view('pagination.edit',["paginatonsetting" => $paginatonsetting]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PaginatonSetting  $paginatonSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaginatonSetting $paginatonsetting)
    {
        $paginatonsetting->title = $request->paginaton_title;
        $paginatonsetting->value = $request->paginaton_value;
        $paginatonsetting->visible = $request->paginaton_visible;
        $paginatonsetting->save();

        return redirect()->route("pagination.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PaginatonSetting  $paginatonSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaginatonSetting $paginatonsetting)
    {
        $paginatonsetting->delete();
        return redirect()->route("pagination.index");
    }
}
