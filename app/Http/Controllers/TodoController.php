<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    public function index()
    {
        return view('todos.index');
    }

    public function create()
    {
        return view('todos.create');
    }

    public function edit()
    {
        return view('todos.edit');
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|max:255',
        ];

        $messages = [
            'title.max' => 'Title way too long!',
            'title.required' => 'You need to write something!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        Todo::create($request->all());
        return redirect()->back()->with('message', 'Todo created successfully!');
    }
}
