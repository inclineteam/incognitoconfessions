@props(['items'])

@if (count($items) <= 3)
    <div class="grid gap-y-5 lg:grid-cols-2 xl:grid-cols-3 md:grid-cols-2 xlg:grid-cols-2">
        {{ $slot }}
    </div>
@else
   <div class="grid gap-y-5 md:grid-cols-2 xl:grid-cols-3 lg:grid-cols-2 xlg:grid-cols-2">

      {{ $slot}}

   </div>
@endif

