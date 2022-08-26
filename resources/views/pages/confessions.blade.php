@extends('layouts.app')
@section('content')
    <div class="mb-10 flex flex-col md:flex-row-reverse md:justify-between justify-center items-center border-b border-zinc-800/50 pb-6
    
    ">

        <div x-data="{ sortDropdown: false }" class="relative flex mr-0 md:mr-4">
            <button @click="sortDropdown = !sortDropdown"
                x-bind:class="sortDropdown ? 'bg-zinc-800/30' : 'hover:bg-zinc-800/30'"
                class="flex items-center space-x-3 rounded border border-zinc-800 px-4 py-3 duration-150">
                <p class="text-zinc-300">Sort confessions by</p>
                <i class="ai-align-right text-zinc-500"></i>
            </button>

            <div @click.outside="sortDropdown = false"
                class="absolute z-40 mt-5 w-full space-y-1 rounded-lg border border-zinc-800 bg-zinc-900 p-2 shadow-xl shadow-zinc-900"
                x-show="sortDropdown" x-transition x-cloak>
                <x-sort-item value="latest" label="Latest (Default)" />
                <x-sort-item value="name" label="Name from A-Z" />
                <x-sort-item value="created_at" label="Date created" />
                <x-sort-item value="to" label="To from A-Z" />
            </div>
        </div>
        <div class="flex flex-col">
            <div class="input-focus-styles visible md:hidden my-5 rounded-full bg-zinc-800 px-2 py-1 duration-150">
                <form class="flex items-center space-x-4">
                    
                    <input type="text" autocomplete="off" name="search" placeholder="Search"
                        class="select-none bg-transparent py-1 pl-4 text-sm text-zinc-400 placeholder:text-zinc-500">
                    <button type="submit" class="rounded-full px-2 py-1 hover:bg-zinc-700/40">
                        <i class="ai-search text-zinc-400"></i>
                    </button>
                </form>
            
            </div>
            <p class="text-xl text-center ml-0 md:ml-4 font-medium text-zinc-300">Read Confessions</p>
        </div>
        
    </div>
    <x-confessions.view-confessions :confessions="$confessions" />
@endsection
