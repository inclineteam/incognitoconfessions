@props(['confession'])

<div id="{{ $confession->id }}" class="confession-letter relative mb-6 inline-block w-full max-w-md overflow-hidden rounded-lg bg-[#25262B] p-6">
    <img src="/images/quote.svg" alt="" class="absolute -top-10 left-0 h-36 w-36 select-none" />

    <div class="flex h-[4rem] items-center justify-between text-sm">
        <p class="font-medium text-white/50">{{ $confession->name }}</p>
        <div class="w-[25%] flex justify-end">
            <button id="{{ $confession->id }}take_screenshot" class="w-[15px] opacity-40"><img src="images/download.png"></button>
        </div>
    </div>
    <p class="relative mb-16 whitespace-pre-wrap text-lg italic text-white/80">{{ $confession->content }}</p>

    <div class="flex items-center justify-between text-sm">
        <p class="font-medium text-white/50">To {{ $confession->to }}</p>

        <span class="text-white/30">{{ Carbon\Carbon::parse($confession->created_at)->format('m/d/y') }}</span>
    </div>
    
   
    <script type="text/javascript">  
       $(document).ready(function() {


            var element = $("#" + {!! json_encode($confession->id) !!}); // global variable
            var getCanvas; // global variable
            var newData;


            $( "#" + {!! json_encode($confession->id) !!} + "take_screenshot" ).on('click', function() {
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