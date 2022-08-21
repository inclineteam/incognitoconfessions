<?php
/**
 * @var  Arcanedev\LogViewer\Entities\Log                                                                     $log
 * @var  Illuminate\Pagination\LengthAwarePaginator|array<string|int, Arcanedev\LogViewer\Entities\LogEntry>  $entries
 * @var  string|null                                                                                          $query
 */
?>

@extends('log-viewer::bootstrap-4._master')

@section('content')
    <div class="flex w-[100%] justify-center">
        <hr class="w-[100%] opacity-40 p-5">
    </div>

    <div class="row text-white">
        <div class="col-lg-2">
            {{-- Log Menu --}}
            <div class="card mb-4">
                <div class="mb-5"><i class="fa fa-fw fa-flag"></i> @lang('Levels')</div>
                <div class="list-group list-group-flush gap-5 log-menu">
                    @foreach($log->menu() as $levelKey => $item)
                        @if ($item['count'] === 0)
                            <a class="bg-zinc-800 rounded-lg mx-1 p-3 list-group-item list-group-item-action d-flex justify-content-between align-items-center disabled">
                                <span class="level-name">{!! $item['icon'] !!} {{ $item['name'] }}</span>
                                <span class="badge empty">{{ $item['count'] }}</span>
                            </a>
                        @else
                            <a href="{{ $item['url'] }}" class="bg-zinc-700 rounded-lg mx-1 p-3 list-group-item list-group-item-action d-flex justify-content-between align-items-center level-{{ $levelKey }}{{ $level === $levelKey ? ' active' : ''}}">
                                <span class="level-name">{!! $item['icon'] !!} {{ $item['name'] }}</span>
                                <span class="badge badge-level-{{ $levelKey }}">{{ $item['count'] }}</span>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-lg-10">
            {{-- Log Details --}}
            <div class="card mb-4">
                <div class="card-header p-3 flex">
                    <p>Log Info :</p>
                </div>
                <div class="table-responsive mx-2">
                    <table class="table table-condensed mb-0">
                        <tbody>
                            <tr>
                                <td>@lang('File path') :</td>
                                <td colspan="7">{{ $log->getPath() }}</td>
                            </tr>
                            <tr>
                                <td>@lang('Log entries') :</td>
                                <td>
                                    <span class="badge badge-primary">{{ $entries->total() }}</span>
                                </td>
                                <td>@lang('Size') :</td>
                                <td>
                                    <span class="badge badge-primary">{{ $log->size() }}</span>
                                </td>
                                <td>@lang('Created at') :</td>
                                <td>
                                    <span class="badge badge-primary">{{ $log->createdAt() }}</span>
                                </td>
                                <td>@lang('Updated at') :</td>
                                <td>
                                    <span class="badge badge-primary">{{ $log->updatedAt() }}</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="flex item-center items-center mt-5 space-x-6">
                    {{-- Search --}}
                    <div class="input-focus-styles hidden xlg:inline rounded-full bg-zinc-800 px-2 py-1 duration-150">
                        <form class="flex items-center space-x-4" action="{{ route('log-viewer::logs.search', [$log->date, $level]) }}" method="GET">
                            <div class="form-group">
                                <div class="input-group">
                                    <input id="query" name="query" class="select-none bg-transparent py-1 pl-4 text-sm text-zinc-400 placeholder:text-zinc-500" value="{{ $query }}" placeholder="@lang('Type here to search')">
                                    <button type="submit" class="rounded-full px-2 py-1 hover:bg-zinc-700/40">
                                        <i class="ai-search text-zinc-400"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="flex">
                        @unless (is_null($query))
                            <a href="{{ route('log-viewer::logs.show', [$log->date]) }}" class="btn text-center btn-secondary">
                                (@lang(':count results', ['count' => $entries->count()])) <i class="fa fa-fw fa-times"></i>
                            </a>
                        @endunless
                    </div>
                </div>

            {{-- Log Entries --}}
            <div class="card mb-4 mt-4">
                @if ($entries->hasPages())
                    <div class="card-header">
                        <span class="badge badge-info float-right">
                            {{ __('Page :current of :last', ['current' => $entries->currentPage(), 'last' => $entries->lastPage()]) }}
                        </span>
                    </div>
                @endif

                <div class="table-responsive">
                    <table id="entries" class="w-[100%] table-fixed text-sm  text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs bg-zinc-850 rounded-xl uppercase dark:bg-zinc-800 dark:text-white">
                            <tr >
                                <th class="py-4 px-3">@lang('ENV')</th>
                                <th class="py-4 px-3"">@lang('Level')</th>
                                <th class="py-4 px-3">@lang('Time')</th>
                                <th class="py-4 text-center">@lang('Header')</th>
                                {{-- <th class="py-4 text-center">@lang('Actions')</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($entries as $key => $entry)
                                <div x-data="{ profileDropdown{{ $key }}: false }">
                                    <tr>
                                        <td class="py-4 px-6">
                                            <span class="badge badge-env">{{ $entry->env }}</span>
                                        </td>
                                        <td class="py-4 px-6">
                                            <span class="badge badge-level-{{ $entry->level }}">
                                                {!! $entry->level() !!}
                                            </span>
                                        </td>
                                        <td class="py-4 px-6">
                                            <span class="badge badge-secondary">
                                                {{ $entry->datetime->format('H:i:s') }}
                                            </span>
                                        </td>
                                        <td class="py-4 px-6 text-center">
                                            <p class="break-all overflow-auto">{{ $entry->header }}</p>
                                        </td>
                                    </tr>
                                </div>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">
                                        <span class="badge badge-secondary">@lang('The list of logs is empty!')</span>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {!! $entries->appends(compact('query'))->render() !!}
        </div>
    </div>
@endsection

@section('modals')
    {{-- DELETE MODAL
    <div id="delete-log-modal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form id="delete-log-form" action="{{ route('log-viewer::logs.delete') }}" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="date" value="{{ $log->date }}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">@lang('Delete log file')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>@lang('Are you sure you want to delete this log file: :date ?', ['date' => $log->date])</p>
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
                            location.replace("{{ route('log-viewer::logs.list') }}");
                        }
                        else {
                            alert('OOPS ! This is a lack of coffee exception !')
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

            @unless (empty(log_styler()->toHighlight()))
                @php
                    $htmlHighlight = version_compare(PHP_VERSION, '7.4.0') >= 0
                        ? join('|', log_styler()->toHighlight())
                        : join(log_styler()->toHighlight(), '|');
                @endphp

                $('.stack-content').each(function() {
                    var $this = $(this);
                    var html = $this.html().trim()
                        .replace(/({!! $htmlHighlight !!})/gm, '<strong>$1</strong>');

                    $this.html(html);
                });
            @endunless
        });
    </script>
@endsection
