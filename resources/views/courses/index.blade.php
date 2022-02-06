<x-app-layout>
  <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
    @forelse($courses as $course)
      <div class="border-2 border-gray-100 rounded-md mb-3 overflow-hidden">
        <div class="bg-[url('https://www.gstatic.com/classroom/themes/img_learnlanguage.jpg')] bg-cover p-2 text-white">
          <div class="flex justify-between">
            <a class="hover:underline " href="{{route("courses.show", $course)}}">
              <h1 class="flex-auto text-lg font-semibold">
                {{$course->name}}
              </h1>
              <p class="text-sm">{{$course->description}}</p>
            </a>

            @can("delete", $course)
              <form method="post" action="{{route("courses.destroy", $course)}}" onsubmit="return confirm('¿Estas seguro de querer eliminar el curso?')">
                @csrf @method("delete")
                <button type="submit" class="text-red-500 hover:text-red-700 pt-3 pr-3"><i class="far fa-trash-alt text-xl"></i></button>
              </form>
            @endcan
          </div>
          <div class="text-sm">
            <p>{{$course->teacher->name}}</p>
          </div>
        </div>
        <div class="min-h-[100px] flex justify-end px-1">
          <div
            class="bg-indigo-50 py-4 px-6 rounded-full w-min h-min relative -top-8">{{$course->teacher->name[0]}}</div>
        </div>
      </div>
    @empty
      <div class="flex flex-col justify-center items-center">
        <img src="https://www.gstatic.com/classroom/empty_states_home.svg" alt="">
        <p>@lang("Add a class to get started")</p>
        <div class="mt-2">
          <a href="{{route('courses.create')}}"
             class="btn btn-primary bg-indigo-50 p-2 rounded">@lang("Create class")</a>
          <a href="{{url("/join-class")}}" class="btn btn-primary bg-indigo-50 p-2 rounded">@lang("Join class")</a>
        </div>
      </div>
    @endforelse
  </div>
</x-app-layout>
