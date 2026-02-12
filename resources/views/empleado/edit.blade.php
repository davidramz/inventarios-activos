<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('Editar Empleado') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-800">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('empleado.update', $empleado->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Número -->
                            <div class="mb-4">
                                <label for="numero" class="block text-gray-700 font-bold mb-2">
                                    {{ __('Número') }} <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="numero" id="numero" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('numero') border-red-500 @enderror" value="{{ old('numero', $empleado->numero) }}" required>
                                @error('numero')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Nombre -->
                            <div class="mb-4">
                                <label for="nombre" class="block text-gray-700 font-bold mb-2">
                                    {{ __('Nombre') }} <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="nombre" id="nombre" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('nombre') border-red-500 @enderror" value="{{ old('nombre', $empleado->nombre) }}" required>
                                @error('nombre')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Área -->
                            <div class="mb-4">
                                <label for="area_id" class="block text-gray-700 font-bold mb-2">
                                    {{ __('Área') }} <span class="text-red-500">*</span>
                                </label>
                                <select name="area_id" id="area_id" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('area_id') border-red-500 @enderror" required>
                                    <option value="">{{ __('Selecciona un área') }}</option>
                                    @foreach ($areas as $area)
                                        <option value="{{ $area->id }}" {{ old('area_id', $empleado->area_id) == $area->id ? 'selected' : '' }}>
                                            {{ $area->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('area_id')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Puesto -->
                            <div class="mb-4">
                                <label for="puesto_id" class="block text-gray-700 font-bold mb-2">
                                    {{ __('Puesto') }} <span class="text-red-500">*</span>
                                </label>
                                <select name="puesto_id" id="puesto_id" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('puesto_id') border-red-500 @enderror" required>
                                    <option value="">{{ __('Selecciona un puesto') }}</option>
                                    @foreach ($puestos as $puesto)
                                        <option value="{{ $puesto->id }}" {{ old('puesto_id', $empleado->puesto_id) == $puesto->id ? 'selected' : '' }}>
                                            {{ $puesto->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('puesto_id')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Campus -->
                            <div class="mb-4">
                                <label for="campus_id" class="block text-gray-700 font-bold mb-2">
                                    {{ __('Campus') }} <span class="text-red-500">*</span>
                                </label>
                                <select name="campus_id" id="campus_id" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('campus_id') border-red-500 @enderror" required>
                                    <option value="">{{ __('Selecciona un campus') }}</option>
                                    @foreach ($campuses as $campus)
                                        <option value="{{ $campus->id }}" {{ old('campus_id', $empleado->campus_id) == $campus->id ? 'selected' : '' }}>
                                            {{ $campus->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('campus_id')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex gap-4 mt-6">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                {{ __('Actualizar') }}
                            </button>
                            <a href="{{ route('empleado.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                {{ __('Cancelar') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
