<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('Detalles del Empleado') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-800">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">{{ __('ID') }}</label>
                            <p class="text-gray-600">{{ $empleado->id }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">{{ __('Número') }}</label>
                            <p class="text-gray-600">{{ $empleado->numero }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">{{ __('Nombre') }}</label>
                            <p class="text-gray-600">{{ $empleado->nombre }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">{{ __('Área') }}</label>
                            <p class="text-gray-600">{{ $empleado->area->nombre ?? 'N/A' }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">{{ __('Puesto') }}</label>
                            <p class="text-gray-600">{{ $empleado->puesto->nombre ?? 'N/A' }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">{{ __('Campus') }}</label>
                            <p class="text-gray-600">{{ $empleado->campus->nombre ?? 'N/A' }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">{{ __('Creado') }}</label>
                            <p class="text-gray-600">{{ $empleado->created_at->format('d/m/Y H:i') }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">{{ __('Actualizado') }}</label>
                            <p class="text-gray-600">{{ $empleado->updated_at->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>

                    <div class="flex gap-4 mt-6">
                        <a href="{{ route('empleado.edit', $empleado->id) }}" class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Editar') }}
                        </a>
                        <a href="{{ route('empleado.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Volver') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
