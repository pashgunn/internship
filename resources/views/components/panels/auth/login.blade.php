@csrf

<div class="mt-8 max-w-md">
    <div class="grid grid-cols-1 gap-6">
        <x-input.group for="inputEmail" :error="$errors->first('email')">
            <x-slot name="name">Адрес почты</x-slot>
            <x-input.email id="inputEmail" name="email" value="{{ old('email') }}"
                          :error="$errors->first('email')"/>
        </x-input.group>

        <x-input.group for="inputPassword" :error="$errors->first('password')">
            <x-slot name="name">Пароль</x-slot>
            <x-input.password id="inputPassword" name="password" value="{{ old('password') }}"
                          :error="$errors->first('password')"/>
        </x-input.group>

        <x-input.checkbox name="remember" isChecked="{{ old('remember') }}" >
            Запомнить меня
        </x-input.checkbox>

        <div class="block">
            <x-input.button-orange>
                Логин
            </x-input.button-orange>

            @if (Route::has('password.request'))
                <a class="text-gray hover:text-orange" href="{{ route('password.request') }}">
                    Забыли пароль?
                </a>
            @endif
        </div>
    </div>
</div>
