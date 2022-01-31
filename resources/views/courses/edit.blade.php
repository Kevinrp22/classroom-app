<x-app-layout>
  <div>
    <p class="text-xl text-indigo-700">Detalles de la clase</p>
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
        <label for="name">Nombre de la clase</label>
        <input type="text" class="rounded" name="name" value="{{old("name", $course->name)}}">
      </div>
      <div class="flex flex-col">
        <label for="description">Descripción</label>
        <input type="text" class="rounded" name="description" value="{{old("description", $course->description)}}">
      </div>
      <div class="flex flex-col">
        <label for="subject">Materia</label>
        <input type="text" class="rounded" name="subject" value="{{old("subject",$course->subject)}}">
      </div>

      <input type="submit" class="bg-gray-800 text-white rounded p-2 mt-2" value="Actualizar" />

    </form>
  </div>
</x-app-layout>