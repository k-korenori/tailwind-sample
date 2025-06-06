<?php

// app/Http/Controllers/TodoController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        Todo::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
        ]);

        return redirect()->route('dashboard');
    }

    public function index()
    {
        $todos = Todo::where('user_id', auth()->id())->latest()->get();
        return view('dashboard', compact('todos'));
    }
}