<?php

namespace App\Http\Controllers;

use App\Type;
use App\Task;

use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $types = Type::all();
        $search = $request->search;

        $types = Type::query()->sortable()->where("title", 'LIKE', "%{$search}%")->orWhere("description", 'LIKE', "%{$search}%")->paginate(30);


        return view("type.index", ["types" => $types]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();

        return view("type.create", ["types" => $types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type = new Type;
        $validateVar = $request->validate([
            'type_title' => 'required|regex:/^[\pL\s]+$/u',
            'type_description' => 'required|max:1500',
        ]);
        $type->title = $request->type_title;
        $type->description = $request->type_description;

        $type->save();
        return redirect()->route("type.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        return view('type.show',["type" => $type]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
          return view("type.edit", ["type" => $type]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $validateVar = $request->validate([
            'type_title' => 'required|regex:/^[\pL\s]+$/u',
            'type_description' => 'required|max:1500',
        ]);
        $type->title = $request->type_title;
        $type->description = $request->type_description;

        $type->save();
        return redirect()->route("type.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $types_count = $type->typeAll->count();
        if($types_count!==0) {
            return redirect()->route("type.index")->with('error_message','Type can not be deleted, because has companies');
        }
        $type->delete();
        return redirect()->route("type.index")->with('sucess_message','Type deleted successfully');
    }
}
