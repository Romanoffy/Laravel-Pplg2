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
        $data = new Activity;
        $activity = $data->find($id);
       
        return view('todo-update', compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'activity' => 'required|string|min:4|max:20'
           ]);
           $activity = new Activity;
           $data= $activity->find($id);
           $data->name_activity = $request->activity;
           $data->save();
           return redirect('/')->with('tes', 'activity has been  update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $activity = new Activity;
        $activity->find($id)->delete();
        return redirect('/')->with('hapus', 'activity has deleted!');
    }
}
