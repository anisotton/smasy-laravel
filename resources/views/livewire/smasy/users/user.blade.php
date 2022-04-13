<div>

    <form wire:submit.prevent="saveContact">

        @csrf

        <x-adminlte-input name="name" label="{{ __('new.name') }}" placeholder="{{ __('new.fullName') }}"
            label-class="text-lightblue" wire:model.lazy='name'>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        @error('name')
            <span class="error">{{ $message }}</span>
        @enderror

        <x-adminlte-input name="email" label="Email" placeholder="{{ __('new.exEmail') }}" label-class="text-lightblue"
            wire:model.lazy='email'>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="far fa-envelope text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        @error('email')
            <span class="error">{{ $message }}</span>
        @enderror

        @if ($showDiv)
                <x-adminlte-input name="password" label="Password" type="password"
                    placeholder="{{ __('new.passwd') }}" label-class="text-lightblue" wire:model.lazy='password'>
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="far fa-envelope text-lightblue"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
                @error('password')
                    <span class="error">{{ $message }}</span>
                @enderror
        @endif

        <input type="text" name="id" id="id" style="visibility:hidden">

        <input type="text" name="active" id="active" style="visibility:hidden">



        <div>
            <x-adminlte-button wire:click='toList' type="button" label="Back" theme="danger"
                icon="fa fa-chevron-circle-left" />
            <x-adminlte-button type="submit" label="Submit" theme="success" icon="fas fa-lg fa-save" />
            @if ($showButton)
            <x-adminlte-button label="Password" wire:click="$toggle('showDiv')" theme="primary" icon="fas fa-key"/>
            @endif
        </div>
    </form>

</div>

@section('plugins.Datatables', true)
