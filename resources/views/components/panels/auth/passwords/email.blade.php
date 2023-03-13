@csrf

<div class="mt-8 max-w-md">
    <div class="grid grid-cols-1 gap-6">

        <x-input.group for="inputEmail" :error="$errors->first('email')">
            <x-slot name="name">Адрес почты</x-slot>
            <x-input.email id="inputEmail" name="email" value="{{ old('email') }}"
                           :error="$errors->first('email')"/>
        </x-input.group>

        <div class="block">
            <x-input.button-orange>
                Отправить ссылку для восстановления пароля
            </x-input.button-orange>
        </div>
    </div>
</div>
