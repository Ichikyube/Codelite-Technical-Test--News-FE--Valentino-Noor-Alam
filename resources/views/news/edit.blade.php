<x-app-layout>
    <div class="flex-wrap pt-3 pb-2 mb-3 d-flex justify-content-between flex-md-nowrap align-items-center border-bottom">
        <h1 class="h2">Edit Article</h1>
    </div>
    <br><br><br><br>
    <div class="col-lg-8">
        <form method="post" action="{{ route('news.update', $article['id']) }}" enctype="multipart/form-data">
            @csrf
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
    
            @csrf
            {{-- <select name="Category"> --}}
            <div class="mb-5 w-fit">
                <label
                    for="name"
                    class="mb-3 block text-base font-medium text-[#07074D]">
                    Title
                </label>
                <input
                    type="text"
                    name="title"
                    id="title"
                    placeholder="What's News"
                    value="{{ $article['title'] }}"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] 
                        outline-none focus:border-amber-400 focus:shadow-md"/>
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-5 w-fit">
                <label for="banner" class="mb-3 block text-base font-medium text-[#07074D]">
                    <span class="label">Choose file</span>
                </label>
                <input 
                    name="banner" 
                    id="banner" 
                    type="file" 
                    accept=".jpg, .jpeg, .png" 
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] 
                        outline-none focus:border-amber-400 focus:shadow-md  @error('image') is-invalid @enderror">
                @error('banner')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="w-full mb-5">
                <label for="content" class="mb-3 block text-base font-medium text-[#07074D]">Body</label>
                <textarea 
                    name=content 
                    id="content" 
                    cols="30" rows="10" 
                    placeholder="What's News?" 
                    class="w-full font-serif p-4 text-gray-600 bg-indigo-50 outline-none rounded-md resize-none border py-3 px-6
                        border-[#e0e0e0] text-base font-medium focus:shadow-md
                        focus:border-amber-400">{{ $article['content'] }}</textarea>
                @error('content')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
             <div class="">
                <button 
                    type="submit"  
                    name="submit" 
                    value="Submit" 
                    class="px-8 py-3 text-base font-semibold text-white bg-yellow-400 rounded-md outline-none hover:shadow-form
                        hover:bg-amber-400">
                    Submit Edit
                </button>
            </div>
            <a class="btn btn-warning" href="{{ route('welcome') }}">Back</a>
        </form>
    </div>
</x-app-layout>
