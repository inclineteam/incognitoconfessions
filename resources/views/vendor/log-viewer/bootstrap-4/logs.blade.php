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

@section('modals')
    {{-- DELETE MODAL --}}
    {{-- <div id="delete-log-modal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form id="delete-log-form" action="{{ route('log-viewer::logs.delete') }}" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="date" value="">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">@lang('Delete log file')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary mr-auto" data-dismiss="modal">@lang('Cancel')</button>
                        <button type="submit" class="btn btn-sm btn-danger" data-loading-text="@lang('Loading')&hellip;">@lang('Delete')</button>
                    </div>
                </div>
            </form>
        </div>
    </div> --}}
@endsection

@section('scripts')
    <script>
        $(function () {
            var deleteLogModal = $('div#delete-log-modal'),
                deleteLogForm  = $('form#delete-log-form'),
                submitBtn      = deleteLogForm.find('button[type=submit]');

            $("a[href='#delete-log-modal']").on('click', function(event) {
                event.preventDefault();
                var date    = $(this).data('log-date'),
                    message = "{{ __('Are you sure you want to delete this log file: :date ?') }}";

                deleteLogForm.find('input[name=date]').val(date);
                deleteLogModal.find('.modal-body p').html(message.replace(':date', date));

                deleteLogModal.modal('show');
            });

            deleteLogForm.on('submit', function(event) {
                event.preventDefault();
                submitBtn.button('loading');

                $.ajax({
                    url:      $(this).attr('action'),
                    type:     $(this).attr('method'),
                    dataType: 'json',
                    data:     $(this).serialize(),
                    success: function(data) {
                        submitBtn.button('reset');
                        if (data.result === 'success') {
                            deleteLogModal.modal('hide');
                            location.reload();
                        }
                        else {
                            alert('AJAX ERROR ! Check the console !');
                            console.error(data);
                        }
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        alert('AJAX ERROR ! Check the console !');
                        console.error(errorThrown);
                        submitBtn.button('reset');
                    }
                });

                return false;
            });

            deleteLogModal.on('hidden.bs.modal', function() {
                deleteLogForm.find('input[name=date]').val('');
                deleteLogModal.find('.modal-body p').html('');
            });
        });
    </script>
@endsection
