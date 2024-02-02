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

    //新規作成画面
    public function create()
    {
        return view('tasks.create');
    }

    //保存画面
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

}
