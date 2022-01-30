<x-app-layout>
  <div class="bg-[url('https://www.gstatic.com/classroom/themes/img_learnlanguage.jpg')] bg-cover min-h-max">
    <div class="p-3 rounded text-white py-6">
      <h1 class="mt-1 text-lg font-semibold">{{ $course->name }}</h1>
      <p class="text-sm">{{$course->description}}</p>
      <p class="text-xd"> Código de la clase: {{$course->code}}</p>
    </div>
  </div>
  <div>
    <div class="bg-white p-6">
      <p class="text-xl text-slate-500 font-semibold border-b border-indigo-400">Profesor</p>
      <div class="flex items-center gap-2 my-4">
        <div>
          <div class="bg-indigo-50 py-2 px-4 rounded-full">{{$course->teacher->name[0]}}</div>
        </div>
        <div>
          <div class="p-0 m-0">{{$course->teacher->name}}</div>
          <small>{{$course->teacher->email}}</small>
        </div>
      </div>
    </div>
    <div class="bg-white p-6">
      <p class="text-xl text-slate-500 font-semibold border-b border-indigo-400">Alumnos</p>
      @forelse($course->students as $student)
        <div class="flex items-center gap-2 my-4">
          <div>
            <div class="bg-indigo-50 py-2 px-4 rounded-full">{{$student->name[0]}}</div>
          </div>
          <div>
            <div class="p-0 m-0">{{$student->name}}</div>
            <small>{{$student->email}}</small>
            <form action="{{route("courses.deleteStudent", [$course,$student])}}" method="post">
              @csrf @method("delete")
              <button>Quitar</button>
            </form>
          </div>
        </div>
      @empty
        <div class="flex justify-center items-center flex-col py-6">
          <div class="max-w-[200px] h-100">
            <svg viewBox="0 0 221 161" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                 class="ueXqmb w-full">
              <path
                d="M3 156.083C12.0042 145.648 23.2805 127.051 23.2805 127.051C38.6802 134.12 57.1094 134.204 72.5091 127.303C64.8513 136.392 58.2034 149.94 52.0603 156.251C33.0421 163.404 17.8107 160.122 3 156.083Z"
                fill="#DADCDF"></path>
              <path
                d="M39.438 103.404C57.0256 102.478 74.5291 101.973 92.1168 101.637C109.62 101.3 127.208 101.216 144.711 101.132C154.641 101.048 164.571 101.048 174.501 100.963C175.679 100.963 175.763 99.0279 174.501 99.112C156.913 99.2803 139.326 99.3645 121.738 99.4486C104.235 99.617 86.6469 99.8694 69.1434 100.374C59.2136 100.711 49.2837 101.048 39.3538 101.552C38.1757 101.552 38.1757 103.488 39.438 103.404Z"
                fill="#606266"></path>
              <path
                d="M219.269 48.1162L175.511 100.29H120.812M218.849 58.6351L175.511 109.126L96.4082 108.284"
                stroke="#606266" stroke-width="2" stroke-linecap="round"></path>
              <path d="M87.7409 39.2803L37.25 94.8202L175.258 93.9787L219.859 40.9633L87.7409 39.2803Z"
                    fill="#DADCE0"></path>
              <path d="M158.849 67.0498L149.592 68.7328L42.7197 88.9292L59.55 68.7328L158.849 67.0498Z"
                    fill="#606266"></path>
              <path
                d="M79.7465 116.7L78.905 109.968H46.0859L38.933 107.864C38.344 103.572 37.8391 99.2804 37.25 95.0729L175.258 92.8008"
                fill="#606266"></path>
              <path d="M219.69 41.8047L218.849 67.4709L175.09 117.12L79.1572 115.858" stroke="#606266"
                    stroke-width="2" stroke-linecap="round"></path>
              <path d="M175.511 93.9785V116.699" stroke="#606266" stroke-width="2"
                    stroke-linecap="round"></path>
              <path
                d="M166.591 48.8738C168.779 47.6115 173.491 44.5821 173.239 42.0575C172.986 38.6915 161.794 36.3352 161.794 36.3352L159.438 24.8065C159.27 24.0491 158.176 23.8808 157.839 24.6382L154.136 33.3899C153.8 34.0631 152.79 34.0631 152.537 33.3058L149.676 25.4797C149.424 24.7223 148.33 24.7223 148.077 25.5638L146.058 32.6326C145.889 33.3058 144.964 33.4741 144.543 32.885C139.915 26.2371 119.887 -0.607258 100.784 1.07577C77.8951 3.09541 60.7282 20.5989 62.9161 46.181C63.8418 56.4474 67.4603 61.4965 72.0886 65.5358C72.6777 66.0407 72.3411 66.9664 71.5837 67.0505C66.4505 67.4713 58.8769 68.3128 58.8769 68.3128C49.6202 69.3226 40.2794 71.2581 32.4533 76.3072C27.7408 79.3366 23.4491 83.2917 20.9246 88.3408C18.4 93.3899 17.811 99.533 20.2513 104.666C23.954 112.324 33.1265 115.438 41.4575 116.868C52.9863 118.804 64.8516 118.972 76.4645 117.289C78.4841 117.036 79.9989 115.269 79.9989 113.334C79.8306 107.78 65.9456 110.641 57.4463 110.978C36.5767 111.735 28.6665 103.656 27.9933 98.6073C27.2359 92.6326 35.3986 83.965 40.7843 81.0197C46.0858 78.0743 58.961 76.0547 65.0199 75.5498L87.9091 73.2777L158.765 67.0505C161.121 66.8822 163.056 65.0309 163.309 62.6746L163.645 59.9818C163.73 59.4769 164.234 59.1403 164.655 59.3086C166.002 59.6452 168.526 59.8135 170.378 57.6256C172.397 55.1852 168.526 51.8191 166.507 50.3885C166.002 49.8836 166.086 49.1263 166.591 48.8738Z"
                fill="white" stroke="#606266" stroke-width="2" stroke-miterlimit="10"></path>
              <path
                d="M152.285 44.1613C153.884 44.1613 153.884 41.6367 152.285 41.6367C150.686 41.6367 150.686 44.1613 152.285 44.1613Z"
                fill="#606266"></path>
              <path
                d="M158.259 43.4034C159.858 43.4034 159.858 40.8789 158.259 40.8789C156.576 40.8789 156.576 43.4034 158.259 43.4034Z"
                fill="#606266"></path>
              <path
                d="M139.746 41.3838C136.801 42.3656 131.079 44.9182 131.752 47.2744C132.425 49.6306 138.764 49.3782 141.85 48.9574C139.325 50.6404 134.445 54.5956 135.118 56.9518C135.791 59.308 140.447 58.4946 142.692 57.7933"
                stroke="#606266" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
              <path d="M155.375 48.125C156.286 48.125 157.104 48 158 48" stroke="#5F6368" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round"></path>
              <path d="M156.625 52C157.215 52.8089 158.25 53.375 158.25 53.375" stroke="#5F6368"
                    stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round"></path>
              <path d="M156.425 48.25C156.425 49.1936 156.8 52 156.8 52" stroke="#5F6368" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round"></path>
              <path d="M156.75 52C155.909 52.2003 155 53.25 155 53.25" stroke="#5F6368" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round"></path>
              <path
                d="M130.827 135.803L84.291 143.208C84.3752 143.292 91.1914 146.069 91.1914 146.069L87.9937 149.688L92.033 151.371L86.6473 157.766L133.183 150.445C135.034 145.48 134.193 139.926 130.827 135.803Z"
                fill="#1E8E3E" class="VnOHwf-Wvd9Cc"></path>
              <path
                d="M111.767 148.802C119.342 147.606 125.277 145.334 125.023 143.727C124.77 142.121 118.423 141.787 110.848 142.983C103.273 144.178 97.3384 146.45 97.592 148.057C97.8456 149.664 104.192 149.997 111.767 148.802Z"
                fill="#CEEAD6" class="VnOHwf-Ysl7Fe"></path>
              <path
                d="M79.5782 147.668C82.1027 149.183 82.6076 152.633 80.6721 154.821L73.351 153.306C72.5936 153.138 72.4253 152.212 73.0985 151.791L79.5782 147.668Z"
                fill="#606266"></path>
              <path d="M85.0478 143.629L73.2666 152.465L87.5723 157.093" stroke="#606266" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round"></path>
              <path
                d="M113.238 154.148V154.148C125.823 150.791 138.935 148.811 151.948 148.257V148.257M134.276 136.896C135.118 137.878 136.885 140.347 137.221 142.366C137.558 144.386 137.081 146.854 136.801 148.257M135.538 138.159L141.679 137.574C143.21 137.428 144.604 138.464 144.905 139.972L145.408 142.488C145.756 144.226 144.529 145.885 142.765 146.062L137.642 146.574"
                stroke="#606266" stroke-width="2" stroke-linecap="round"></path>
              <path d="M22.5 74C25.2227 56.1515 24 18 24 18" stroke="#CEEAD6" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" class="VnOHwf-Ysl7Fe"></path>
              <path
                d="M17.2703 41.6331C23.0524 44.8387 24.9999 58.0001 24.9999 58.0001C24.9999 58.0001 16.471 55.1873 13.2271 50.9122C9.49994 46.0002 11.9459 38.6813 17.2703 41.6331Z"
                fill="#CEEAD6" class="VnOHwf-Ysl7Fe"></path>
              <path
                d="M17.2703 21.68C23.0524 24.8855 24.9999 38.047 24.9999 38.047C24.9999 38.047 16.471 35.2342 13.2271 30.9591C9.49994 26.0471 11.9459 18.7282 17.2703 21.68Z"
                fill="#CEEAD6" class="VnOHwf-Ysl7Fe"></path>
              <path
                d="M30.7297 41.68C24.9476 44.8855 23.0001 58.047 23.0001 58.047C23.0001 58.047 31.529 55.2342 34.7729 50.9591C38.5001 46.0471 36.0541 38.7282 30.7297 41.68Z"
                fill="#CEEAD6" class="VnOHwf-Ysl7Fe"></path>
              <path
                d="M30.7297 21.7269C24.9476 24.9324 23.0001 38.0938 23.0001 38.0938C23.0001 38.0938 31.529 35.281 34.7729 31.0059C38.5001 26.094 36.0541 18.7751 30.7297 21.7269Z"
                fill="#CEEAD6" class="VnOHwf-Ysl7Fe"></path>
              <path d="M22 73.5C14.9633 73.6303 8.01809 73.5 1 73.5" stroke="#DADCDF" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
          </div>
          <p>No hay alumnos inscritos</p>
        </div>
      @endforelse
    </div>
  </div>
</x-app-layout>
