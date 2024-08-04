<x-guest-layout>
    <form action="{{ route('storetasktacheur') }}" method="POST">
        @csrf

        <div>
            <x-input-label for="tarifs" :value="__('tarifs (dhs)')" />
            <x-text-input id="tarifs" class="block mt-1 w-full" type="number" min="1" name="tarifs"
                :value="old('tarifs')" required autofocus autocomplete="tarifs" />
            <x-input-error :messages="$errors->get('tarifs')" class="mt-2" />
        </div><br>

        <div>
            <select name="service_id" class="form-select" aria-label="Default select example">
                <option selected disabled>Choisir votre service :</option>
                @foreach ($services as $item)
                    <option value="{{ $item->id }}">{{ $item->nom }}</option>
                @endforeach
            </select>
        </div><br>

        <div>
            <x-input-label for="Task_Location" :value="__('Task_Location')" />
            <x-text-input id="Task_Location" class="block mt-1 w-full" type="text" min="1" name="Task_Location"
                :value="old('Task_Location')" required autofocus autocomplete="Task_Location" />
            <x-input-error :messages="$errors->get('Task_Location')" class="mt-2" />
        </div><br>

        <x-primary-button class="ml-4">
            {{ __('Register') }}
        </x-primary-button>
    </form>
</x-guest-layout>
