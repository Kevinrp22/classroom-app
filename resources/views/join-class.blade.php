<x-app-layout>
 {{-- {{dd($errors->all())}}--}}
  <div class="flex flex-col gap-4 rounded">
    <div class="bg-white p-6">
      <p>@lang("You are logged in as")</p>
      <p>{{ Auth::user()->name }}</p>
      <p>{{ Auth::user()->email }}</p>
    </div>
    <div class="bg-white p-6 rounded">
      <form action="/join-class" method="POST" class="flex flex-col">
        @csrf
        <label for="class_id">
          @lang("Class code")
        </label>
        <small>@lang("Ask your teacher for the class code and enter it here.")</small>
        <input class="form-control"
               type="text"
               name="code"
               placeholder="@lang("Class code")"
               required
               value="{{old('code')}}">
        {{-- @if($errors->all())
           {{dd($errors)}}
         @endif--}}
        @error("code")
        <div class="text-red-500">
          {{ $message }}
        </div>
        @enderror
        <button class=" btn bg-indigo-50 mt-4 w-max p-2 rounded" type="submit">
          @lang("Join class")
        </button>
      </form>
    </div>
  </div>
</x-app-layout>
