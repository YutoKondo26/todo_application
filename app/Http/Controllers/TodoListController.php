<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TodoList;

class TodoListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = TodoList::select('id','title', 'description', 'deadline', 'tag')->get();
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
    public function store(Request $request)
    {
        TodoList::create([
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'tag' => $request->tag,
        ]);
            
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
    public function update(Request $request, $id)
    {
        $todo = TodoList::find($id);
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->deadline = $request->deadline;
        $todo->tag = $request->tag;
        $todo->save();
        
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
        if(!$id) {
            // return to_route('todos.index');
            dd('IDがありません');
        }else{
            // return to_route('todos.index');
            dd('IDがあります');
            TodoList::destroy($id);
            return redirect()->route('todos.index');
        }
        
    }

    public function massDelete(Request $request)
    {
        // 削除するタスクのIDを取得
        $ids = $request->ids;
        // dd($ids);

        // IDが存在する場合、タスクを削除
        if ($ids) {
            TodoList::whereIn('id', $ids)->delete();            
        }

        // リダイレクトして削除が完了したことを通知
        return to_route('todos.index')->with('success', '選択したタスクを削除しました');
    }

}
