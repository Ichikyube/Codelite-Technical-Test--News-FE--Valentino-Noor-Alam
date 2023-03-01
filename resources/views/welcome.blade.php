<x-app-layout>
    <div class="w-full h-screen">
        <div class="container m-auto px-6 md:px-12 lg:pt-[4.8rem] lg:px-7">
            <div class="flex flex-wrap items-center px-2 md:px-0">
                <section class="bg-white dark:bg-gray-900">
                    <div class="relative h-full max-w-screen-xl px-4 py-8 mx-auto bg-yellow-50 lg:py-16 lg:px-6">
                        <div class="max-w-screen-sm mx-auto mb-8 text-center lg:mb-16">
                            <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 lg:text-4xl dark:text-white">YOur News</h2>
                            <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">We use an agile approach to test assumptions and connect with the needs of your audience early and often.</p>
                        </div>
                        <div class="grid gap-8 lg:grid-cols-2">
                            @forelse ($news as $article)
                            <article class="p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                                <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a href="#">{{ $article['title'] }}</a></h2>
                                <div class="flex items-center space-x-4">
                                    <img class="rounded-full w-full h-full" src="{{ $article['banner'] }}" />
                                </div>
                                <div class="flex items-center justify-between">
                                    <p class="mb-5 font-light break-all text-gray-500 dark:text-gray-400">{{ $article['content'] }}</p>
                                </div>
                                @if (session('id_user'))
                                    <div class="flex justify-end">
                                        <div class="bg-blue-300 m-1 p-2 rounded-xl w-32 text-blue-700 hover:text-white hover:bg-blue-700 transition-colors duration-200 ease-linear text-center">
                                            <a href="{{ route("news.edit", ["id"=>$article['id']]) }}"><button>Rewrite</button></a>
                                        </div>
                                        <div class="bg-red-300 m-1 p-2 rounded-xl w-32 text-red-700 hover:text-white hover:bg-red-700 transition-colors duration-200 ease-linear text-center">
                                            <a href="{{ route("news.destroy", ["id"=>$article['id']]) }}"><button>Delete</button></a>
                                        </div>
                                    </div>
                                @endif
                            </article>
                            @empty
                                <div class="alert alert-warning mt-4">No Post yet. Login/Register to create post</div>
                            @endforelse
                        </div>
                    </div>
                  </section>
            </div>
        </div>
    </div>

</x-app-layout>
