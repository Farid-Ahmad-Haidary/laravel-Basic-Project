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
        
        // it does the same for the tazkra file
        // it takes the file from the request
        $tazkra = $request->file('tazkra');
        $tazkra_name_generated = hexdec(uniqid()) . '.' . $tazkra->getClientOriginalExtension();
        $tazkra_save_path = 'upload/document/';
        $tazkra->move(public_path($tazkra_save_path), $tazkra_name_generated);
        $save_tazkra = $tazkra_save_path . $tazkra_name_generated;
        




        // it saves the video in the database
        $video = $request->file('video');
        $video_name_generated = hexdec(uniqid()). '.' . $tazkra->getClientOriginalExtension();
        $video_save_path = 'upload/video/';
        $video->move(public_path($video_save_path) , $video_name_generated);
        $save_video = $video_save_path . $video_name_generated;


    



        Student::insert([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'file' => $eachPhoto,
            'tazkra' => $save_tazkra,
            'video' => $save_video
             
        ]);
        return redirect()->route('students');
    }
}
