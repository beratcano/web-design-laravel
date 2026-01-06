<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            TEST TITLE
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center mb-4">
                        <h1 class="text-xl font-bold">Customer List</h1>
                        <a href="{{ route('customers.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition">
                            Add Customer
                        </a>
                    </div>
                    @foreach ($customers as $customer)
                        <div class="mb-4">
                            <p>{{ $customer->name }} {{ $customer->surname }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
