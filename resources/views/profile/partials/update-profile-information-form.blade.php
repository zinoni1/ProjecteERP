<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-800">
            {{ __('perfil.profile_information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-800 dark:text-gray-800">
            {{ __('perfil.update_info') }}
        </p>
    </header>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <x-input-label for="name" :value="__('perfil.name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="role" :value="__('perfil.role')" />
            <select id="role" name="role" class="block mt-1 w-full">
                <option value="usuari" @if($user->role == 'usuari') selected @endif>Usuari</option>
                <option value="admin" @if($user->role == 'admin') selected @endif>Admin</option>
                <option value="venta" @if($user->role == 'venta') selected @endif>Venta</option>
            </select>
        </div>

        <div class="col-span-2">
            <x-input-label for="email" :value="__('perfil.email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-800 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="col-span-2">

    @if($user->ruta)

    <img src="{{ asset('Media/' . $user->ruta) }}" width="90"/>
    @else
    {{ __('productes.Noimage') }}
    @endif
  </div>
    </div>

    <div class="flex items-center gap-4 mt-6">
        <x-primary-button>{{ __('perfil.save') }}</x-primary-button>

        @if (session('status') === 'profile-updated')
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600 dark:text-gray-800"
            >{{ __('Saved.') }}</p>
        @endif
    </div>
</section>
