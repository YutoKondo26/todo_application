<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ToDo新規追加
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <section class="text-gray-600 body-font relative">
                        <div class="container px-5 py-24 mx-auto">
                          <div class="lg:w-1/2 md:w-2/3 mx-auto flex flex-col text-center w-full mb-12">

                            
                          </div>
                            <form method="post" action="{{route('todos.store')}}">
                            @csrf
                  
                              <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                <div class="-m-2">
                                  <div class="p-2 w-full">
                                    <div class="relative">
                                      <label for="title" class="leading-7 text-sm text-gray-600">タスク名</label>
                                      <input type="text" id="title" name="title" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-full">
                                    <div class="relative">
                                      <label for="description" class="leading-7 text-sm text-gray-600">詳細</label>
                                      <textarea id="description" name="description" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                                    </div>
                                  </div>
                                  <div class="p-2 w-full">
                                    <div class="relative">
                                      <label for="deadline" class="leading-7 text-sm text-gray-600">締切</label>
                                      <input type="date" id="deadline" name="deadline" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-full">
                                    <div class="relative">
                                      <label for="tag" class="leading-7 text-sm text-gray-600">タグ</label>
                                      <input type="text" id="tag" name="tag" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                  </div>
                                  <div class="p-2 w-full">
                                    <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">新規登録</button>
                                  </div>
                                </div>
                              </div>
                          </form>
                        </div>
                      </section>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
