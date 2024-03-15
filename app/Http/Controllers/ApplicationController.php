<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{


    public function store(Request $request)
    {


        if ($request->hasFile("file")) {
            $name = $request->file("file")->getClientOriginalName();
            $path = $request->file("file")
                ->storeAs("files", $name, "public");
        }


        $request->validate([
            'subject' => 'required',
            'message' => 'required',
            'file' => 'file|mimes:pdf,docx,pptx,ppt'
        ]);
        $application = Application::create([
            "user_id"=> auth()->user()->id,
            "subject" => $request->subject,
            "message" => $request->message,
            "file_url" => $path ?? null,
        ]);


        // dd($application);

        return redirect()->back();
    }
}
