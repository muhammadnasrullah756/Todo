<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function create()    {
        return view('todo.create');
    }

    public function store(Request $request) {
        $request->validate([
            'todo' => 'required|string',
        ]);

        Todo::create([
            'user_id' => Auth::id(),
            'todo' => $request->todo,
        ]);

        return redirect('/home')->with('status', 'Berhasil membuat Todo Baru');
    }

    public function edit($id)  {
        $data = Todo::find($id);
        return view('todo.edit', ['todo' => $data]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'todo' => 'required|string',
        ]);

        //cara 1
        // $todo = Todo::find($id);
        // $todo->user_id = 1;
        // $todo->todo = $request->todo;
        // $todo->save();

        //cara 2
        Todo::where('id', $id)->update([
            'todo' => $request->todo
        ]);
        return redirect('/home')->with('status', 'Berhasil Update Todo');

    }

    public function delete($id) {
        //cara 1
        // $todo = Todo::find($id);
        // $todo->delete();

        //cara 2
        Todo::destroy($id);

        return redirect('/home')->with('status', 'Berhasil Delete');
    }
}
