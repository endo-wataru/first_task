<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            タスク一覧
        </h2>
    </x-slot>
    <!-- 新規作成リンク -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-800">
                    index<br>
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <a href="{{ route('tasks.create') }}" class="text-blue-500">タスク新規作成</a>
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
                   <!-- {{ $task->id }} -->
                    {{ $task->title }}
                    {{ $task->description }}
                    <div class="flex space-x-4">
                       <button class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                        <a href="{{ route('tasks.show', ['id' => $task->id]) }}">詳細</a>
                       </button>

                       <button class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                        <a href="{{ route('tasks.edit', ['id' => $task->id]) }}">編集</a>
                       </button>

                       <form id="delete_{{ $task->id }}" method="post" action="{{ route('tasks.destroy', ['id' => $task->id ] )}}" class="text-white bg-pink-500 border-0 py-2 px-8 focus:outline-none hover:bg-pink-600 rounded text-lg">
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
    function deletePost(e)
    {
        'use strict'
        if(confirm('本当に削除してもいいですか？'))
        {
            document.getElementById('delete_' + e.dataset.id).submit()
        }
    }
</script>        

</x-app-layout>