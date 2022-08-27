@extends('log-viewer::bootstrap-4._master')

@section('content')

    <div class="flex h-[100%] items-center mx-auto">
        <div class="flex flex-col items-center justify-center mx-auto">
            <div class="col-md-6 flex flex-col flex-wrap w-[80%] col-lg-9">
            
                {{-- <div class="flex w-[100%] justify-center">
                    <hr class="w-[100%] opacity-40 p-5">
                </div> --}}
                {{-- <div class="flex justify-center">
                    <p class="p-4 text-white ml-9 text-[1.5rem]">Logs Info</p>
                </div> --}}
                {{-- <div class="flex flex-wrap justify-center gap-5">
                    @foreach($percents as $level => $item)
                        <div class="flex justify-center items-center">
                            <div class="text-white flex flex-col rounded-lg bg-zinc-800 w-[20rem] justify-center items-center h-[10rem]">
                                <div class='flex w-[100%] items-center justify-center'>
                                    <img src="/images/letter.png" class="flex"></img>
                                    <p class="ml-4 text-center text-[2rem]">{{ $item['count'] }}</p>
                                </div>
                                <div class="">
                                    <span >{{ $item['name'] }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div> --}}
                <div class="flex flex-col pt-5 pb-5">
                    <div class="flex w-[100%] mt-10 justify-center">
                        <hr class="w-[100%] opacity-40 p-5">
                    </div>
                    <div class="flex justify-center">
                        <p class="p-4 text-white ml-9 text-[1.5rem]">Analytics</p>
                    </div>
                    <div class="flex gap-5 flex-wrap justify-center">
                        <div class="text-white flex flex-col rounded-lg bg-zinc-800 w-[20rem] justify-center items-center h-[10rem]">
                            <div class='flex w-[100%] items-center justify-center'>
                                <img src="/images/letter.png" class="flex"></img>
                                <p class="ml-4 text-center text-[2rem]">{{ count(DB::table('users')->get()) }}</p>
                            </div>
                            <div class="">
                                <span >Registered Users</span>
                            </div>
                        </div>
                        <div class="text-white flex flex-col rounded-lg bg-zinc-800 w-[20rem] justify-center items-center h-[10rem]">
                            <div class='flex w-[100%] items-center justify-center'>
                                <img src="/images/letter.png" class="flex"></img>
                                <p class="ml-4 text-center text-[2rem]">{{ count(DB::table('users')->where('banned', true)->get()) }}</p>
                            </div>
                            <div class="">
                                <span >Banned Users</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col pt-5 pb-5">
                    <div class="flex w-[100%] mt-10 justify-center">
                        <hr class="w-[100%] opacity-40 p-5">
                    </div>
                    <div class='flex justify-center'>
                        <p class="p-4 text-white ml-9 text-[1.5rem]">Ban / Unban</p>
                    </div>
                    <div class="flex gap-5 flex-wrap justify-center">
                        <div class="text-white flex flex-col rounded-lg bg-zinc-800 w-[25rem] justify-center items-center h-[15rem]">
                            <div class="">
                                <span >Unban User</span>
                            </div>
                            <form method="POST" action="unban" class="flex justify-center mt-5 flex-col">
                                @csrf
                                @method('PUT')
                                <x-form.control-custom name='ban' value='' class="w-[20rem]"  placeholder='enter user Id to unban' bgInput="bg-zinc-600" />
                                <div class='w-[100%] flex justify-center'>
                                    <button class="p-3 w-[70%] bg-zinc-700 mt-5 rounded-md ">Submit</button>
                                </div>
                            </form>
                        </div>
                        <div class="text-white flex flex-col rounded-lg bg-zinc-800 w-[25rem] justify-center items-center h-[15rem]">
                            <div class="">
                                <span >Ban User</span>
                            </div>
                            <form method="POST" action="ban" class="flex justify-center mt-5 flex-col">
                                @csrf
                                @method('PUT')
                                <x-form.control-custom name='ban' value='' class="w-[20rem]"  placeholder='enter user Id to ban' bgInput="bg-zinc-600" />
                                <div class='w-[100%] flex justify-center'>
                                    <button class="p-3 w-[70%] bg-zinc-700 mt-5 rounded-md ">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="flex w-[100%] mt-10 justify-center">
                        <hr class="w-[100%] opacity-40 p-5">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
