<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      詳細画面
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">

          <section class="text-gray-600 body-font relative">
            <div class="container px-5 py-24 mx-auto">
              <div class="flex flex-col text-center w-full mb-12">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">
                  <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">詳細画面</font>
                  </font>
                </h1>

                <!-- 各参照項目をDBから受け取り表示 -->
                <div class="lg:w-1/2 md:w-2/3 mx-auto">
                  <div class="flex flex-wrap">
                    <div class="p-2 w-full">
                      <div class="relative">
                        <label for="title" class="leading-7 text-sm text-gray-600">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">作成日</font>
                          </font>
                        </label>
                        <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          {{ $task->created_at }}
                        </div>
                      </div>
                    </div>

                    <div class="p-2 w-full">
                      <div class="relative">
                        <label for="title" class="leading-7 text-sm text-gray-600">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">更新日</font>
                          </font>
                        </label>
                        <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          {{ $task->updated_at }}
                        </div>
                      </div>
                    </div>

                    <div class="p-2 w-full">
                      <div class="relative">
                        <label for="title" class="leading-7 text-sm text-gray-600">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">タスク名</font>
                          </font>
                        </label>
                        <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                          {{ $task->title }}
                        </div>
                      </div>
                    </div>

                    <div class="p-2 w-full">
                      <div class="relative">
                        <label for="description" class="leading-7 text-sm text-gray-600">
                          <font style="vertical-align: inherit;">
                            <font style="vertical-align: inherit;">タスク説明</font>
                          </font>
                        </label>
                        <textarea id="description" name="description" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out" disabled>{{ $task->description }}</textarea>
                      </div>
                    </div>
                  </div>

          </section>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>