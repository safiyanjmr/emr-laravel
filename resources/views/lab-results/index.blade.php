<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Results') }}
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
                                        Patient
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Test Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Result
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Test Date
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Physician Comments
                                    </th>

                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($results as $result)
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td class="px-6 py-3">
                                        {{ $result->test_name }}
                                    </td>
                                    <td class="px-6 py-3">
                                    {{ $result->result }}
                                    </td>
                                    <td class="px-6 py-3">
                                        {{ $result->test_date }}
                                    </td>
                                    <td class="px-6 py-3">
                                        {{ $result->physician_comments }}
                                    </td>

                                    <td class="px-6 py-3">
                                        <a class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                            href="{{ route('lab-results.edit', $result) }}">Edit</a>
                                        <form class="inline" action="{{ route('lab-results.destroy', $result) }}" method="POST">
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

                        <div class="flex justify-center items-center text-sm mt-4">{{ $results->links() }}</div>

                        <div class="flex items-center justify-end mt-2">
                            <x-primary-link href="{{ route('lab-results.create') }}">
                                {{ __('Add New') }}
                            </x-primary-link>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
