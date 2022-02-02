<x-app-layout>
  <div class="flex border-b border-gray-100 bg-white justify-center items-center text-xl gap-6 py-4 mb-2">
    <a href="{{route("courses.edit", $course)}}" class="hover:bg-gray-50">@lang("Settings")</a>
    <a href="{{route("courses.members",$course)}}" class="hover:bg-gray-50">@lang("Members")</a>
    <a href="{{route("homeworks.index", $course)}}" class="hover:bg-gray-50">@lang("Homeworks")</a>
  </div>
  <div class="bg-[url('https://www.gstatic.com/classroom/themes/img_learnlanguage.jpg')] bg-cover min-h-max">
    <div class="p-3 rounded text-white py-6">
      <h1 class="mt-1 text-lg font-semibold">{{ $course->name }}</h1>

      <p class="text-sm">{{$course->description}}</p>
      <p class="text-xd"> @lang("Class code") {{$course->code}}</p>
    </div>
  </div>
  <div class="my-5">
    @foreach($course->homeworks as $homework)
      <x-homework-item :homework="$homework" :course="$course"/>
    @endforeach
  </div>
</x-app-layout>
