<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles del Proveedor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">{{ __('ID') }}</label>
                            <p class="text-gray-600">{{ $proveedor->id }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">{{ __('Código') }}</label>
                            <p class="text-gray-600">{{ $proveedor->codigo }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">{{ __('Nombre') }}</label>
                            <p class="text-gray-600">{{ $proveedor->nombre }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">{{ __('RFC') }}</label>
                            <p class="text-gray-600">{{ $proveedor->rfc ?? 'N/A' }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">{{ __('Giro') }}</label>
                            <p class="text-gray-600">{{ $proveedor->giro ?? 'N/A' }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">{{ __('Calle') }}</label>
                            <p class="text-gray-600">{{ $proveedor->calle ?? 'N/A' }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">{{ __('Colonia') }}</label>
                            <p class="text-gray-600">{{ $proveedor->colonia ?? 'N/A' }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">{{ __('Código Postal') }}</label>
                            <p class="text-gray-600">{{ $proveedor->cp ?? 'N/A' }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">{{ __('Ciudad') }}</label>
                            <p class="text-gray-600">{{ $proveedor->ciudad ?? 'N/A' }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">{{ __('Estado') }}</label>
                            <p class="text-gray-600">{{ $proveedor->estado ?? 'N/A' }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">{{ __('Teléfono') }}</label>
                            <p class="text-gray-600">{{ $proveedor->telefono ?? 'N/A' }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">{{ __('Creado') }}</label>
                            <p class="text-gray-600">{{ $proveedor->created_at->format('d/m/Y H:i') }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">{{ __('Actualizado') }}</label>
                            <p class="text-gray-600">{{ $proveedor->updated_at->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>

                    <div class="flex gap-4 mt-6">
                        <a href="{{ route('proveedor.edit', $proveedor->id) }}" class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Editar') }}
                        </a>
                        <a href="{{ route('proveedor.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Volver') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
