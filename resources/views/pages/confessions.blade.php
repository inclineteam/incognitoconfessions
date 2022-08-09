@extends('layouts.app')
@section('content')
    <div class="mb-10 flex items-end justify-between border-b border-zinc-800/50 pb-6">
        <p class="text-xl font-medium text-zinc-300">Read Confessions</p>
        <div x-data="{ sortDropdown: false }" class="relative">
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
    </div>
    <x-confessions.view-confessions :confessions="$confessions" />
@endsection
