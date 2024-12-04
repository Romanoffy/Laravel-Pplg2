<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use PhpParser\Node\Stmt\Return_;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = new Student;
        $data = $student->all();
        return view('student', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_name' => 'required|string|unique:students,student_name',
            'student_class' => 'required|string',
            'student_major' => 'required|string',
            'photo' => 'required|image:jpg,jpeg,png|max:1024',
        ]);

        $time = Carbon::now()->format("Y-m-d_H_i_s");
        $photo = $time . '.' . $request->photo->extension();
        $request->file('photo')->move(public_path("upload/student"), $photo);

        $student = new Student;
     
        $student->student_name = $request->student_name;
        $student->student_class = $request->student_class;
        $student->student_major = $request->student_major;
        $student->photo = url('upload/student') . '/' . $photo;
        $student->photo_name = $photo;
        $student->save();
   

        return redirect('/student')->with('success', 'student has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = new Student;
        $data = $student->find($id);
        return view('student-update', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'student_name' => 'required|string',
            'student_class' => 'required|string',
            'student_major' => 'required|string',
            'photo' => 'required|image:jpg,jpeg,png|max:1024',
        ]);

        $student = new Student;
        $data = $student->find($id);

        if(isset($request->photo)){
            $request->validate([
                'photo' => 'required|image:jpg,jpeg,png|max:1024'
            ]);
            $request->file('photo')->move(public_path("upload/student"), 
            $data->photo_name);
        }

        $data->student_name = $request->student_name;
        $data->student_class = $request->student_class;
        $data->student_major = $request->student_major;
        $data->save();

        return redirect('/student')->with('success', 'student has been update');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = new Student;
        $data = $student->find($id);
        $path = public_path('upload/student/') . $data->photo_name;
        File::delete($path);
        $data->delete();
        return redirect('/student')->with('success', 'student has been deleted');

    }
}
