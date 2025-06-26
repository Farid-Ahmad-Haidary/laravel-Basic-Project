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


   // create method to show the form for creating a new student
    public function create()
    {
        return view('students.create');
    }


    
    public function store(Request $request)
    {    
        // it validates the request
        $validated = $request->validate(([
        'name'=> ['required', 'string', 'max:255'],
        ]));

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
        
        // it saves the tazkra in the database
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
            'name' => $validated['name'],
            'last_name' => $request->last_name,
            'file' => $eachPhoto,
            'tazkra' => $save_tazkra,
            'video' => $save_video
             
        ]);
        return redirect()->route('students');
    }


    //Edit
    public function edit($id)
    {
        $student = Student::find($id);
        return view('students.edit', compact('student'));
      
    }



    //Update
    public function update(Request $request){
        $studentid = $request->id;
        if($request->file('file')){
            $oldPhoto = Student::find($studentid)->file;
            if($oldPhoto && file_exists(public_path($oldPhoto))){
                unlink(public_path($oldPhoto));
            }
            
        $photo = $request->file('file');
        $name_Photo_generated = hexdec(uniqid()) . '.' . $photo->getClientOriginalExtension();
        $photo->move(public_path('upload/image/'), $name_Photo_generated);
        $save_photo_url = 'upload/image/' . $name_Photo_generated;    

        // Update the student's photo path in the database
        Student::find($studentid)->update([
            'file' => $save_photo_url
        ]);
         return redirect()->route('students')->with('success', 'Photo updated successfully');
        }
         
        // Check if a video file is uploaded
        elseif($request->file('video')){
        $oldvideo = Student::find($studentid)->video;
        if($oldvideo && file_exists(public_path($oldvideo))){
            unlink(public_path($oldvideo));
        }
            
        $video = $request->file('video');
        $name_video_generated = hexdec(uniqid()) . '.' . $video->getClientOriginalExtension();
        $video->move(public_path('upload/image/'), $name_video_generated);
        $save_video_url = 'upload/image/' . $name_video_generated;    

        // Update the student's photo path in the database
        Student::find($studentid)->update([
            'video' => $save_video_url
        ]);
         return redirect()->route('students')->with('success', 'video updated successfully');
        }
        elseif($request->file('tazkra')){
            $oldTazkra = Student::find($studentid)->tazkra;
            if($oldTazkra && file_exists(public_path($oldTazkra))){
            unlink(public_path($oldTazkra));
            }

            $tazkra = $request->file('tazkra');
            $name_tazkra_generated = hexdec(uniqid()) . '.' . $tazkra->getClientOriginalExtension();
            $tazkra->move(public_path('upload/document/'), $name_tazkra_generated);
            $save_tazkra_url = 'upload/document/' . $name_tazkra_generated;

            Student::find($studentid)->update([
            'tazkra' => $save_tazkra_url
            ]);
            return redirect()->route('students')->with('success', 'Tazkra updated successfully');
        }
        else{
            // If no file is uploaded, update other fields
            Student::find($studentid)->update([
                'name' => $request->name,
                'last_name' => $request->last_name
            ]);
            return redirect()->route('students')->with('success', 'Student updated successfully');}
            
        }

    //Delete
     public function delete($id){
        Student::find($id)->delete();
        return redirect()->route('students')->with('success', 'Student deleted successfully');

     }
    }