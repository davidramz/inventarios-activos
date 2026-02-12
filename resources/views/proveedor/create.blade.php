<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('Crear Proveedor') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-800">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('proveedor.store') }}" method="POST">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Código -->
                            <div class="mb-4">
                                <label for="codigo" class="block text-gray-700 font-bold mb-2">
                                    {{ __('Código') }} <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="codigo" id="codigo" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('codigo') border-red-500 @enderror" value="{{ old('codigo') }}" required>
                                @error('codigo')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Nombre -->
                            <div class="mb-4">
                                <label for="nombre" class="block text-gray-700 font-bold mb-2">
                                    {{ __('Nombre') }} <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="nombre" id="nombre" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('nombre') border-red-500 @enderror" value="{{ old('nombre') }}" required>
                                @error('nombre')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- RFC -->
                            <div class="mb-4">
                                <label for="rfc" class="block text-gray-700 font-bold mb-2">
                                    {{ __('RFC') }}
                                </label>
                                <input type="text" name="rfc" id="rfc" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('rfc') border-red-500 @enderror" value="{{ old('rfc') }}">
                                @error('rfc')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Giro -->
                            <div class="mb-4">
                                <label for="giro" class="block text-gray-700 font-bold mb-2">
                                    {{ __('Giro') }}
                                </label>
                                <input type="text" name="giro" id="giro" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('giro') border-red-500 @enderror" value="{{ old('giro') }}">
                                @error('giro')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Calle -->
                            <div class="mb-4">
                                <label for="calle" class="block text-gray-700 font-bold mb-2">
                                    {{ __('Calle') }}
                                </label>
                                <input type="text" name="calle" id="calle" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('calle') border-red-500 @enderror" value="{{ old('calle') }}">
                                @error('calle')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Colonia -->
                            <div class="mb-4">
                                <label for="colonia" class="block text-gray-700 font-bold mb-2">
                                    {{ __('Colonia') }}
                                </label>
                                <input type="text" name="colonia" id="colonia" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('colonia') border-red-500 @enderror" value="{{ old('colonia') }}">
                                @error('colonia')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Código Postal -->
                            <div class="mb-4">
                                <label for="cp" class="block text-gray-700 font-bold mb-2">
                                    {{ __('Código Postal') }}
                                </label>
                                <input type="text" name="cp" id="cp" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('cp') border-red-500 @enderror" value="{{ old('cp') }}">
                                @error('cp')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Ciudad -->
                            <div class="mb-4">
                                <label for="ciudad" class="block text-gray-700 font-bold mb-2">
                                    {{ __('Ciudad') }}
                                </label>
                                <input type="text" name="ciudad" id="ciudad" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('ciudad') border-red-500 @enderror" value="{{ old('ciudad') }}">
                                @error('ciudad')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Estado -->
                            <div class="mb-4">
                                <label for="estado" class="block text-gray-700 font-bold mb-2">
                                    {{ __('Estado') }}
                                </label>
                                <input type="text" name="estado" id="estado" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('estado') border-red-500 @enderror" value="{{ old('estado') }}">
                                @error('estado')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Teléfono -->
                            <div class="mb-4">
                                <label for="telefono" class="block text-gray-700 font-bold mb-2">
                                    {{ __('Teléfono') }}
                                </label>
                                <input type="text" name="telefono" id="telefono" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('telefono') border-red-500 @enderror" value="{{ old('telefono') }}">
                                @error('telefono')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex gap-4 mt-6">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                {{ __('Guardar') }}
                            </button>
                            <a href="{{ route('proveedor.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                {{ __('Cancelar') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
