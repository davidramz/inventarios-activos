<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles del Puesto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">{{ __('ID') }}</label>
                        <p class="text-gray-600">{{ $puesto->id }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">{{ __('Nombre') }}</label>
                        <p class="text-gray-600">{{ $puesto->nombre }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">{{ __('Creado') }}</label>
                        <p class="text-gray-600">{{ $puesto->created_at->format('d/m/Y H:i') }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">{{ __('Actualizado') }}</label>
                        <p class="text-gray-600">{{ $puesto->updated_at->format('d/m/Y H:i') }}</p>
                    </div>

                    <div class="flex gap-4">
                        <a href="{{ route('puesto.edit', $puesto->id) }}" class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Editar') }}
                        </a>
                        <a href="{{ route('puesto.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Volver') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
