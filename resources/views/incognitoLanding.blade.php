<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Incognito</title>
        @vite('resources/css/app.css')

    </head>
    <body>
        <div class="bg-[#1B1C21] flex h-[100vh] w-[100vw] flex-col">
            <!-- Content -->
            <header>
                <div class="flex justify-center">
                    <div class="flex w-[50%]">
                        <h1 class="text-white font-inter font-semibold text-[24px] tracking-wider p-5">Incognito</h1>
                    </div>
                    <div class="flex justify-end items-center w-[40%]">
                        <p class="text-white p-5 text-center font-inter">About</p>
                    </div>
                </div>
            </header>


        </div>
    </body>
</html>
