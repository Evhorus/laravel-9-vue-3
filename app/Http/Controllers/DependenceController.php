<?php

namespace App\Http\Controllers;

use App\Models\Dependence;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DependenceController extends Controller
{
    public function index()
    {
        $dependences = Dependence::all();
        return Inertia::render(
            'Dependences/Index', 
            [
                'dependences' => $dependences
            ]
        );
    }

    public function create()
    {
        return Inertia::render(
            'Dependences/Create'
        );
    }

    public function store(Request $request)
    {
        $request -> validate([
            'name' => 'required'
        ]);

        Dependence::create([
            'name' => $request->name
        ]);
        sleep(1);

        return redirect()->route('dependences.index')->with('message', 'Dependence Created Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dependence  $dependence
     * @return \Illuminate\Http\Response
     */
    public function show(Dependence $dependence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dependence  $dependence
     * @return \Illuminate\Http\Response
     */
    public function edit(Dependence $dependence)
    {
        return Inertia::render(
            'Dependences/Edit',
            [
                'dependence' => $dependence
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dependence  $dependence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dependence $dependence)
    {
        $request -> validate([
            'name' => 'required'
        ]);

        $dependence->name = $request->name;
        $dependence->save();
        sleep(1);
        return redirect()->route('dependences.index')->with('message', 'Dependence Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dependence  $dependence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dependence $dependence)
    {
        $dependence->delete();
        sleep(1);
        return redirect()->route('dependences.index')->with('message', 'Dependence Deleted Succesfully');
    }
}
