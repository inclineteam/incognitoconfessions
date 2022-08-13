@props(['confession'])

<div id="{{ $confession->id }}"
    class="confession-letter relative flex h-full w-full max-w-[98%] md:max-w-md lg:max-w-md flex-col justify-between overflow-hidden rounded-2xl bg-zinc-800/90 p-6">
    <img src="/images/quote.svg" alt="" class="absolute -top-10 left-0 h-36 w-36 select-none" />

    <div class="mb-16">
        <div class="mt-4 mb-6 flex items-center justify-between space-x-4">
            <p class="truncate font-medium text-zinc-400">{{ $confession->name }}</p>
            <div class="flex justify-end">
                <button id="{{ $confession->id }}take_screenshot">
                    <i class="ai-download text-lg text-zinc-500"></i>
                </button>
            </div>
        </div>

        <p class="relative whitespace-pre-wrap text-lg italic text-zinc-300">{{ $confession->content }}</p>
    </div>

    <div class="flex items-center justify-between text-sm">
        <p class="font-medium text-zinc-400">To {{ $confession->to }}</p>

        <span class="text-zinc-500">{{ Carbon\Carbon::parse($confession->created_at)->format('m/d/y') }}</span>
    </div>


    <script type="text/javascript">
        $(document).ready(function() {


            var element = $("#" + {!! json_encode($confession->id) !!}); // global variable
            var getCanvas; // global variable
            var newData;


            $("#" + {!! json_encode($confession->id) !!} + "take_screenshot").on('click', function() {
                html2canvas(element, {
                    onrendered: function(canvas) {
                        getCanvas = canvas;
                        var imgageData = getCanvas.toDataURL("image/png");
                        var a = document.createElement("a");
                        a.href = imgageData; //Image Base64 Goes here
                        a.download = "confession-letter.png"; //File name Here
                        a.click(); //Downloaded file
                    }
                });
            });
        });
    </script>
</div>
