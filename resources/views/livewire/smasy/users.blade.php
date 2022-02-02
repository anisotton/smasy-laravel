@extends('adminlte::page')

{{-- Setup data for datatables --}}

@section('content_header')

<h1>{{ __('adminlte::user.user') }}</h1>

{{--#TODO: melhorar layout--}}
@stop
@php
$heads = [
    'ID',
    'Name',
    ['label' => 'Phone', 'width' => 40],
    ['label' => 'Actions', 'no-export' => true, 'width' => 5],
];

$btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                <i class="fa fa-lg fa-fw fa-pen"></i>
            </button>';
$btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
              </button>';
$btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                   <i class="fa fa-lg fa-fw fa-eye"></i>
               </button>';

@endphp

@section('content')
<x-adminlte-button label="Novo" theme="primary" icon="fas fa-lg fa-save" wire:click="new()"/>

<button wire:click="new()">

    Add Todo

</button>

    {{-- Minimal example / fill data using the component slot --}}
    <x-adminlte-datatable id="table1" :heads="$heads" head-theme="light" :config="$config" with-buttons striped hoverable footer-theme="light" beautify>
        @foreach($config['data'] as $row)
            <tr>
                @foreach($row as $cell)
                    <td>{!! $cell !!}</td>
                @endforeach
            </tr>
        @endforeach
    </x-adminlte-datatable>

@stop
@section('js')
    <script>
        $(document).ready( function () {
           // $('#table1').DataTable();
        } );
    </script>
@stop

@section('plugins.Datatables', true)
