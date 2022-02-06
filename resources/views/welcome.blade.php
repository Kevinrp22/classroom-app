<x-guest-layout>
  <div class="m-auto max-w-2xl">
    <div class="flex flex-col justify-center items-center text-center min-h-screen gap-3">
      <img src="https://edu.google.com/assets/icons/google-brands/classroom.svg" class="w-[10rem]" alt="">
      <h1 class="text-2xl font-bold">@lang("A centralized solution for teaching and learning")</h1>
      <p>@lang("Google Classroom unifies all the teaching and learning resources you need. This secure and easy-to-use tool helps educators manage, evaluate, and improve the learning experience.")</p>
      <button class="p-4 bg-indigo-700 mt-4 text-white"><a href="{{ route('login') }}">@lang("Start")</a></button>
    </div>
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
      @auth
        <a href="{{ url('/courses') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
      @else
        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">@lang("Log in")</a>

        @if (Route::has('register'))
          <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">@lang("Register")</a>
        @endif
      @endauth
    </div>
  </div>
</x-guest-layout>
