<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ToDo一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                  <section class="text-gray-600 body-font">
                    <div class="container px-5 py-24 mx-auto">
                      <div class="lg:w-2/3 w-full mx-auto flex flex-col text-center w-full mb-20">
                            <a href="{{route('todos.create')}}" class="flex w-fit text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">タスクを追加</a>


                            
                          </div>
                          <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                            <table class="table-auto w-full text-left whitespace-no-wrap">
                              <thead>
                                <tr>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">ステータス</th>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">タスク名</th>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">タグ</th>
                                  <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">期限</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td class="px-4 py-3">Start</td>
                                  <td class="px-4 py-3">5 Mb/s</td>
                                  <td class="px-4 py-3">15 GB</td>
                                  <td class="px-4 py-3 text-lg text-gray-900">Free</td>
                           
                                </tr>
                       
                        
                  
                              </tbody>
                            </table>
                          </div>
                          <div class="flex pl-4 mt-4 lg:w-2/3 w-full mx-auto">
                            <a class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">Learn More
                              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                              </svg>
                            </a>
                            <button class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Button</button>
                          </div>
                        </div>
                      </section>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
