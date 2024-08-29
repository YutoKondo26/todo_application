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
    public function index(Request $request)
    {
        // $search = $request->search;//$request->inputのname
        // $query = TodoList::search($search);//モデル名::search($変数)
        // $todos = $query->select('id','title', 'description', 'deadline', 'tag')
        // ->paginate(20);
        // return view('todos.index', compact('todos'));
        
        $search = $request->search;  // 検索キーワードを取得
        $query = TodoList::query();  // TodoListモデルのクエリビルダーを取得
    
        // 検索条件がある場合は、検索を適用
        if (!empty($search)) {
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('tag', 'like', "%{$search}%");
        }
    
        // 並び替えを適用
        $query->orderBy($request->get('sort', 'deadline'), $request->get('direction', 'asc'));
    
        // ページネーションを適用
        $todos = $query->select('id', 'title', 'description', 'deadline', 'tag')
                       ->paginate(20);
    
        // ビューにデータを渡す
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
        session()->flash('message', 'タスク完了');

        return redirect()->route('todos.index');
        
        
    }

    public function massDelete(Request $request)
    {
        $ids = $request->ids;
    
        TodoList::whereIn('id', $ids)->delete(); 
  
        session()->flash('message', 'タスク完了');

        return to_route('todos.index');
    }
    

}
