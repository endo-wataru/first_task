<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task; //モデルTaskを使えるよう読み込む

class TaskController extends Controller
{
    //タスク一覧表示
    public function index()
    {
        //$values = Task::all(); //Taskモデルのデータを$valuesに格納
        // dd($values); 指定した場所で処理を止めて変数の中身を確認

        $tasks = Task::select('id', 'title', 'description')
            ->get();

        //viewsのtask.blade.phpのindexにアクセス指示  $tasksを圧縮してindexページに渡す 
        return view('tasks.index', compact('tasks'));
    }

    //新規作成機能
    public function create()
    {
        return view('tasks.create');
    }

    //保存機能
    public function store(Request $request) //引数Requestクラスでデータを受け取る
    {
        //dd($request, $request->title);
        //$user = auth()->user();
        //$user_id = $user->id;
        //DBへ登録するメソッド
        Task::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return to_route('tasks.index')->with('success', 'タスクが作成されました。'); //DB登録したらリダイレクトする

    }

    //参照機能
    public function show($id)
    {
        $task = Task::find($id); //findメソッドで何番目のデータを取得するか指定する

        return view('tasks.show', compact('task'));
    }

    //編集機能
    public function edit($id)
    {
        $task = Task::find($id);
        
        return view('tasks.edit', compact('task'));
    }

    //更新機能
    public function update(Request $request, $id)
    {   //$taskは引数$idからのデータを受け取る $requestはフォームから入力された値を受け取りDB更新する処理
        $task = Task::find($id);

        $task->title = $request->title;
        $task->description = $request->description;
        $task->save(); //saveメソッドで上記のデータを保存する

        return to_route('tasks.index'); //indexにリダイレクト処理が入る
    }
 
    //削除機能
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete(); //deleteメソッドで削除する

        return to_route('tasks.index'); //DB内容を削除して更新するのでindexにリダイレクト処理
    }

}
