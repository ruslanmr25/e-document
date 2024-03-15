<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function dashboard()
    {
        $applications = Application::latest()->paginate(10);

        // dd($applications  );
        return view("dashboard", [
            "applications" => $applications
        ]);
    }
}
