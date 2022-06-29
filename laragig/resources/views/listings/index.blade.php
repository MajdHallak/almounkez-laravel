<x-layout>

@include('partials._hero')
@include('partials._search')

{{-- @php
$test=1;
// dd(count($listings))
@endphp

test:{{$test}} --}}

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
{{-- using directives; --}}
@unless(count($listings) == 0)
    @foreach ($listings as $listing)
        <x-listing-card :listing="$listing" />
    @endforeach
@else
<p>No listings found!</p>
@endunless
</div>
</x-layout>