@csrf

<div class="mt-8 max-w-md">
    <div class="grid grid-cols-1 gap-6">
        @dump($errors)
        <x-input.group for="inputName" :error="$errors->first('name')">
            <x-slot name="name">Имя</x-slot>
            <x-input.text id="inputName" name="name" value="{{ old('name') }}"
                          :error="$errors->first('name')"/>
        </x-input.group>

        <x-input.group for="inputEmail" :error="$errors->first('email')">
            <x-slot name="name">Адрес почты</x-slot>
            <x-input.email id="inputEmail" name="email" value="{{ old('email') }}"
                           :error="$errors->first('email')"/>
        </x-input.group>

        <x-input.group for="inputPassword" :error="$errors->first('password')">
            <x-slot name="name">Пароль</x-slot>
            <x-input.password id="inputPassword" name="password" :error="$errors->first('password')"/>
        </x-input.group>

        <x-input.group for="inputPasswordConfirm">
            <x-slot name="name">Повторите пароль</x-slot>
            <x-input.password id="inputPasswordConfirm" name="password_confirmation"/>
        </x-input.group>


        <div class="block">
            <x-input.button-orange>
                Регистрация
            </x-input.button-orange>
        </div>
    </div>
</div>
