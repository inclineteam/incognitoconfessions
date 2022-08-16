@extends('layouts.app')
@section('content')
    <div class="flex justify-center">
        <div class="bg-zinc-800/90 w-[95%] md:w-[75%] lg:w-[70%] h-[100%] rounded-lg">


            <div id="{{ $confession->id }}" class="bg-zinc-800/90 w-[100%] h-[100%] rounded-lg">
                <div class="flex">
                    <p class="text-white opacity-30 text-[1.2rem] pl-5 pt-8 pb-5 ml-5">{{ $confession->name }}</p>
                    <div class="pt-8 w-[100%] mb-6 flex items-end justify-end pr-10 space-x-4">
                        <div class="flex justify-end">
                            <button id="{{ $confession->id }}take_screenshot">
                                <i class="ai-download text-lg text-zinc-500"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center">
                    <hr class=" w-[90%] opacity-30">
                </div>
                <div class="flex justify-center w-full mt-9">
                    <div class="flex w-[90%]">
                        <p class="text-white break-all text-[20px] font-light">{{ $confession->content }}</p>
                    </div>
                </div>
                <div class="flex">
                    <p class="text-white opacity-30 p-5 text-[14px] ml-5">To {{ $confession->to }}</p>
                </div>
                @if (auth()->user())
                    <div class="flex p-5 ml-5 ">
                        <form method="POST" action="/confessions/{{ $confession->id }}" class="flex">
                            @csrf
                            @method("PUT")
                            @if (in_array(auth()->user()->id, $confession->reacts_users))
                                <button class="w-[4rem] rounded-full flex justify-center items-center h-[1.7rem] font-thin text-[1rem] text-white/50 bg-[#616161]"><img src="/images/heart-2.png" class="p-1 h-[1.7rem]" />{{ $confession->reacts }}</img></button>
                            @else
                                <button class="w-[4rem] rounded-full flex justify-center items-center h-[1.7rem] font-thin text-[1rem] text-white/50 bg-[#373737]"><img src="/images/heart.png" class="p-1 h-[1.7rem]" />{{ $confession->reacts }}</img></button>
                            @endif
                            
                        </form>
                        <a href="#comment" class="w-[4rem] rounded-full flex justify-center items-center h-[1.7rem] ml-3 font-thin text-[1rem] text-white/50 bg-[#373737]"><img src="/images/message.png" class="p-1" />{{ count($confession->replies) }}</img></a>
                    </div>
                @endif
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
            <div class="flex justify-center">
                <hr class=" w-[90%] opacity-30">
            </div>

            <div class="h-full min-h-[80%]">
                <div class="flex justify-center">
                    <!-- implement replies section -->
                    <x-replies.view-replies :confession="$confession" />
                </div>
                @if (auth()->user())
                    <div class="h-[5rem] flex justify-center" id="comment">
                        <form preserve-scroll method="POST" action="/confessions/{{ $confession->id }}/reply" class="flex items-center w-[100%] mx-5 md:mx-4 lg:mx-1 justify-center">
                            @csrf
                            @method("POST")
                            
                            <x-form.control-custom type="text" name="content"  class="w-[82%] p-3 h-[3.5rem] rounded-full flex justify-center font-[400] text-[0.9rem] text-white/50 " bgInput="bg-[#373737]" placeholder="Reply to this confession"  />
                            <button class="w-[4rem] rounded-full flex justify-center h-[2rem] ml-3 items-center font-thin text-[1rem] text-white/50 bg-[#373737]"><img src="/images/message.png" class="p-1" /></img></button>
                        </form>
                    </div>

                @else
                    <div class="h-[3rem] mt-5 items-end flex-row flex justify-start pl-5" id="comment">
                        <p class="text-[#727272] font-[400] p-4">please <a href="{{ route('login') }}">
                            <span class="text-sm font-medium text-zinc-300">Login</span>
                        </a> or <a href="{{ route('register') }}">
                            <span class="text-sm font-medium text-zinc-300">Register</span>
                        </a> to reply</p>
                    </div>
                @endif
                
            </div>
            
        </div>
        
    </div>
@endsection
