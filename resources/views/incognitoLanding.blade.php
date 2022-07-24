<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Incognito</title>
        @vite('resources/css/app.css')

    </head>
    <body class="bg-[#1B1C21] flex h-[250vh] flex-col">
        <div >
            <!-- Content -->
            <header>

                <div class="flex justify-center overflow-hidden">

                    <div class="flex w-[50%]">
                        <span class="text-white font-inter font-semibold text-[24px] tracking-wider p-5">Incognito</span>
                    </div>

                    <div class="flex justify-end items-center w-[40%]">
                        <p class="text-white p-5 text-center font-inter w-[40%]">About</p>
                    </div>

                </div>

                <div class="absolute z-[-1] flex justify-end w-[100%]">
                    <img src="/images/background.png"  alt="background"/>
                </div>

                <div class="flex justify-center items-center h-[30rem]">

                    <div class="flex items-center flex-col">

                        <h1 class="tracking-wider w-[57rem] text-center font-inter font-semibold text-white text-[60px] leading-[6.4rem]">Confess 
                            <span class="text-[#FFFBD7] bg-[#292A2F] p-3 rounded-lg">without</span> them <span class="text-[#FFFBD7] bg-[#292A2F] p-2 rounded-lg">having to know</span> who you are
                        </h1>

                        <div class="flex w-[65%] items-center">
                            <img src="/images/lock.png" class="w-[12px] h-[12px]"/>
                            <p class="text-white p-1 font-light tracking-wide text-sm opacity-60">Confessions are anonymous</p>
                        </div>
                        <p class="text-white text-xl font-inter tracking-wide p-6 font-normal">Volutpat ac tincidunt vitae semper quis lectus nulla at volutpat.</p>

                    </div>
                </div>

            </header>


        </div>
    </body>
</html>
