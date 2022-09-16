<x-guest-layout>

    @if($mhsw_mbkm_exist)
        @include('layouts.logbook_layout')
    @endif

    <x-slot name="script">
        <script>
            let url = "{{url('/logbook/noreg')}}/{{$mhsw_mbkm->id}}";
        </script>
    </x-slot>
</x-guest-layout>
