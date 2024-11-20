<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $activity = new Activity;
        $data = $activity->all();
        return view('todo', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
        'activity' => 'required|string|min:4|max:20'
       ]);
       $activity = new Activity;
       $activity->name_activity = $request->activity;
       $activity->save();
       return redirect('/')->with('success', 'activity has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $activity = new Activity;
        $activity->find($id)->delete();
        return redirect('/')->with('success', 'activity has deleted!');
    }
}
