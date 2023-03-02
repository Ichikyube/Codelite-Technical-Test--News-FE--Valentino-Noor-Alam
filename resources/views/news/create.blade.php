<x-app-layout>
    <div class="container mx-auto">

        <form method="post" action="{{ route('news.post') }}" enctype="multipart/form-data">
            @if($errors->any())
                <div class="alert alert-danger">
                    <p><strong>Opps Something went wrong</strong></p>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li><p class="alert alert-danger">{{ $error }}</p></li>
                    @endforeach
                    </ul>
                </div>
            @endif

            @csrf
            {{-- <select name="Category"> --}}
            <div class="mb-5 w-fit">
                <label
                    for="title"
                    class="mb-3 block text-base font-medium text-[#07074D]">
                    Title
                </label>
                <input
                    type="text"
                    name="title"
                    id="title"
                    placeholder="What's News"
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
                        outline-none focus:border-amber-400 focus:shadow-md"/>
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
                    placeholder="So how about that?" 
                    class="w-full font-serif p-4 text-gray-600 bg-indigo-50 outline-none rounded-md resize-none border py-3 px-6
                        border-[#e0e0e0] text-base font-medium focus:shadow-md
                        focus:border-amber-400"></textarea>
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
                    Submit
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
