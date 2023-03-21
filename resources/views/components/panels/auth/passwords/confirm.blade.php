@csrf

<div class="mt-8 max-w-md">
    <div class="grid grid-cols-1 gap-6">

        <x-input.group for="inputPassword" :error="$errors->first('password')">
            <x-slot name="name">Пароль</x-slot>
            <x-input.password id="inputPassword" name="password" value="{{ old('password') }}"
                              :error="$errors->first('password')"/>
        </x-input.group>


        @if (Route::has('password.request'))
            <a class="text-gray-500 hover:text-orange" href="{{ route('password.request') }}">
                Забыли пароль?
            </a>
        @endif

        <div class="block">
            <x-input.button-orange>
                Подтвердить пароль
            </x-input.button-orange>
        </div>
    </div>
</div>
