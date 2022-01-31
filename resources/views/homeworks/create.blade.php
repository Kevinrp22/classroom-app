<x-app-layout>
  <div class="px-4">
    <p class="text-xl text-indigo-700">Detalles de la clase</p>
    @if($errors->any())
      @foreach($errors->all() as $error)
        <div class="bg-gray-500 border-l-4 border-red-500 text-red-600" role="alert">
          <p>{{ $error }}</p>
        </div>
      @endforeach
    @endif
    <form action="{{route("homeworks.store", $course)}}" method="POST">
      @csrf
      <div class="flex flex-col">
        <label for="title">Título</label>
        <input type="text" class="rounded" name="title" id="title" value="{{old("title")}}">
      </div>
      <div class="flex flex-col">
        <label for="description">Descripción</label>
        <textarea class="rounded" name="description" id="description">{{old("description")}}</textarea>
      </div>
      <div class="flex flex-col">
        <label for="points">Puntos</label>
        <input type="number" max="100" min="0" class="rounded" name="points" id="points" value="{{old("points")}}">
      </div>
      <div class="flex flex-col">
        <label for="type">Tipo</label>
        <select class="rounded" id="type" name="type">
          <option value="">Seleccione un tipo</option>
          <option value="individual" {{old("type") == "individual" ? "selected": ""}}>Individual</option>
          <option value="grupal" {{old("type") == "grupal" ? "selected": ""}}>En grupo</option>
        </select>
      </div>
      <div class="flex flex-col">
        <p>Prioridad</p>
        <label>
          <input type="radio" name="priority" id="baja" value="baja" {{old("priority") == "baja" ? "checked": ""}}/>
          Baja
        </label>
        <label for="normal">
          <input type="radio" name="priority" id="normal" value="normal" {{old("priority") == "normal" ? "checked": ""}}/>
          Media
        </label>
        <label for="alta">
          <input type="radio" name="priority" id="alta" value="alta" {{old("priority") == "alta" ? "checked": ""}}/>
          Alta
        </label>

      </div>
      <div class="flex flex-col">
        <label>
          Fecha de entrega
          <input type="date" class="rounded" name="due_date" value="{{old("due_date")}}">
        </label>
      </div>
      <div class="flex flex-col">
        <label>
          <input type="checkbox" class="rounded" name="evaluable" value="1" {{old("evaluable") == "1" ? "checked": ""}}>
          Evaluable
        </label>
      </div>
      <input type="submit" class="bg-gray-800 text-white rounded p-2 mt-2" value="Crear"/>

    </form>
  </div>
</x-app-layout>
