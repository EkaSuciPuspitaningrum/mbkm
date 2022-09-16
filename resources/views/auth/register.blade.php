<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Identitas -->
            <div class="mt-4">
                <x-label for="ident" :value="__('Identity Number (NIM/NIP)')" />

                <x-input id="ident" class="block mt-1 w-full" type="number" name="ident" :value="old('ident')" required />
            </div>

            <!-- Birthday -->
            <div class="mt-4" >
               <x-label for="date_of_birth" :value="__('Date of Birth')" />
                    <x-input class="block mt-1 w-full" type="date" name="date_of_birth" id="date_of_birth" :value="old('date_of_birth')" required>
                </x-label>
            </div>

            <!-- Jurusan -->
            <div class="w-full flex flex-col mb-3">
                <label>Jurusan</label>
                <select
                    class="block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full "
                    required="required" name="jurusannya" id="jurusannya">
                        <option value="">- Pilih -</option>
                        @foreach($jurusan as $mJurusan)
                            <option value="{{$mJurusan->id}}">{{$mJurusan->jurusan_name}}</option>
                        @endforeach
                </select>
            </div>


            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>

</x-guest-layout>
