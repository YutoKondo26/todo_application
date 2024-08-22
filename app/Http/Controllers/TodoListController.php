<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoList;
use App\Http\Requests\TodoListRequest;

class TodoListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = TodoList::select('id','title', 'description', 'deadline', 'tag')->paginate(20);
        return view('todos.index', compact('todos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

            
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoListRequest $request)
    {
        TodoList::create([
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'tag' => $request->tag,
        ]);
        session()->flash('message', '新規タスク登録完了');

            
        return to_route('todos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo = TodoList::find($id);
        
        return view('todos.show', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = TodoList::find($id);
        
        return view('todos.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TodoListRequest $request, $id)
    {
        $todo = TodoList::find($id);
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->deadline = $request->deadline;
        $todo->tag = $request->tag;
        $todo->save();

        session()->flash('message', 'タスク更新完了');

        
        return redirect()->route('todos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        TodoList::destroy($id);
        return redirect()->route('todos.index');
        
        
    }

    public function massDelete(Request $request)
    {
        $ids = $request->ids;
    
        TodoList::whereIn('id', $ids)->delete(); 
  
    
        return to_route('todos.index');
    }
    

}
