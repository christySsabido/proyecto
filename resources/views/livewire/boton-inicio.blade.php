 <a href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')" class="w-24 h-8 rounded-full bg-gradient-to-r from-pink-400 to-pink-400 hover:from-purple-400 hover:to-yellow-300 text-white flex items-center justify-center absolute top-4 left-56">
    <div class="w-12 h-12 rounded-full bg-gradient-to-r from-purple-400 to-purple-400 hover:from-purple-400 hover:to-yellow-300 text-white flex items-center justify-center mr-2"> 
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="black" class="w-8 h-8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
        </svg>
    </div>
    <p class="mr-2">Inicio</p>
</a>
