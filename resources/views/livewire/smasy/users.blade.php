@extends('adminlte::page')

@section('content_header')

    <h1>{{ __('user.user') }}</h1>

@stop
@php

$heads = ['ID', 'Name', ['label' => 'Email', 'width' => 40], ['label' => 'Actions', 'no-export' => true, 'width' => 5]];

@endphp

@section('content')

    <div>
        <a href="{{ route('user.new') }}" wire:click.prevent="$toggle('showCreateForm')"
            class="btn btn-success">{{ __('new.newUser') }}</a>
    </div>

    <br>

    <x-adminlte-datatable id="table1" :heads="$heads">
        @foreach ($config['data'] as $row)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $row->name }}</td>
                <td>{{ $row->email }}</td>
                <td>
                    <div>
                        <nobr>
                            <a href="{{ route('user.update', $row->id) }}"
                                class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </a>
                            <a href="{{ route('user.active', $row->id) }}"
                                class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                <i class="fa fa-lg fa-fw fa-trash"></i>
                            </a>
                        </nobr>
                    </div>
                </td>
            </tr>
        @endforeach
    </x-adminlte-datatable>

@stop

@section('plugins.Datatables', true)
