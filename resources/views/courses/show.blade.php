<x-app-layout>
  <x-slot name="subNav">
    <x-sub-navigation :course="$course"/>
  </x-slot>
  <div
    class="bg-[url('https://www.gstatic.com/classroom/themes/img_learnlanguage.jpg')] bg-cover min-h-max flex justify-between">
    <div class="p-3 rounded text-white py-6">
      <h1 class="mt-1 text-lg font-semibold">{{ $course->name }}</h1>
      <p class="text-sm">{{$course->description}}</p>
      <p class="text-xd"> @lang("Class code") {{$course->code}}</p>
    </div>
    @if(!($course->teacher_id == Auth::user()->id))
      <form action="{{route("courses.leave", $course)}}" method="post">
        @csrf @method("delete")
        <button type="submit"
                class="bg-red-500 text-white text-sm px-3 py-1 rounded-md mr-3 mt-3 hover:bg-red-700">@lang("Leave class")</button>
      </form>
    @endif
  </div>
  <div class="my-5">
    @forelse($course->homeworks as $homework)
      <x-homework-item :homework="$homework" :course="$course"/>
    @empty
      <div class="p-3 rounded text-center py-6">
        <p class="text-sm">@lang("No homework yet")</p>
      </div>
    @endforelse
  </div>
</x-app-layout>
