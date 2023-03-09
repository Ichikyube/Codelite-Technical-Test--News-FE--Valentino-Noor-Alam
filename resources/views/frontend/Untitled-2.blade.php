
<div class=" bg-white shadow bottom-5 w-[97%] h-[90%] rounded-xl p-10">
            {{-- <template x-for="skill in skills">
                <button x-text="skill.title"
                    class="px-4 py-2 text-xl text-gray-100 transition bg-blue-600 rounded-md h-14 w-44 hover:bg-blue-700"
                    :class="(currentSkill.title == skill.title) && 'font-bold ring-2 ring-gray-100'"
                    @click="currentSkill = skill"></button>
            </template> --}}
        <div class="flex items-center justify-center" x-data="{ circumference: 2 * 22 / 7 * 120 }">
            <svg class="transform -rotate-90 w-72 h-72">
                <circle cx="145" cy="145" r="120" stroke="currentColor" stroke-width="30" fill="transparent"
                    class="text-gray-700" />

                <circle cx="145" cy="145" r="120" stroke="currentColor" stroke-width="30" fill="transparent"
                    :stroke-dasharray="circumference"
                    :stroke-dashoffset="circumference - currentSkill.percent / 100 * circumference"
                    class="text-blue-500 " />
            </svg>
            <span class="absolute text-5xl" x-text="`${currentSkill.percent}%`"></span>
        </div>

        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('skillDisplay', () => ({
                    skills: [{
                            'title': 'HTML',
                            'percent': '95',
                        },
                        {
                            'title': 'CSS',
                            'percent': '70',
                        },
                        {
                            'title': 'Tailwind CSS',
                            'percent': '90',
                        },
                        {
                            'title': 'JavaScript',
                            'percent': '70',
                        },
                        {
                            'title': 'Alpine JS',
                            'percent': '80',
                        }, {
                            'title': 'PHP',
                            'percent': '65',
                        }, {
                            'title': 'Laravel',
                            'percent': '75',
                        }
                    ],
                    currentSkill: {
                        'title': 'HTML',
                        'percent': '95',
                    }
                }));
            });
        </script>
    </div>
</div>

