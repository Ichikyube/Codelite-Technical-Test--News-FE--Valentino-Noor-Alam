<x-app-layout>
    <br><br><br><br><br><br><br><br><br><br><br><br>
        <a href="{{ route('products.store') }}">Itee</a>
        <button> Tambah User </button></a>
        @foreach ($products as $product)
            @include('products.product')
        @endforeach
</x-app-layout>
