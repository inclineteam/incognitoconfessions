@extends('log-viewer::bootstrap-4._master')

<?php /** @var  Illuminate\Pagination\LengthAwarePaginator  $rows */ ?>

@section('content')
    <div class="flex w-[100%] justify-center">
        <hr class="w-[80%] opacity-40 p-5">
    </div>

    <div class="p-5 h-screen">
        <div class="overflow-auto flex justify-center rounded-lg shadow">
            <table class="w-full">
                <thead class="text-xs bg-zinc-850 rounded-xl uppercase dark:bg-zinc-800 dark:text-white">
                    <tr>
                        @foreach($headers as $key => $header)
                        <th scope="col" class="w-20 p-3 text-sm font-semibold tracking-wide text-left">
                            @if ($key == 'date')
                                <span class="badge badge-info">{{ $header }}</span>
                            @else
                                <span class="badge badge-level-{{ $key }}">
                                    {{ log_styler()->icon($key) }} {{ $header }}
                                </span>
                            @endif
                        </th>
                        @endforeach
                        <th scope="col" class="w-20 p-3 text-sm font-semibold tracking-wide text-left">@lang('Actions')</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rows as $date => $row)
                        <tr class="bg-white border-b dark:bg-zinc-800 dark:border-zinc-800">
                            @foreach($row as $key => $value)
                                <td class="p-3 text-sm text-gray-400 whitespace-nowrap">
                                    @if ($key == 'date')
                                        <span class="badge badge-primary">{{ $value }}</span>
                                    @elseif ($value == 0)
                                        <span class="badge empty">{{ $value }}</span>
                                    @else
                                        <a href="{{ route('log-viewer::logs.filter', [$date, $key]) }}">
                                            <span class="badge badge-level-{{ $key }}">{{ $value }}</span>
                                        </a>
                                    @endif
                                </td>
                            @endforeach
                            <td x-data="{ optionDropdown: false }" class="p-3 text-sm text-gray-400 whitespace-nowrap">
                                <div class="relative">
                                    <button @click="optionDropdown = !optionDropdown"
                                        x-bind:class="optionDropdown ? 'bg-zinc-700/30 text-zinc-300' : 'hover:bg-zinc-700/30 hover:text-zinc-300'"
                                        class="rounded-full px-2 py-1 text-zinc-400">
                                        <i class="ai-more-vertical-fill"></i>
                                    </button>
                
                                    <x-admin.option-dropdown :key="$date" />
                                </div>
    
                                {{-- <c class="btn btn-sm btn-info">
                                    <img src="/images/delete.png" alt="">
                                </c>
                                <a href="{{ route('log-viewer::logs.download', [$date]) }}" class="btn btn-sm btn-success">
                                    <img src="/images/delete.png" alt="">
                                </a>
                                <a href="#delete-log-modal" data-log-date="{{ $date }}">
                                    <img src="/images/delete.png" alt="">
                                </a> --}}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11" class="text-center">
                                <span class="badge badge-secondary">@lang('The list of logs is empty!')</span>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{ $rows->render() }}
@endsection
