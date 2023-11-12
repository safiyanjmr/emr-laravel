<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Visit ----') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('visits.update', $visit) }}">
                        @csrf
                        @method('PUT')

                        <!-- Date -->
                        <div>
                            <x-input-label for="date" :value="__('Date')" />
                            <x-text-input id="date" class="block mt-1 w-full" type="date" value="{{ $visit->date }}" name="date" required autofocus autocomplete="date" />
                            <x-input-error :messages="$errors->get('date')" class="mt-2" />
                        </div>

                        <!-- Complaint -->
                        <div>
                            <x-input-label for="complaint" :value="__('Complaint')" />
                            <x-text-input id="complaint" class="block mt-1 w-full" type="text" value="{{ $visit->complaint }}" name="complaint" required autofocus autocomplete="complaint" />
                            <x-input-error :messages="$errors->get('complaint')" class="mt-2" />
                        </div>

                        <!-- Diagnosis -->
                        <div>
                            <x-input-label for="diagnosis" :value="__('Diagnosis')" />
                            <x-text-input id="diagnosis" class="block mt-1 w-full" type="text" value="{{ $visit->diagnosis }}" name="diagnosis" required autofocus autocomplete="diagnosis" />
                            <x-input-error :messages="$errors->get('diagnosis')" class="mt-2" />
                        </div>

                        <!-- Treatment -->
                        <div>
                            <x-input-label for="treatment" :value="__('Treatment')" />
                            <x-text-input id="treatment" class="block mt-1 w-full" type="text" value="{{ $visit->treatment }}" name="treatment" required autofocus autocomplete="treatment" />
                            <x-input-error :messages="$errors->get('treatment')" class="mt-2" />
                        </div>

                        <!-- Prescription -->
                        <div>
                            <x-input-label for="prescription" :value="__('Prescription')" />
                            <x-text-input id="prescription" class="block mt-1 w-full" type="text" value="{{ $visit->prescription }}" name="complaint" required autofocus autocomplete="prescription" />
                            <x-input-error :messages="$errors->get('prescription')" class="mt-2" />
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
