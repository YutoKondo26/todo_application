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
                    <div class="container px-5 py-14 mx-auto">
                      <div class="lg:w-2/3 w-full mx-auto flex flex-col text-center w-full mb-10">
                            <a href="{{route('todos.create')}}" class="flex w-fit text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">タスクを追加</a>


                            
                          </div>
                          <form action="{{ route('todos.massDelete') }}" method="post" id="deleteForm">
                            @csrf
                            @method('DELETE')
                            <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                              <table class="table-auto w-full text-left whitespace-no-wrap">
                                <thead>
                                  <tr>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
                                      <input type="checkbox" id="select-all">
                                    </th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">タスク名</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">タグ</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">期限</th>
                                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100"></th>
                                  </tr>
                                </thead>
                                
                                <tbody>
                                  @if($todos->isEmpty())
                                  <tr>
                                    <td colspan="5" class="py-6">タスクがすべて完了しました！</td>
                                  </tr>
                                  @else
                                @foreach($todos as $todo)
                                <tr>
                                  <td class="px-4 py-3">
                                    <input type="checkbox" class="check-item" id="check" name="ids[]" value="{{$todo->id}}">
                                  </td>
                                  <td class="px-4 py-3">{{ $todo->title }}</td>
                                  <td class="px-4 py-3">{{ $todo->tag }}</td>
                                  <td class="px-4 py-3">{{ $todo->deadline }}</td>
                                  <td class="px-4 py-3">
                                    <a href="{{route('todos.show', [ 'id' => $todo->id ])}}" class="flex w-fit text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">詳細</a>
                                  </td>
                                </tr>
                                
                                @endforeach
                                @endif
                              
                                </tbody>
                              </table>
                            </div>
                            <div class="mt-4 flex lg:w-2/3 w-full mx-auto">
                              <button type="submit" class="flex mr-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">タスク完了</button>
                              {{ $todos->links() }}
                            </div>
                          </form>
                        </div>
                      </section>
                    
                </div>
            </div>
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
      const selectAllCheckbox = document.getElementById('select-all');
      let isChecked = false;

      selectAllCheckbox.addEventListener('click', function () {
        isChecked = !isChecked;
        const checkboxes = document.querySelectorAll('input.check-item');
        checkboxes.forEach(function (checkbox) {
          checkbox.checked = isChecked;
        });
      });
    });
  </script>
</x-app-layout>
