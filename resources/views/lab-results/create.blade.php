<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Lab Result') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('lab-results.store') }}">
                        @csrf

                        <!-- Test Name -->
                        <div>
                            <x-input-label for="test_name" :value="__('Test Name')" />
                            <x-text-input id="test_name" class="block mt-1 w-full" type="text" name="test_name" required autofocus autocomplete="test_name" />
                            <x-input-error :messages="$errors->get('test_name')" class="mt-2" />
                        </div>

                        <!-- Result -->
                        <div class="mt-4">
                            <x-input-label for="result" :value="__('Result')" />
                            <x-text-input id="result" class="block mt-1 w-full" type="text" name="result" required autofocus autocomplete="result" />
                            <x-input-error :messages="$errors->get('result')" class="mt-2" />
                        </div>

                        <!-- Test Date -->
                        <div class="mt-4">
                            <x-input-label for="test_date" :value="__('Test Date')" />
                            <x-text-input id="test_date" class="block mt-1 w-full" type="date" name="test_date" required autofocus autocomplete="test_date" />
                            <x-input-error :messages="$errors->get('test_date')" class="mt-2" />
                        </div>

                        <!-- Physician Comments -->
                        <div class="mt-4">
                            <x-input-label for="physician_comments" :value="__('Physician Comments')" />
                            <x-text-input id="physician_comments" class="block mt-1 w-full" type="text" name="physician_comments" required autofocus autocomplete="physician_comments" />
                            <x-input-error :messages="$errors->get('physician_comments')" class="mt-2" />
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
