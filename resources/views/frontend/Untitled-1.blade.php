
<div class="overflow-hidden overflow-y-hidden">
    <div class="inset-0 flex items-center justify-center w-screen h-screen text-5xl text-white transition-all duration-1000 ease-in-out transform translate-x-0 bg-pink-500 slide">Hello</div>
    <div class="inset-0 flex items-center justify-center w-screen h-screen text-5xl text-white transition-all duration-1000 ease-in-out transform translate-x-full bg-purple-500 slide">There</div>
    <div class="inset-0 flex items-center justify-center w-screen h-screen text-5xl text-white transition-all duration-1000 ease-in-out transform translate-x-full bg-teal-500 slide">Booya!</div>
    <div onclick="nextSlide()" class="fixed bottom-0 right-0 flex items-center justify-center w-16 h-16 text-black bg-white cursor-pointer">&#x276F;</div>
    <div onclick="previousSlide()" class="fixed bottom-0 right-0 flex items-center justify-center w-16 h-16 mr-16 text-black bg-white border-r border-gray-400 cursor-pointer">&#x276E;</div>
    <button class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
        Button
    </button>
    <script>
        function nextSlide(){
        let activeSlide = document.querySelector('.slide.translate-x-0');
        activeSlide.classList.remove('translate-x-0');
        activeSlide.classList.add('-translate-x-full');

        let nextSlide = activeSlide.nextElementSibling;
        nextSlide.classList.remove('translate-x-full');
        nextSlide.classList.add('translate-x-0');
    }

    function previousSlide(){
        let activeSlide = document.querySelector('.slide.translate-x-0');
        activeSlide.classList.remove('translate-x-0');
        activeSlide.classList.add('translate-x-full');

        let previousSlide = activeSlide.previousElementSibling;
        previousSlide.classList.remove('-translate-x-full');
        previousSlide.classList.add('translate-x-0');
    }
    </script>
</div>
