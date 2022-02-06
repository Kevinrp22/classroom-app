<x-app-layout>
  <div class="px-4">
    <p class="text-xl text-indigo-700">@lang("Homework")</p>
    @if($errors->any())
      @foreach($errors->all() as $error)
        <div class="border-l-4 border-red-500 text-red-600" role="alert">
          <p>{{ $error }}</p>
        </div>
      @endforeach
    @endif
    <form action="{{route("homeworks.store", $course)}}" method="POST">
      @csrf
      <div class="flex flex-col">
        <label for="title">@lang("Title")</label>
        <input type="text" class="rounded" name="title" id="title" value="{{old("title")}}" required>
      </div>
      <div class="flex flex-col">
        <label for="description">@lang("Description")</label>
        <textarea class="rounded" name="description" id="description" required>{{old("description")}}</textarea>
      </div>
      <div class="flex flex-col">
        <label for="points">@lang("Points")</label>
        <input type="number" max="100" min="0" class="rounded" name="points" id="points" value="{{old("points")}}" required>
      </div>
      <div class="flex flex-col">
        <label for="type">@lang("Type")</label>
        <select class="rounded" id="type" name="type" required>
          <option value="">@lang("Select a type")</option>
          <option value="individual" {{old("type") == "individual" ? "selected": ""}}>@lang("Single")</option>
          <option value="grupal" {{old("type") == "grupal" ? "selected": ""}}>@lang("In a group")</option>
        </select>
      </div>
      <div class="flex flex-col">
        <p>@lang("Priority")</p>
        <label>
          <input type="radio" name="priority" id="baja" value="baja" {{old("priority") == "baja" ? "checked": ""}}/>
          @lang("Low")
        </label>
        <label for="normal">
          <input type="radio" name="priority" id="normal" value="normal" {{old("priority") == "normal" ? "checked": ""}}/>
          @lang("Normal")
        </label>
        <label for="alta">
          <input type="radio" name="priority" id="alta" value="alta" {{old("priority") == "alta" ? "checked": ""}}/>
          @lang("High")
        </label>

      </div>
      <div class="flex flex-col">
        <label>
          @lang("Due date")
          <input type="date" class="rounded" name="due_date" value="{{old("due_date")}}" required>
        </label>
      </div>
      <div class="flex flex-col">
        <label>
          <input type="checkbox" class="rounded" name="evaluable" value="1" {{old("evaluable") == "1" ? "checked": ""}}>
          @lang("Evaluable")
        </label>
      </div>
      <input type="submit" class="bg-gray-800 text-white rounded p-2 mt-2" value="Crear"/>

    </form>
  </div>
</x-app-layout>
