<body class="bg-gradient-to-r from-blue-400 from-20% via-pink-300 via-50% to-violet-500 to-80%">
    
        <div>
        <livewire:navegacion />

        @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-center text-gray-700"><livewire:boton-iniciar/></a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline"><livewire:boton-registrar></a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>


        <div class="flex">
  <div class="w-1/2">
      <livewire:imagen />
  </div>

  <div class="w-1/2 text-justify">

    <h1 class="absolute top-40 text-6xl right-36">"WALL-FELLING"</h1>

    <p class="absolute top-72 mr-5 ml-5"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean vestibulum velit et ex facilisis pretium. Sed sed dolor lacus. Praesent eleifend eleifend aliquam. Donec euismod aliquet viverra. Phasellus laoreet ornare venenatis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec venenatis lorem ipsum, eu iaculis libero maximus quis. Ut fringilla lectus metus, ac interdum enim dictum a. Sed consectetur lorem enim, eu mollis leo tempor in. Aenean ut ipsum leo. Aenean id massa eu nulla bibendum tempus. Curabitur non leo neque. Etiam interdum justo sit amet porttitor rutrum. Sed id condimentum felis. Vivamus porta non. </p>

      <p class="text-3xl absolute bottom-72 mr-16 ml-16 text-center"> ¿Quieres comenzar a contarnos como te sientes? </p>

      <livewire:boton-entrar />

      

  </div>
</div>

</body>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet">

