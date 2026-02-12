<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('Detalles del Área') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-800">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200 font-bold mb-2">{{ __('ID') }}</label>
                        <p class="text-gray-600 dark:text-gray-400">{{ $area->id }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200 font-bold mb-2">{{ __('Nombre') }}</label>
                        <p class="text-gray-600 dark:text-gray-400">{{ $area->nombre }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200 font-bold mb-2">{{ __('Creado') }}</label>
                        <p class="text-gray-600 dark:text-gray-400">{{ $area->created_at->format('d/m/Y H:i') }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200 font-bold mb-2">{{ __('Actualizado') }}</label>
                        <p class="text-gray-600 dark:text-gray-400">{{ $area->updated_at->format('d/m/Y H:i') }}</p>
                    </div>

                    <div class="flex gap-4">
                        <a href="{{ route('area.edit', $area->id) }}" class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Editar') }}
                        </a>
                        <a href="{{ route('area.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Volver') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
