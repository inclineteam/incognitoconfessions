@extends('pages.home')
@section('content')
<div class="flex flex-col w-[100vw]">
    <x-confessions.confessions-searchbar />
    <x-confessions.view-confessions :confessions="$confessions"/>
</div>
@endsection