<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Medications') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="relative overflow-x-auto  sm:rounded-lg">

                        <x-flash />

                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        S/N
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Medication Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Dosage
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Instructions
                                    </th>
{{--                                    <th scope="col" class="px-6 py-3">--}}
{{--                                        Physician Id--}}
{{--                                    </th>--}}
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($medications as $medication)
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td class="px-6 py-3">
                                        {{ $medication->medication_name }}
                                    </td>
                                    <td class="px-6 py-3">
                                    {{ $medication->dosage }}
                                    </td>
                                    <td class="px-6 py-3">
                                        {{ $medication->instructions }}
                                    </td>

                                    <td class="px-6 py-3">
                                        <a class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                            href="{{ route('medications.edit', $medication) }}">Edit</a>
                                        <form class="inline" action="{{ route('medications.destroy', $medication) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <x-danger-button onclick="return confirm('Are you sure about this?')" class="ml-3">
                                                {{ __('Delete') }}
                                            </x-danger-button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="flex justify-center items-center text-sm mt-4">{{ $medications->links() }}</div>

                        <div class="flex items-center justify-end mt-2">
                            <x-primary-link href="{{ route('medications.create') }}">
                                {{ __('Add New') }}
                            </x-primary-link>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
