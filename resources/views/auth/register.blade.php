<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <img src="{{asset('img/images/logo.png')}}" width="200px" alt="">
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Nome') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="admin" value="{{ __('Admin') }}" />
                <x-jet-input id="admin" class="block mt-1 w-full" type="hidden" name="admin" value="2" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="cidade" value="{{ __('Cidade') }}" />
                <select name="cidade" class="block mt-1 w-full" id="cidade" :value="old('cidade')" required>
                    <option value="Araruama">Araruama</option>
                    <option value="Arraial do Cabo">Arraial do Cabo</option>
                    <option value="Búzios">Búzios</option>
                    <option value="Cabo Frio">Cabo Frio</option>
                    <option value="Iguaba Grande">Iguaba Grande</option>
                    <option value="São Pedro da Aldeia">São Pedro da Aldeia</option>
                    <option value="Saquarema">Saquarema</option>
                </select>
            </div>

            <div class="mt-4">
                <x-jet-label for="telefone" value="{{ __('Telefone') }}" />
                <x-jet-input id="telefone" class="block mt-1 w-full" type="text" maxlength="11" name="telefone" :value="old('cidade')" required/>
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Senha') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirmar Senha') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Já tem cadastro?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Cadastrar') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
