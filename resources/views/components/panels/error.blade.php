@if($errors->any())
    <div class="my-4">
        <div class="px-4 py-3 leading-normal text-red-700 bg-red-100 rounded-lg" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
