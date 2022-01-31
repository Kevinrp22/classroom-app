<x-app-layout>
  <div class="flex flex-col gap-4 rounded">
    <div class="bg-white p-6">
      <p>Has iniciado sesión como </p>
      <p>{{ Auth::user()->name }}</p>
      <p>{{ Auth::user()->email }}</p>
    </div>
    <div class="bg-white p-6 rounded">
      <form action="/join-class" method="POST" class="flex flex-col">
        @csrf
        <label for="class_id">
          Código de clase
        </label>
        <small>Pídele a tu profesor el código de clase e introdúcelo aquí.</small>
        <input class="form-control"
               type="text"
               name="code"
               placeholder="Código de clase"
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
          Unirse a clase
        </button>
      </form>


    </div>
</x-app-layout>
