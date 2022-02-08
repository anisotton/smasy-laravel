@extends('adminlte::page')

@section('content_header')

<h1>{{ __('new.newUser') }}</h1>

@stop

@section('content')

<form method="POST" action="{{ route('user.store') }}">

    @csrf

    <x-adminlte-input name="name" label="{{ __('new.name') }}" placeholder="{{ __('new.fullName') }}" label-class="text-lightblue" required value="{{$user->name}}">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-user text-lightblue"></i>
            </div>
        </x-slot>
    </x-adminlte-input>

    <x-adminlte-input name="email" label="Email" placeholder="{{ __('new.exEmail') }}" label-class="text-lightblue" required value="{{$user->email}}>
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="far fa-envelope text-lightblue"></i>
            </div>
        </x-slot>
    </x-adminlte-input>

    <x-adminlte-input name="password" label="{{ __('new.passwd') }}" placeholder="{{ __('new.passwd') }}" label-class="text-lightblue" type="password" required>
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-key text-lightblue"></i>
            </div>
        </x-slot>
    </x-adminlte-input>

<div>
    <x-adminlte-button class="btn-flat" type="submit" label="Submit" theme="success" icon="fas fa-lg fa-save"/>
</div>

</form>

@stop
@section('js')
    <script>
        $(document).ready( function () {
           // $('#table1').DataTable();
        } );
    </script>
@stop

@section('plugins.Datatables', true)
