<x-app-layout>
  <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
    <div class="flex justify-between items-center">
      <div class="flex-1">
        <div class="flex justify-between">
          <div>
            <span class="text-xl font-semibold">{{ $homework->title }}</span>
            <span class="text-xs">Fecha de entrega: {{strftime('%d/%m', strtotime($homework->due_date))}}</span>
            <p class="text-sm">{{$homework->course->teacher->name}}
              · {{strftime('%d/%m', strtotime($homework->created_at))}}
            </p>
          </div>

          <a href="{{ route('homeworks.edit', [$course, $homework]) }}" class="font-bold py-2 px-4 rounded">
            @lang("Update")
          </a>
        </div>
        <p class="text-gray-600 py-6">
          {{ $homework->description }}
        </p>
      </div>
    </div>
  </div>
</x-app-layout>
