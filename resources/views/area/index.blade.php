<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
                {{ __('Áreas') }}
            </h2>
            <a href="{{ route('area.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                {{ __('Crear Área') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($message = Session::get('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded dark:bg-green-900 dark:border-green-700 dark:text-green-200">
                    {{ $message }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-800">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($areas->isEmpty())
                        <p class="text-gray-500">No hay áreas registradas.</p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full border-collapse border border-gray-300 dark:border-gray-600">
                                <thead class="bg-gray-200 dark:bg-gray-700">
                                    <tr>
                                        <th class="border border-gray-300 px-4 py-2 text-left">{{ __('ID') }}</th>
                                        <th class="border border-gray-300 px-4 py-2 text-left">{{ __('Nombre') }}</th>
                                        <th class="border border-gray-300 px-4 py-2 text-center">{{ __('Acciones') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($areas as $area)
                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                            <td class="border border-gray-300 px-4 py-2">{{ $area->id }}</td>
                                            <td class="border border-gray-300 px-4 py-2">{{ $area->nombre }}</td>
                                            <td class="border border-gray-300 px-4 py-2 text-center">
                                                <a href="{{ route('area.show', $area->id) }}" class="text-blue-600 hover:text-blue-900 mr-2">
                                                    {{ __('Ver') }}
                                                </a>
                                                <a href="{{ route('area.edit', $area->id) }}" class="text-yellow-600 hover:text-yellow-900 mr-2">
                                                    {{ __('Editar') }}
                                                </a>
                                                <form action="{{ route('area.destroy', $area->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta área?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900">
                                                        {{ __('Eliminar') }}
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
