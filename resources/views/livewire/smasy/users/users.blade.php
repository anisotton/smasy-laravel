    <div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                    @if (session()->has('message'))
                        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                            role="alert">
                            <div class="flex">
                                <div>
                                    <p class="text-sm">{{ session('message') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                        <button wire:click="create()" class="btn btn-success">
                            {{ __('new.newUser') }}
                        </button>
                    <hr>
                    @if ($isModalOpen)
                        @include('livewire.create')
                    @endif
                    <x-adminlte-datatable id="table1" :heads="$heads" head-theme="dark" theme="light" striped hoverable with-footer footer-theme="dark" beautify>
                        @foreach ($config['data'] as $row)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>
                                    <div>
                                        <nobr>
                                            <a wire:click="edit({{ $row->id }})"
                                                class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                                <i class="fa fa-lg fa-fw fa-pen"></i>
                                            </a>
                                            <a wire:click="updateActive({{ $row->id }})"
                                                class="btn btn-xs btn-default mx-1 shadow" title="Delete">
                                                <i
                                                    class="fa fa-lg fa-fw {{ $row->active == 0 ? $config['icons']['active'] : $config['icons']['inactive'] }}"></i>
                                            </a>
                                        </nobr>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </x-adminlte-datatable>
                </div>
            </div>
        </div>
    </div>

    @section('plugins.Datatables', true)
