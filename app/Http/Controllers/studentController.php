<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class studentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }



    public function create()
    {
        return view('students.create');
    }



    public function store(Request $request)
    {    
        // it just takes the file from the request
        $photo = $request->file('file');
         // it generates a unique name for the file
        $name_generated = hexdec(uniqid()) . '.' . $photo->getClientOriginalExtension();
        // it creates the path where the file will be saved
        // in this case, it will be saved in the public/uploads/image directory
        $save_path = 'upload/image/';  
        // it moves the file to the public directory
        $photo->move(public_path($save_path), $name_generated);
        // it saves the file path in the database
        $eachPhoto = $save_path. $name_generated;



        Student::insert([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'file' => $eachPhoto 
        ]);
        return redirect()->route('students');
    }
}
