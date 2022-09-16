<x-guest-layout>

    @if($mhsw_mbkm_exist)
        @include('layouts.mbkm_layout')
    @endif

    <x-slot name="script">
        <script>
            let url = "{{url('/mbkm/noreg')}}/{{$mhsw_mbkm->id}}";
        </script>
        <script src="{{url('/js/qr.js')}}"></script>
        <script src="{{url('/js/mbkm.js')}}"></script>
    </x-slot>
</x-guest-layout>
