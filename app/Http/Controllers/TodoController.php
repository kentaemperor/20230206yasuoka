<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
public function index()

{
   $todos = Todo::all();
    return view('index', ['todos' => $todos]);
}

public function create(TodoRequest $request)
  {
    $form = $request->all();
    Todo::create($form);
    return redirect('/');
  }

   public function update(TodoRequest $request)
  {
    $form = $request->all();
    unset($form['_token']);
    Todo::where('id', $request->id)->update($form);
    return redirect('/');
  }

   public function delete(TodoRequest $request)
  {
    $todo = Todo::find($request->id);
    return view('delete', ['form' => $todo]);
  }
  
}


 