<!-- resources/views/profile/partials/update-verification-documents-form.blade.php -->

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Vérification des informations') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Submit your identity document (passport or national ID) and a utility bill (water or electricity).') }}
        </p>
    </header>

    <form method="POST" action="{{ route('verification.submit') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf

        <div>
            <x-input-label for="identity_document" :value="__('Identity Document')" />
            <x-text-input id="identity_document" type="file" name="identity_document" class="mt-1 block w-full" required />
            <x-input-error class="mt-2" :messages="$errors->get('identity_document')" />
        </div>

        <div>
            <x-input-label for="utility_bill" :value="__('Utility Bill')" />
            <x-text-input id="utility_bill" type="file" name="utility_bill" class="mt-1 block w-full" required />
            <x-input-error class="mt-2" :messages="$errors->get('utility_bill')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Submit') }}</x-primary-button>
        </div>
    </form>
</section>
