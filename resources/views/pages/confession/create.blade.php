@extends('layouts.app')
@section('content')
    <form method="POST" action="{{ route('confession.create') }}" class="mx-auto max-w-lg flex flex-col items-center justify-center">
        @csrf
        <p class="mb-10 border-b border-zinc-800/50 pb-5 text-xl font-medium text-zinc-300">Write a confession</p>
        <x-form.control class="w-[90%]" name="name" label="Letter Name" inputBg="bg-zinc-800" />
        <x-form.control-textarea class="my-8 w-[90%]" name="content" label="Letter Message" inputBg="bg-zinc-800" />
        <x-form.control class="w-[90%]" name="to" label="To" inputBg="bg-zinc-800" />

        <div class="my-8">
            {!! NoCaptcha::renderJs() !!}
            {!! NoCaptcha::display(['data-theme' => 'dark']) !!}
        </div>

        <div class="space-x-2">
            <button type="submit"
                class="rounded-lg border-t border-indigo-500 bg-indigo-600 px-5 py-3 font-medium text-white">
                Create
            </button>
            <a href="{{ route('home') }}">
                <button type="button"
                    class="rounded-lg border-t border-zinc-700 bg-zinc-800 px-5 py-3 font-medium text-zinc-300">
                    Back
                </button>
            </a>
        </div>
    </form>
@endsection
