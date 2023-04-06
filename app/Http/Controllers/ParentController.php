<?php

namespace App\Http\Controllers;

use App\Models\ParentModel;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;

        //create the parent 
        $parent = new ParentModel;
        $parent->first_name = $request->formData['firstName'];
        $parent->email = $request->formData['email'];
        $parent->last_name = $request->formData['lastName'];
        $parent->phone = $request->formData['phone'];
        $parent->location = $request->formData['location'];
        $parent->save();
        $note = "";
        foreach( $request->children as $child){
            $parent->children()->create([
                'first_name' => $child['firstName'],
                'last_name' => $child['lastName'],
                'dob' => $child['dob'],
                'class' => $child['class'],
                'technology' => $child['technology'],
            ]);
            $note .= $child['firstName'].' '.$child['lastName'].',';
        }

        $trans = $parent->transactions()->create([
            'reference' => TransRef::getHashedToken(),
            'type' => "credit",
            'status' => "pending",
            'amount' => 25000*count($request->children),
            'note' => "".$note."",
        ]);
        // send an email 
        // return true if they all worked
        return  response()->json($trans, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(ParentModel $parentmodel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ParentModel $parentmodel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ParentModel $parentmodel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ParentModel $parentmodel)
    {
        //
    }
}
