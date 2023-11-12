<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Medication') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('medications.store') }}">
                        @csrf

                        <!-- Medication Name -->
                        <div>
                            <x-input-label for="medication_name" :value="__('Medication Name')" />
                            <x-text-input id="medication_name" class="block mt-1 w-full" type="text" name="medication_name" required autofocus autocomplete="medication_name" />
                            <x-input-error :messages="$errors->get('medication_name')" class="mt-2" />
                        </div>

                        <!-- Dosage -->
                        <div class="mt-4">
                            <x-input-label for="dosage" :value="__('Dosage')" />
                            <x-text-input id="dosage" class="block mt-1 w-full" type="text" name="dosage" required autofocus autocomplete="dosage" />
                            <x-input-error :messages="$errors->get('dosage')" class="mt-2" />
                        </div>

                        <!-- Instructions -->
                        <div class="mt-4">
                            <x-input-label for="instructions" :value="__('Instructions')" />
                            <x-text-input id="instructions" class="block mt-1 w-full" type="text" name="instructions" required autofocus autocomplete="instructions" />
                            <x-input-error :messages="$errors->get('instructions')" class="mt-2" />
                        </div>

                        <!-- Patient-->
                        <div class="mt-4">
                            <x-input-label for="patient_id" :value="__('Patient')" />
                            <select name="patient_id" id="patient_id" class="block mt-1 w-full rounded-md form-input focus:border-indigo-600">
                                @foreach($patients as $patient)
                                    <option value="{{ $patient->id }}">{{ $patient->full_name  }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('patient_id')" class="mt-2" />
                        </div>

                        <!-- Physician-->
                        <div class="mt-4">
                            <x-input-label for="physician_id" :value="__('Physician')" />
                            <select name="physician_id" id="physician_id" class="block mt-1 w-full rounded-md form-input focus:border-indigo-600">
                                @foreach($physicians as $physician)
                                    <option value="{{ $physician->id }}">{{ $physician->full_name  }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('physician_id')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button type="submit" class="ml-4">
                                {{ __('Submit') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
