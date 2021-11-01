<?php

namespace App\Http\Controllers;

use App\Owner;
use Illuminate\Http\Request;
use PDF;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $owners = Owner::all();

        return view("owner.index", ["owners" => $owners]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $owners = Owner::all();

        return view("owner.create", ["oweners" => $owners]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $owner = new Owner;

        $validateVar = $request->validate([
            'owner_name' => 'required|regex:/^[\pL\s]+$/u|min:2|max:15',
            'owner_surname' => 'required|regex:/^[\pL\s]+$/u|min:2|max:15',
            'owner_email' => 'required|email',
            'owner_phone' => 'required|max:9|(86|\+3706) \d{3} \d{4}',
            // 'owner_phone' => 'required|regex:(\+|00)[370]{2,6}(\s[0-9]{2,6})+',

        ]);

        $owner->name = $request->owner_name;
        $owner->surname = $request->owner_surname;
        $owner->email = $request->owner_email;
        $owner->phone = $request->owner_phone;

        $owner->save();
        return redirect()->route("owner.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function show(Owner $owner)
    {
        return view('owner.show',["owner" => $owner]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function edit(Owner $owner)
    {
        return view('owner.edit',["owner" => $owner]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Owner $owner)
    {
        $validateVar = $request->validate([
            'owner_name' => 'required|regex:/^[\pL\s]+$/u|min:2|max:15',
            'owner_surname' => 'required|regex:/^[\pL\s]+$/u|min:2|max:15',
            'owner_email' => 'required|email',
            'owner_phone' => 'required',
            // 'owner_phone' => 'required|regex:(\+[0-9]/^3|7|0$/{2,6}(\s[0-9]{2,6})+)',

        ]);
        $owner->name = $request->owner_name;
        $owner->surname = $request->owner_surname;
        $owner->email = $request->owner_email;
        $owner->phone = $request->owner_phone;

        $owner->save();
        return redirect()->route("owner.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner)
    {
        $owners_count = $owner->ownerAll->count();
        if($owners_count!==0) {
            return redirect()->route("owner.index")->with('error_message','Owner can not be deleted, because has companies');
        }
        $owner->delete();
        return redirect()->route("owner.index")->with('sucess_message','Owner deleted successfully');
    }

    public function generatePDF()
    {
        $owners = Owner::all();
        view()->share(['owners'=> $owners]);
        // view()->share('tasks_count', $tasks_count);

        $pdf = PDF::loadView("pdf_owners_template", $owners);
        return $pdf->download("owners.pdf");

    }

    public function generateOwner(Owner $owner)
    {
        view()->share('owner', $owner);

        $pdf = PDF::loadView("pdf_owner_template", $owner);
        return $pdf->download("owner".$owner->id.".pdf");

    }
}
