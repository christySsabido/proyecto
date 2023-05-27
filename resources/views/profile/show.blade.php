<x-app-layout>
    <!--- Seccion 1 --->
   <div>
   <div>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 gap-1">
            <div>
                <h1 class="text-center font-bold">Información del perfil</h1>
                <br>
                @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                    @livewire('profile.update-profile-information-form')
                @endif
                <br>
                <h1 class="text-center">Cambiar contraseña</h1>
                <br>
                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                    <div class="mt-10 sm:mt-0">
                        @livewire('profile.update-password-form')
                    </div>
                @endif
            </div>

            <div class="grid grid-cols-2 justify-end">
                <div></div>
            </div>

            <div class="grid grid-cols-2 justify-end">
                <div>
                    @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                        <div class="mt-10 sm:mt-0">
                            @livewire('profile.delete-user-form')
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


</x-app-layout>
