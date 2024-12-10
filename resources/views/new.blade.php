<x-app-layout>

    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 bg-gray-200 py-4">

        <form method="post" action="{{ route('create') }}">
            @csrf

            <h1 class="text-lg font-bold mb-4">Nuevo Producto</h1>

            <div class="grid gap-6 mb-6 md:grid-cols-2">

                <div class="my-0">
                    <label>
                        <span class="block text-gray-600">Nombre</span>
                        <input required name="name" value="{{ old('name') ? : null }}" type="text" class="rounded-lg" autocomplete="no">
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </label>
                </div>

                <div class="my-0">
                    <label>
                        <span class="block text-gray-600">Precio</span>
                        <input required id="price" name="price" value="{{ old('price') ? : 0.00 }}" type="number" class="rounded-lg" step="0.01">
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </label>
                </div>

                <div class="my-0">
                    <label>
                        <span class="block text-gray-600">Stock</span>
                        <input required name="stock" value="{{ old('stock') ? : 0 }}" type="number" class="rounded-lg" step="1">
                        <x-input-error :messages="$errors->get('stock')" class="mt-2" />
                    </label>
                </div>

                <div class="my-0">
                    <label>
                        <span class="block text-gray-600">Activo</span>
                        <fieldset id="active">

                            <div class="grid gap-6 mb-6 md:grid-cols-2">
                                <label>
                                    <span class="text-gray-600">Sí</span>
                                    <input type="radio" value="1" name="active" checked>
                                </label>
                                <label>
                                    <span class="text-gray-600">No</span>
                                    <input type="radio" value="0" name="active">
                                </label>
                            </div>
                        </fieldset>
                    </label>
                </div>

                <div class="my-4">
                    <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg border-2 border-blue-300">Crear Producto</button>
                </div>

            </div>

        </form>

    </div>


</x-app-layout>
