@extends('adminlte::page')

{{-- Setup data for datatables --}}

@section('content_header')

<h1>{{ __('createUser.newUser') }}</h1>


@stop

@section('content')


<x-adminlte-input name="iName" label="{{ __('createUser.name') }}" placeholder="{{ __('createUser.fullName') }}" label-class="text-lightblue">
    <x-slot name="prependSlot">
        <div class="input-group-text">
            <i class="fas fa-user text-lightblue"></i>
        </div>
    </x-slot>
</x-adminlte-input>

<x-adminlte-input name="iMail" label="Email" placeholder="{{ __('createUser.exEmail') }}" label-class="text-lightblue">
    <x-slot name="prependSlot">
        <div class="input-group-text">
            <i class="far fa-envelope text-lightblue"></i>
        </div>
    </x-slot>
</x-adminlte-input>

{{-- With prepend slot --}}
<x-adminlte-input name="iUser" label="{{ __('createUser.user') }}" placeholder="{{ __('createUser.userName') }}" label-class="text-lightblue">
    <x-slot name="prependSlot">
        <div class="input-group-text">
            <i class="fas fa-at text-lightblue"></i>
        </div>
    </x-slot>
</x-adminlte-input>

<x-adminlte-input name="iNumber" label="{{ __('createUser.number') }}" placeholder="{{ __('createUser.number') }}" label-class="text-lightblue">
    <x-slot name="prependSlot">
        <div class="input-group-text">
            <i class="fas fa-mobile text-lightblue"></i>
        </div>
    </x-slot>
</x-adminlte-input>

<x-adminlte-input name="iAddress" label="{{ __('createUser.address') }}" placeholder="{{ __('createUser.address') }}" label-class="text-lightblue">
    <x-slot name="prependSlot">
        <div class="input-group-text">
            <i class="fas fa-map-marked-alt text-lightblue"></i>
        </div>
    </x-slot>
</x-adminlte-input>

@stop
@section('js')
    <script>
        $(document).ready( function () {
           // $('#table1').DataTable();
        } );
    </script>
@stop

@section('plugins.Datatables', true)
