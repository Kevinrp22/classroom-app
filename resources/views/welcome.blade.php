<x-guest-layout>
  <div class="m-auto max-w-2xl">
    <div class="flex flex-col justify-center items-center text-center min-h-screen gap-3">
      <img src="https://edu.google.com/assets/icons/google-brands/classroom.svg" class="w-[10rem]" alt="">
      <h1 class="text-2xl font-bold">Una solución centralizada para la enseñanza y el aprendizaje</h1>
      <p>Google Classroom unifica todos los recursos de enseñanza y aprendizaje que necesitas. Esta herramienta segura y
        fácil de usar ayuda a los educadores a gestionar, evaluar y mejorar la experiencia didáctica.</p>
      <button class="p-4 bg-indigo-700 mt-4 text-white"><a href="{{ route('login') }}">Empezar</a></button>
    </div>
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
      @auth
        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
      @else
        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

        @if (Route::has('register'))
          <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
        @endif
      @endauth
    </div>
  </div>
</x-guest-layout>
