<x-app-layout>
  <x-slot name="subNav">
    <x-sub-navigation :course="$course"/>
  </x-slot>
  <div class="m-auto max-w-2xl">
    <p class="text-xl text-indigo-700">@lang("Class details")</p>
    @if($errors->any())
      @foreach($errors->all() as $error)
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
          <p>{{ $error }}</p>
        </div>
      @endforeach
    @endif
    <form action="{{route("courses.update", $course)}}" method="POST">
      @csrf
      @method("PUT")
      <div class="flex flex-col">
        <label for="name">@lang("Class name")</label>
        <input type="text" class="rounded" name="name" value="{{old("name", $course->name)}}">
      </div>
      <div class="flex flex-col">
        <label for="description">@lang("Description")</label>
        <input type="text" class="rounded" name="description" value="{{old("description", $course->description)}}">
      </div>
      <div class="flex flex-col">
        <label for="subject">@lang("Subject")</label>
        <input type="text" class="rounded" name="subject" value="{{old("subject",$course->subject)}}">
      </div>

      <button type="submit" class="bg-gray-800 w-full text-white mt-2 rounded p-2 hover:bg-gray-700">@lang("Update")</button>

    </form>
    <form method="post" action="{{route("courses.destroy", $course)}}"
          onsubmit="return confirm('¿Estas seguro de querer eliminar el curso?')">
      @csrf @method("delete")
      <button type="submit"
              class=" w-full bg-red-500 text-white text-md p-2 px-3 rounded-md hover:bg-red-700">@lang("Delete class")</button>
    </form>
  </div>
</x-app-layout>
