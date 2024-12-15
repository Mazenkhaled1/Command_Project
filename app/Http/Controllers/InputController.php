<?php

namespace App\Http\Controllers;

use App\Models\Input;
use Illuminate\Http\Request;

class InputController extends Controller
{
    public function store (Request $request) 
    {

        
            // Validate the form input
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'message' => 'required|string|max:5000',
            ]);
        
            // Save data to the database
            Input::create([
                'name' => $validatedData['name'],
                'message' => $validatedData['message'],
            ]);
        
            // Redirect back with success message
            return redirect()->back()->with('success', 'Data saved successfully!');
        }
    
}
