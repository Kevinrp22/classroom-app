<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-xl">@lang("Create class")</h1>
                @if($errors->any())
                    <ul class="text-red-600 bg-gray-100 rounded p-3 max-w-xs text-sm">
                        @foreach($errors->all() as $error)
                            <li>- {{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <form method="POST" action="{{ route('courses.store') }}" class="py-6" role="form">
                    @CSRF
                    <div class="form-group">
                        <label for="name">@lang("Class name")</label>
                        <input type="text" class="rounded" name="name">
                    </div>
                    <div class="form-group">
                        <label for="description">@lang("Description")</label>
                        <input type="text" class="rounded" name="description" value="Esto es una descripción">
                    </div>
                    <div class="form-group">
                        <label for="subject">@lang("Subject")</label>
                        <input type="text" class="rounded" name="subject" value="Inglés">
                    </div>
                    <input type="submit" class="bg-gray-800 text-white rounded p-2" value="@lang("Create")">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
