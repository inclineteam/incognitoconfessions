@vite('resources/css/app.css')
@if ($paginator->hasPages())
    <div class="flex justify-center items-center">
        <ul class="flex justify-center items-center">
       
            @if ($paginator->onFirstPage())
                <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><img class="rotate-180 h-[20px] w-[20px] opacity-30" src="images/play.png"></a></li>
            @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><img class="rotate-180 h-[20px] w-[20px]" src="images/play.png"></a></li>
            @endif
    
    
            <div class="p-3">
                {{ $paginator->currentPage() }}
            </div>
            
    
    
            
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}" rel="next"><img class="h-[20px] w-[20px]" src="images/play.png"></a></li>
            @else
                <li><a class="disabled" href="{{ $paginator->nextPageUrl() }}" rel="next"><img class="h-[20px] w-[20px] opacity-30" src="images/play.png"></a></li>
            @endif
        </ul>
    </div>
@endif 