<?php

namespace App\Http\Controllers;

use App\Models\Pinch;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PinchController extends Controller
{

    use AuthorizesRequests;

    public function index()
    {
        $pinches = Pinch::with('user')
        ->latest()
        ->take(50)
        ->get();    
        return view('home', ['pinches' => $pinches]);
    }
    
    public function store(Request $request)
    {
        //validate request
        $validated = $request->validate([
            'message' => 'required|string|max:255|min:5',
        ],[
            'message.required' => 'Please write something to pinch!',
            'message.max' => 'Pinches must be 255 characters or less.',
        ]);

        auth()->user()->pinches()->create($validated);

        return redirect('/')->with('success', 'Your pinch has been posted!');
    }

    public function edit(Pinch $pinch)
    {
        $this->authorize('update', $pinch);
        
        return view('pinches.edit', compact('pinch'));
    }

    public function update(Request $request, Pinch $pinch)
    {
        $this->authorize('update', $pinch);
         //validate request
         $validated = $request->validate([
            'message' => 'required|string|max:255|min:5',
        ],[
            'message.required' => 'Please write something to pinch!',
            'message.max' => 'Pinches must be 255 characters or less.',
        ]);

        $pinch->update($validated);

        return redirect('/')->with('success', 'Your pinch has been updated!');
    }

    public function destroy(Pinch $pinch)
    {   
        $this->authorize('update', $pinch);
        
        $pinch->delete();

        return redirect('/')->with('sucess, Your pinch has been deleted!');
    }
}
