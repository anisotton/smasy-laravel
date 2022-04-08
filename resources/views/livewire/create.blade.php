<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">
                        <div class="mb-4">
                            <x-adminlte-input name="name" label="{{ __('new.name') }}"
                                placeholder="{{ __('new.fullName') }}" label-class="text-lightblue" wire:model='name'
                                required>
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="fas fa-user text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                            @error('name')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <x-adminlte-input name="email" label="Email" placeholder="{{ __('new.exEmail') }}"
                                label-class="text-lightblue" wire:model='email' required>
                                <x-slot name="prependSlot">
                                    <div class="input-group-text">
                                        <i class="far fa-envelope text-lightblue"></i>
                                    </div>
                                </x-slot>
                            </x-adminlte-input>
                            @error('email')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <x-adminlte-button wire:click.prevent="store()" type="button" class="btn-flat"
                            type="submit" label="Submit" theme="success" icon="fas fa-lg fa-save" />
                    </span>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        <x-adminlte-button wire:click="closeModalPopover()" type="button" type="button"
                            class="btn-flat" label="Back" theme="danger" icon="fa fa-chevron-circle-left" />
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
