@extends('pages.home')
@section('content')
<div class="flex flex-col ">
    <div class="h-[5rem]">
    </div>
    <x-confessions.view-confessions :confessions="$confessions"/>
</div>
@endsection