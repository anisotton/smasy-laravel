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
                            <a href="#" wire:click="updateActive({{$row->id}})"
                                class="btn btn-xs btn-default mx-1 shadow" title="Delete">
                                <i class="fa fa-lg fa-fw {{ $row->active == 0 ? $config['icons']['active'] : $config['icons']['inactive'] }}"></i>
                            </a>
                        </nobr>
                    </div>
                </td>
            </tr>
        @endforeach
    </x-adminlte-datatable>

    {{-- <div>
        TESTE ESTATICO

        <p>{{ $message }}</p>

        <input type="text" name="message" id="message" wire:model="message">
    </div> --}}

@section('plugins.Datatables', true)
