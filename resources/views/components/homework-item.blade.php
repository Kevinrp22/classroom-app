@props(["course", "homework"])
<div class="bg-white flex justify-between overflow-hidden shadow-sm sm:rounded-lg p-6 border border-gray-100">
  <div class="flex items-center">
    <x-homework-icon/>
    <div class="pl-4">
      <a href="{{ route('homeworks.show', [$course, $homework]) }}" class="hover:underline">
        <strong>{{$homework->course->teacher->name}}</strong> @lang("has posted a new task"):
        <strong>{{ $homework->title }}</strong>
      </a>
      <p>{{strftime('%d/%m', strtotime($homework->created_at))}}</p>
    </div>
  </div>
  <form action="{{route("homeworks.destroy", [$course, $homework])}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="text-red-500 hover:text-red-700"><i class="far fa-trash-alt text-xl"></i></button>
  </form>
</div>
