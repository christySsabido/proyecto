<div class="w-40 h-8 rounded-full bg-gradient-to-r from-pink-400 to-pink-400 hover:from-purple-400 hover:to-yellow-300 text-white flex items-center justify-center absolute top-0 right-2" href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard') ml-2">

<a href="{{ route('profile.show') }}" class="w-12 h-12 rounded-full bg-gradient-to-r from-purple-400 to-purple-400 hover:from-purple-400 hover:to-yellow-300 text-white flex items-center justify-center mr-2  absolute right-32"> 
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="black" class="w-8 h-8">
  <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
</svg>
</a>
<p class="botoom-4">  {{ Auth::user()->name }} </p>
</div>