<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
                {{ __('Crear Empleado') }}
            </h2>
    </x-slot>

    <!-- Incluir Tom Select CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2/dist/css/tom-select.bootstrap5.min.css" rel="stylesheet" />

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
                                <select name="area_id" id="area_id" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('area_id') border-red-500 @enderror tom-select-area" required>
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
                                <select name="puesto_id" id="puesto_id" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('puesto_id') border-red-500 @enderror tom-select-puesto" required>
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
                                <select name="campus_id" id="campus_id" class="appearance-none w-full px-4 py-2 border rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 @error('campus_id') border-red-500 @enderror tom-select-campus" required>
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

    <!-- Incluir Tom Select JS -->
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2/dist/js/tom-select.complete.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inicializar Tom Select para los campos
            const tomSelectArea = new TomSelect('#area_id', {
                allowEmptyOption: true,
                placeholder: "{{ __('Selecciona un área') }}"
            });

            const tomSelectPuesto = new TomSelect('#puesto_id', {
                allowEmptyOption: true,
                placeholder: "{{ __('Selecciona un puesto') }}"
            });

            const tomSelectCampus = new TomSelect('#campus_id', {
                allowEmptyOption: true,
                placeholder: "{{ __('Selecciona un campus') }}"
            });

            // ===== MODAL ÁREA =====
            document.getElementById('openAreaModal').addEventListener('click', function(e) {
                e.preventDefault();
                document.getElementById('areaModal').classList.remove('hidden');
                document.getElementById('areaNombre').focus();
            });

            const areaModalClosers = document.querySelectorAll('#closeAreaModal, #closeAreaModalBtn');
            areaModalClosers.forEach(btn => {
                btn.addEventListener('click', function() {
                    document.getElementById('areaModal').classList.add('hidden');
                    document.getElementById('areaForm').reset();
                    document.getElementById('areaFormError').classList.add('hidden');
                    document.getElementById('areaFormSuccess').classList.add('hidden');
                });
            });

            document.getElementById('areaModal').addEventListener('click', function(e) {
                if (e.target === this) {
                    this.classList.add('hidden');
                    document.getElementById('areaForm').reset();
                }
            });

            document.getElementById('areaForm').addEventListener('submit', function(e) {
                e.preventDefault();
                var nombre = document.getElementById('areaNombre').value.trim();

                if (!nombre) {
                    document.getElementById('areaFormError').textContent = "{{ __('El nombre del área es requerido') }}";
                    document.getElementById('areaFormError').classList.remove('hidden');
                    return;
                }

                fetch("{{ route('area.store') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        nombre: nombre
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        tomSelectArea.addOption({value: data.area.id, text: data.area.nombre});
                        tomSelectArea.setValue(data.area.id);

                        document.getElementById('areaFormSuccess').classList.remove('hidden');
                        setTimeout(function() {
                            document.getElementById('areaModal').classList.add('hidden');
                            document.getElementById('areaForm').reset();
                            document.getElementById('areaFormSuccess').classList.add('hidden');
                        }, 1500);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.getElementById('areaFormError').textContent = "{{ __('Error al crear el área') }}";
                    document.getElementById('areaFormError').classList.remove('hidden');
                });
            });

            // ===== MODAL PUESTO =====
            document.getElementById('openPuestoModal').addEventListener('click', function(e) {
                e.preventDefault();
                document.getElementById('puestoModal').classList.remove('hidden');
                document.getElementById('puestoNombre').focus();
            });

            const puestoModalClosers = document.querySelectorAll('#closePuestoModal, #closePuestoModalBtn');
            puestoModalClosers.forEach(btn => {
                btn.addEventListener('click', function() {
                    document.getElementById('puestoModal').classList.add('hidden');
                    document.getElementById('puestoForm').reset();
                    document.getElementById('puestoFormError').classList.add('hidden');
                    document.getElementById('puestoFormSuccess').classList.add('hidden');
                });
            });

            document.getElementById('puestoModal').addEventListener('click', function(e) {
                if (e.target === this) {
                    this.classList.add('hidden');
                    document.getElementById('puestoForm').reset();
                }
            });

            document.getElementById('puestoForm').addEventListener('submit', function(e) {
                e.preventDefault();
                var nombre = document.getElementById('puestoNombre').value.trim();

                if (!nombre) {
                    document.getElementById('puestoFormError').textContent = "{{ __('El nombre del puesto es requerido') }}";
                    document.getElementById('puestoFormError').classList.remove('hidden');
                    return;
                }

                fetch("{{ route('puesto.store') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        nombre: nombre
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        tomSelectPuesto.addOption({value: data.puesto.id, text: data.puesto.nombre});
                        tomSelectPuesto.setValue(data.puesto.id);

                        document.getElementById('puestoFormSuccess').classList.remove('hidden');
                        setTimeout(function() {
                            document.getElementById('puestoModal').classList.add('hidden');
                            document.getElementById('puestoForm').reset();
                            document.getElementById('puestoFormSuccess').classList.add('hidden');
                        }, 1500);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.getElementById('puestoFormError').textContent = "{{ __('Error al crear el puesto') }}";
                    document.getElementById('puestoFormError').classList.remove('hidden');
                });
            });

            // ===== MODAL CAMPUS =====
            document.getElementById('openCampusModal').addEventListener('click', function(e) {
                e.preventDefault();
                document.getElementById('campusModal').classList.remove('hidden');
                document.getElementById('campusNombre').focus();
            });

            const campusModalClosers = document.querySelectorAll('#closeCampusModal, #closeCampusModalBtn');
            campusModalClosers.forEach(btn => {
                btn.addEventListener('click', function() {
                    document.getElementById('campusModal').classList.add('hidden');
                    document.getElementById('campusForm').reset();
                    document.getElementById('campusFormError').classList.add('hidden');
                    document.getElementById('campusFormSuccess').classList.add('hidden');
                });
            });

            document.getElementById('campusModal').addEventListener('click', function(e) {
                if (e.target === this) {
                    this.classList.add('hidden');
                    document.getElementById('campusForm').reset();
                }
            });

            document.getElementById('campusForm').addEventListener('submit', function(e) {
                e.preventDefault();
                var nombre = document.getElementById('campusNombre').value.trim();

                if (!nombre) {
                    document.getElementById('campusFormError').textContent = "{{ __('El nombre del campus es requerido') }}";
                    document.getElementById('campusFormError').classList.remove('hidden');
                    return;
                }

                fetch("{{ route('campus.store') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        nombre: nombre
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        tomSelectCampus.addOption({value: data.campus.id, text: data.campus.nombre});
                        tomSelectCampus.setValue(data.campus.id);

                        document.getElementById('campusFormSuccess').classList.remove('hidden');
                        setTimeout(function() {
                            document.getElementById('campusModal').classList.add('hidden');
                            document.getElementById('campusForm').reset();
                            document.getElementById('campusFormSuccess').classList.add('hidden');
                        }, 1500);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.getElementById('campusFormError').textContent = "{{ __('Error al crear el campus') }}";
                    document.getElementById('campusFormError').classList.remove('hidden');
                });
            });
        });
    </script>
</x-app-layout>
