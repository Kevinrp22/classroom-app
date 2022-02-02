@props(["course"])
<div class="flex border-b border-gray-100 bg-white justify-center items-center text-xl gap-6 py-4 mb-2">
  <a href="{{route("courses.edit", $course)}}" class="hover:bg-gray-50">@lang("Settings")</a>
  <a href="{{route("courses.members",$course)}}" class="hover:bg-gray-50">@lang("Members")</a>
  <a href="{{route("homeworks.index", $course)}}" class="hover:bg-gray-50">@lang("Homeworks")</a>
</div>
