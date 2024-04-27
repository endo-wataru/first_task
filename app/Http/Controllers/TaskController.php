<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    //タスク一覧機能
    public function index(Request $request)
    {

       //ログインしたユーザーのみのタスクを取得
        $tasks = Task::where('user_id', auth()->id())->sortable()->paginate(10);

        //viewsのtask.blade.phpのindexにアクセス指示  $tasksを圧縮してindexページに渡します
        return view('tasks.index', compact('tasks'));
    }

    //新規作成機能
    public function create()
    {
        return view('tasks.create');
    }

    //保存機能 引数Requestクラスでデータを受け取る
    public function store(Request $request)
    {
        //バリデーションルール
        $request->validate([
                'title' => 'required|string|max:255', //必須で文字列を扱い最大255文字まで
                'description' => 'nullable|string', //空でも良いが、文字列であれば無制限
            ]);

        $user_id = auth()->user()->id;
        //バリデーションが通過したら新しいタスクを作成
        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $user_id,
        ]);
        //DB登録したらリダイレクトする
        return to_route('tasks.index')->with('success', 'タスクが作成されました。');
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

        //バリデージョンルール
        $request->validate([
                'title' => 'required|string|max:255', //必須で文字列で最大255文字まで
                'description' => 'nullable|string', //空でも良いが、文字列であれば無制限
            ]);

        //左辺はテーブルに保存された値 右辺はリクエストで入力された値
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
