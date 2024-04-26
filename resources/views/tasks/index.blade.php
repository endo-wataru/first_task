<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                タスク一覧
            </h2>

        </div>
        <!-- 新規作成成功メッセージ -->
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    </x-slot>

    <!-- 新規作成リンク -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-800">
                    <div class="flex space-x-4 justify-between">
                        <!-- ソート機能 -->
                        <div class="flex space-x-4">
                            <button class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                                <div scope="col">
                                    @sortablelink('created_at', '作成日順', ['sort' => 'asc'])
                                </div>
                            </button>
                            <button class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                                <div scope="col">
                                    @sortablelink('updated_at', '更新日順', ['sort' => 'desc'])
                                </div>
                            </button>
                            <button class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                                <div scope="col">
                                    @sortablelink('title', 'タスク名')
                                </div>
                            </button>
                        </div>
                        <div class="ml-auto flex justify-end">
                            <button class="text-white bg-green-500 border-0 py-2 px-8 focus:outline-none hover:bg-green-600 rounded text-lg">
                                <a href="{{ route('tasks.create') }}" class="text-white-500">タスク新規作成</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- タスクデータを繰り返し表示する -->
    @foreach($tasks as $task)
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-800">
                    作成日:{{ $task->created_at }}|
                    更新日:{{ $task->updated_at }}|
                    タスク名:{{ $task->title }}

                    <div class="flex space-x-4">
                        <button class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                            <a href="{{ route('tasks.show', ['id' => $task->id]) }}">詳細</a>
                        </button>

                        <button class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                            <a href="{{ route('tasks.edit', ['id' => $task->id]) }}">編集</a>
                        </button>

                        <form id="delete_{{ $task->id }}" method="post" action="{{ route('tasks.destroy', ['id' => $task->id ] )}}" class="text-white bg-pink-600 border-0 py-2 px-8 focus:outline-none hover:bg-pink-700 rounded text-lg">
                            @csrf
                            <a href="#" data-id="{{ $task->id }}" onclick="deletePost(this)">削除</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <!-- 削除時の確認メッセージを表示する -->
    <script>
        function deletePost(e) {
            'use strict'
            if (confirm('本当に削除してもいいですか？')) {
                document.getElementById('delete_' + e.dataset.id).submit()
            }
        }
    </script>

    <!-- ペジネーション対応 -->
    {{ $tasks->links() }}
</x-app-layout>