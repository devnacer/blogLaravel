@if (session()->has('success'))
    <x-alert typeAlert='success'>
        {{ session('success') }}
    </x-alert>
@endif
