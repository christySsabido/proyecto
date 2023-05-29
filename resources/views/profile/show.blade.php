<x-app-layout>
    <!--- Seccion 1 --->
    <div>
        <div class=" ml-2 max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <h1 class="text-center">informacion del perfil</h1>
                    <br>
                    @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                        @livewire('profile.update-profile-information-form')
                        <br>
                        <h1 class="text-center">Cambiar contraseña</h1>
                        <br>
                         @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                        <div class="mt-10 sm:mt-0">
                            @livewire('profile.update-password-form')
                        </div>
                    @endif     
                    </div>
                    @endif
                    <div class="ml-32 grid grid-cols-2 gap-4">
                    <livewire:notas-personales />
                    </div>
                </div>


                <div class="grid grid-cols-2 gap-4">
                    @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                        <div class="mt-10 sm:mt-0">
                            @livewire('profile.delete-user-form')
                        </div>
                    @endif
                </div>
            </div>
        </div>

</x-app-layout>
