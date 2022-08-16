<footer class="w-full border-t border-zinc-800 bg-zinc-900 pt-8 pb-10 text-center text-sm text-zinc-400">
    <div class="flex w-[70%] md:w-[60%] flex-wrap gap-10 justify-between mx-auto">
        <div class="flex flex-col">
            <p class="text-[1rem] font-medium text-white">Resources<p>
            <ul>
                <li class="flex mt-4"><a class="text-left" href="
                    {{ route('about') }}
                ">About</a></li>
                <li class="flex mt-4"><a href="
                    {{ route('privacy') }}
                ">Privacy Policy</a></li>
                <li class="flex mt-4"><a href="
                    {{ route('privacy') }}
                ">Terms Of Use</a></li>
            </ul>
        </div>

        <div class="flex flex-col">
            <p class="text-[1rem] font-medium text-white">Open Source<p>
            <ul>
                <li class="flex mt-4"><a class="text-left" href="
                    {{ route('source') }}
                ">Github</a></li>
                <li class="flex mt-4"><a href="
                    {{ route('report') }}
                ">Bug Report</a></li>

            </ul>
        </div>

        <div class="flex flex-col">
            <p class="text-[1rem] font-medium text-white">Contact<p>
            <ul>
                <li class="flex mt-4"><a class="text-left" href="
                    {{ route('discord') }}
                ">Discord</a></li>
                <li class="flex mt-4"><a href="
                    {{ route('discord') }}
                ">Facebook</a></li>
            </ul>
        </div>

        
    </div>

    <p class="mt-10">Copyright &copy; 2022 Incline Team. All Rights Reserved</p>

</footer>
