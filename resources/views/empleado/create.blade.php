<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
                {{ __('Crear Empleado') }}
            </h2>
    </x-slot>

    <!-- Incluir Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-800">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('empleado.store') }}" method="POST">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Número -->
                            <div class="mb-4">
                                <label for="numero" class="block text-gray-700 dark:text-white font-bold mb-2">
                                    {{ __('Número') }} <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="numero" id="numero" class="w-full px-3 py-2 border-gray-300 focus:border-gray-400 focus:ring-gray-50 focus:dark:ring-gray-600 rounded-md shadow-sm dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 @error('numero') border-red-500 @enderror" value="{{ old('numero') }}" required>
                                @error('numero')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Nombre -->
                            <div class="mb-4">
                                <label for="nombre" class="block text-gray-700 dark:text-white  font-bold mb-2">
                                    {{ __('Nombre') }} <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="nombre" id="nombre" class="w-full px-3 py-2 border-gray-300 focus:border-gray-400 focus:ring-gray-50 focus:dark:ring-gray-600 rounded-md shadow-sm dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 @error('nombre') border-red-500 @enderror" value="{{ old('nombre') }}" required>
                                @error('nombre')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Área -->
                            <div class="mb-4">
                                <div class="flex justify-between items-center mb-2">
                                    <label for="area_id" class="block text-gray-700 dark:text-white font-bold">
                                        {{ __('Área') }} <span class="text-red-500">*</span>
                                    </label>
                                    <button type="button" id="openAreaModal" class="text-blue-600 hover:text-blue-900 font-bold text-sm">
                                        + {{ __('Nuevo') }}
                                    </button>
                                </div>
                                <select name="area_id" id="area_id" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('area_id') border-red-500 @enderror select2-area" required>
                                    <option value="">{{ __('Selecciona un área') }}</option>
                                    @foreach ($areas as $area)
                                        <option value="{{ $area->id }}" {{ old('area_id') == $area->id ? 'selected' : '' }}>
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
                                <div class="flex justify-between items-center mb-2">
                                    <label for="puesto_id" class="block text-gray-700 dark:text-white font-bold">
                                        {{ __('Puesto') }} <span class="text-red-500">*</span>
                                    </label>
                                    <button type="button" id="openPuestoModal" class="text-blue-600 hover:text-blue-900 font-bold text-sm">
                                        + {{ __('Nuevo') }}
                                    </button>
                                </div>
                                <select name="puesto_id" id="puesto_id" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('puesto_id') border-red-500 @enderror select2-puesto" required>
                                    <option value="">{{ __('Selecciona un puesto') }}</option>
                                    @foreach ($puestos as $puesto)
                                        <option value="{{ $puesto->id }}" {{ old('puesto_id') == $puesto->id ? 'selected' : '' }}>
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
                                <div class="flex justify-between items-center mb-2">
                                    <label for="campus_id" class="block text-gray-700 dark:text-white font-bold">
                                        {{ __('Campus') }} <span class="text-red-500">*</span>
                                    </label>
                                    <button type="button" id="openCampusModal" class="text-blue-600 hover:text-blue-900 font-bold text-sm">
                                        + {{ __('Nuevo') }}
                                    </button>
                                </div>
                                <select name="campus_id" id="campus_id" class="appearance-none w-full px-4 py-2 border rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 @error('campus_id') border-red-500 @enderror select2-campus" required>
                                    <option value="">{{ __('Selecciona un campus') }}</option>
                                    @foreach ($campuses as $campus)
                                        <option value="{{ $campus->id }}" {{ old('campus_id') == $campus->id ? 'selected' : '' }}>
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
                                {{ __('Guardar') }}
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

    <!-- Modal para crear nueva área -->
    <div id="areaModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg w-96">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold text-gray-800">{{ __('Crear Nueva Área') }}</h3>
                    <button type="button" id="closeAreaModal" class="text-gray-500 hover:text-gray-700 text-2xl">
                        &times;
                    </button>
                </div>

                <form id="areaForm">
                    @csrf
                    <div class="mb-4">
                        <label for="areaNombre" class="block text-gray-700 dark:text-white font-bold mb-2">
                            {{ __('Nombre del Área') }}
                        </label>
                        <input type="text" id="areaNombre" name="nombre" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                        <p id="areaFormError" class="text-red-500 text-sm mt-1 hidden"></p>
                        <p id="areaFormSuccess" class="text-green-500 text-sm mt-1 hidden">{{ __('Área creada exitosamente') }}</p>
                    </div>

                    <div class="flex gap-4">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded flex-1">
                            {{ __('Guardar Área') }}
                        </button>
                        <button type="button" id="closeAreaModalBtn" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded flex-1">
                            {{ __('Cancelar') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal para crear nuevo puesto -->
    <div id="puestoModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg w-96">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold text-gray-800">{{ __('Crear Nuevo Puesto') }}</h3>
                    <button type="button" id="closePuestoModal" class="text-gray-500 hover:text-gray-700 text-2xl">
                        &times;
                    </button>
                </div>

                <form id="puestoForm">
                    @csrf
                    <div class="mb-4">
                        <label for="puestoNombre" class="block text-gray-700 dark:text-white font-bold mb-2">
                            {{ __('Nombre del Puesto') }}
                        </label>
                        <input type="text" id="puestoNombre" name="nombre" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                        <p id="puestoFormError" class="text-red-500 text-sm mt-1 hidden"></p>
                        <p id="puestoFormSuccess" class="text-green-500 text-sm mt-1 hidden">{{ __('Puesto creado exitosamente') }}</p>
                    </div>

                    <div class="flex gap-4">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded flex-1">
                            {{ __('Guardar Puesto') }}
                        </button>
                        <button type="button" id="closePuestoModalBtn" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded flex-1">
                            {{ __('Cancelar') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal para crear nuevo campus -->
    <div id="campusModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg w-96">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold text-gray-800">{{ __('Crear Nuevo Campus') }}</h3>
                    <button type="button" id="closeCampusModal" class="text-gray-500 hover:text-gray-700 text-2xl">
                        &times;
                    </button>
                </div>

                <form id="campusForm">
                    @csrf
                    <div class="mb-4">
                        <label for="campusNombre" class="block text-gray-700 dark:text-white font-bold mb-2">
                            {{ __('Nombre del Campus') }}
                        </label>
                        <input type="text" id="campusNombre" name="nombre" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                        <p id="campusFormError" class="text-red-500 text-sm mt-1 hidden"></p>
                        <p id="campusFormSuccess" class="text-green-500 text-sm mt-1 hidden">{{ __('Campus creado exitosamente') }}</p>
                    </div>

                    <div class="flex gap-4">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded flex-1">
                            {{ __('Guardar Campus') }}
                        </button>
                        <button type="button" id="closeCampusModalBtn" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded flex-1">
                            {{ __('Cancelar') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Incluir Select2 JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            // Inicializar Select2 para los campos
            $('.select2-area, .select2-puesto, .select2-campus').select2({
                allowClear: true,
                language: {
                    noResults: function() {
                        return "{{ __('No se encontraron resultados') }}";
                    }
                }
            });

            // ===== MODAL ÁREA =====
            $('#openAreaModal').click(function(e) {
                e.preventDefault();
                $('#areaModal').removeClass('hidden');
                $('#areaNombre').focus();
            });

            $('#closeAreaModal, #closeAreaModalBtn').click(function() {
                $('#areaModal').addClass('hidden');
                $('#areaForm')[0].reset();
                $('#areaFormError').addClass('hidden');
                $('#areaFormSuccess').addClass('hidden');
            });

            $('#areaModal').click(function(e) {
                if (e.target === this) {
                    $(this).addClass('hidden');
                    $('#areaForm')[0].reset();
                }
            });

            $('#areaForm').submit(function(e) {
                e.preventDefault();
                var nombre = $('#areaNombre').val().trim();

                if (!nombre) {
                    $('#areaFormError').text("{{ __('El nombre del área es requerido') }}").removeClass('hidden');
                    return;
                }

                $.ajax({
                    url: "{{ route('area.store') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        nombre: nombre
                    },
                    success: function(response) {
                        if (response.success) {
                            var newOption = new Option(response.area.nombre, response.area.id, false, true);
                            $('.select2-area').append(newOption).trigger('change');

                            $('#areaFormSuccess').removeClass('hidden');
                            setTimeout(function() {
                                $('#areaModal').addClass('hidden');
                                $('#areaForm')[0].reset();
                                $('#areaFormSuccess').addClass('hidden');
                            }, 1500);
                        }
                    },
                    error: function(xhr) {
                        var errors = xhr.responseJSON.errors;
                        if (errors && errors.nombre) {
                            $('#areaFormError').text(errors.nombre[0]).removeClass('hidden');
                        } else {
                            $('#areaFormError').text("{{ __('Error al crear el área') }}").removeClass('hidden');
                        }
                    }
                });
            });

            // ===== MODAL PUESTO =====
            $('#openPuestoModal').click(function(e) {
                e.preventDefault();
                $('#puestoModal').removeClass('hidden');
                $('#puestoNombre').focus();
            });

            $('#closePuestoModal, #closePuestoModalBtn').click(function() {
                $('#puestoModal').addClass('hidden');
                $('#puestoForm')[0].reset();
                $('#puestoFormError').addClass('hidden');
                $('#puestoFormSuccess').addClass('hidden');
            });

            $('#puestoModal').click(function(e) {
                if (e.target === this) {
                    $(this).addClass('hidden');
                    $('#puestoForm')[0].reset();
                }
            });

            $('#puestoForm').submit(function(e) {
                e.preventDefault();
                var nombre = $('#puestoNombre').val().trim();

                if (!nombre) {
                    $('#puestoFormError').text("{{ __('El nombre del puesto es requerido') }}").removeClass('hidden');
                    return;
                }

                $.ajax({
                    url: "{{ route('puesto.store') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        nombre: nombre
                    },
                    success: function(response) {
                        if (response.success) {
                            var newOption = new Option(response.puesto.nombre, response.puesto.id, false, true);
                            $('.select2-puesto').append(newOption).trigger('change');

                            $('#puestoFormSuccess').removeClass('hidden');
                            setTimeout(function() {
                                $('#puestoModal').addClass('hidden');
                                $('#puestoForm')[0].reset();
                                $('#puestoFormSuccess').addClass('hidden');
                            }, 1500);
                        }
                    },
                    error: function(xhr) {
                        var errors = xhr.responseJSON.errors;
                        if (errors && errors.nombre) {
                            $('#puestoFormError').text(errors.nombre[0]).removeClass('hidden');
                        } else {
                            $('#puestoFormError').text("{{ __('Error al crear el puesto') }}").removeClass('hidden');
                        }
                    }
                });
            });

            // ===== MODAL CAMPUS =====
            $('#openCampusModal').click(function(e) {
                e.preventDefault();
                $('#campusModal').removeClass('hidden');
                $('#campusNombre').focus();
            });

            $('#closeCampusModal, #closeCampusModalBtn').click(function() {
                $('#campusModal').addClass('hidden');
                $('#campusForm')[0].reset();
                $('#campusFormError').addClass('hidden');
                $('#campusFormSuccess').addClass('hidden');
            });

            $('#campusModal').click(function(e) {
                if (e.target === this) {
                    $(this).addClass('hidden');
                    $('#campusForm')[0].reset();
                }
            });

            $('#campusForm').submit(function(e) {
                e.preventDefault();
                var nombre = $('#campusNombre').val().trim();

                if (!nombre) {
                    $('#campusFormError').text("{{ __('El nombre del campus es requerido') }}").removeClass('hidden');
                    return;
                }

                $.ajax({
                    url: "{{ route('campus.store') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        nombre: nombre
                    },
                    success: function(response) {
                        if (response.success) {
                            var newOption = new Option(response.campus.nombre, response.campus.id, false, true);
                            $('.select2-campus').append(newOption).trigger('change');

                            $('#campusFormSuccess').removeClass('hidden');
                            setTimeout(function() {
                                $('#campusModal').addClass('hidden');
                                $('#campusForm')[0].reset();
                                $('#campusFormSuccess').addClass('hidden');
                            }, 1500);
                        }
                    },
                    error: function(xhr) {
                        var errors = xhr.responseJSON.errors;
                        if (errors && errors.nombre) {
                            $('#campusFormError').text(errors.nombre[0]).removeClass('hidden');
                        } else {
                            $('#campusFormError').text("{{ __('Error al crear el campus') }}").removeClass('hidden');
                        }
                    }
                });
            });
        });
    </script>
</x-app-layout>
