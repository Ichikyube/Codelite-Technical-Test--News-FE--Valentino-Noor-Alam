<div class="max-w-sm mb-10 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
    <img class="rounded-t-lg" src="{{ asset('images/'.$product->media_file) }}" style="width: 150px">
    <div class="p-5">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $product->name }}</h5>
        </a>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $product->category }}</p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $product->description }}</p>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $product->price }}</p>
        <a href="{{ route('products.detail', ['id' => $product->id])}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <button>Edit</button></a>
        <a href="{{ route('products.destroy', ['id' => $product->id])}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <button>Hapus</button></a>
    </div>
</div>
