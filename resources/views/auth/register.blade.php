<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="user_type" value="{{ __('User Type') }}" />
                <select id="user_type" class="bg-gray-800 text-white block mt-1 w-full rounded p-2" name="user_type" required>
                    <option value="vendedor">Vendedor</option>
                    <option value="comprador" selected>Comprador</option>
                </select>
            </div>

            <!-- Campos vendedor o comprador -->


            <!-- Campos para Vendedor -->
            <div id="vendedor_fields" style="display: none;">
                <div class="mt-4">
                    <x-label for="user_nameV" value="{{ __('User Name') }}" />
                    <x-input id="user_nameV" class="block mt-1 w-full" type="text" name="user_nameV" :value="old('user_nameV')" require/>
                </div>
                <!-- Aquí puedes agregar los demás campos para el vendedor -->
                <div class="mt-4">
                    <x-label for="brand_name" value="{{ __('Brand Name') }}" />
                    <x-input id="brand_name" class="block mt-1 w-full" type="text" name="brand_name" :value="old('brand_name')" require/>
                </div>
            </div>

            <!-- Campos para Comprador -->
            <div id="comprador_fields" style="display: block;">
                <!-- Aquí puedes agregar los campos para el comprador -->
                <div class="mt-4">
                    <x-label for="user_name" value="{{ __('User Name') }} "  />
                    <x-input id="user_name" class="block mt-1 w-full" type="text" name="user_name" :value="old('user_name')" require />
                </div>
            </div>

            <script>
                function showFields() {
                    var userType = document.getElementById("user_type").value;
                    if (userType == "vendedor") {
                        document.getElementById("vendedor_fields").style.display = "block";
                        document.getElementById("comprador_fields").style.display = "none";
                    } else if (userType == "comprador") {
                        document.getElementById("vendedor_fields").style.display = "none";
                        document.getElementById("comprador_fields").style.display = "block";
                    }
                }
                document.getElementById("user_type").addEventListener("change", showFields);
            </script>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
