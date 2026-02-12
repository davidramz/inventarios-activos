<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Campus') }}
            </h2>
            <a href="{{ route('campus.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                {{ __('Crear Campus') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($message = Session::get('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ $message }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($campuses->isEmpty())
                        <p class="text-gray-500">No hay campus registrados.</p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full border-collapse border border-gray-300">
                                <thead class="bg-gray-200">
                                    <tr>
                                        <th class="border border-gray-300 px-4 py-2 text-left">{{ __('ID') }}</th>
                                        <th class="border border-gray-300 px-4 py-2 text-left">{{ __('Nombre') }}</th>
                                        <th class="border border-gray-300 px-4 py-2 text-center">{{ __('Acciones') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($campuses as $campus)
                                        <tr class="hover:bg-gray-50">
                                            <td class="border border-gray-300 px-4 py-2">{{ $campus->id }}</td>
                                            <td class="border border-gray-300 px-4 py-2">{{ $campus->nombre }}</td>
                                            <td class="border border-gray-300 px-4 py-2 text-center">
                                                <a href="{{ route('campus.show', $campus->id) }}" class="text-blue-600 hover:text-blue-900 mr-2">
                                                    {{ __('Ver') }}
                                                </a>
                                                <a href="{{ route('campus.edit', $campus->id) }}" class="text-yellow-600 hover:text-yellow-900 mr-2">
                                                    {{ __('Editar') }}
                                                </a>
                                                <form action="{{ route('campus.destroy', $campus->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este campus?');">
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
