
<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Nombre') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div>
                <x-label for="lastname" value="{{ __('Apellido') }}" />
                <x-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')" required autofocus autocomplete="lastname" />
            </div>
            
            <div>
                <x-label for="cedula" value="{{ __('Cedula') }}" />
                <x-input id="cedula" class="block mt-1 w-full" type="number" name="cedula" :value="old('cedula')" required autofocus autocomplete="cedula" />
            </div>
           
            <div>
            <x-label for="rol" value="{{ __('Rol') }}" />
            <select class="block mt-1 w-full" type="number" name="rol">
                
                <option>------Seleccionar------</option>
                <option value="1">Administrador</option>
                <option value="2">Desarrollo</option>
                <option value="3">Consulta y actualizacion</option>
                
              
            </select>
            </div>

           <div>
            <x-label for="tipo_de_recurso" value="{{ __('Tipo de recursos') }}" />
            <select  class="block mt-1 w-full" type="text" name="tipo_de_recurso">
                
                <option>------Seleccionar------</option>
            
                <option value="EXTERNO" >EXTERNO</option>
                <option value="INTERNO">INTERNO</option>
            
            </select>    
            </div>

        <div class="col-md-6">
        <x-label for="gerencia" value="{{ __('Gerencia') }}" />
        <select name="gerencia" id="gerencia" class="block mt-1 w-full">
            
            <option>------Seleccionar------</option>
           
             <option value="Gerencia de Configuracion e Integracion" >Gerencia de Configuracion e Integracion</option>
             <option value="Gerencia de Procesos y Productos">Gerencia de Procesos y Productos</option>
             <option value="Gerencia de Pruebas Integrales y Certificacion">Gerencia de Pruebas Integrales y Certificacion</option>
             <option value="Gerencia Desarrollo de Sistemas Soporte Operacion">Gerencia Desarrollo de Sistemas Soporte Operacion</option>
             <option value="Gerencia Desarrollo e Implementacion Sistemas Backend">Gerencia Desarrollo e Implementacion Sistemas Backend</option>
             <option value="Gerencia Desarrollo e Implementacion Sistemas Cliente Final">Gerencia Desarrollo e Implementacion Sistemas Cliente Final</option>
             <option value="Gerencia Desarrollo e implementacion Sistemas Empresariales">Gerencia Desarrollo e implementacion Sistemas Empresariales</option>
             <option value="Gerencia Desarrollo e Implementacion Sistemas Front-End">Gerencia Desarrollo e Implementacion Sistemas Front-End</option>
             <option value="Gerencias Desarrollo e Implementacion Sistemas Informacion">Gerencias Desarrollo e Implementacion Sistemas Informacion</option>
             <option value="Gerencia Soporte Tecnico Aplicaciones">Gerencia Soporte Tecnico Aplicaciones</option>
        </select>    
       </div> 

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Contraseña') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('¿Ya registrado?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
