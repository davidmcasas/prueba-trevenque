<x-app-layout>

    <script>
        $(document).ready(function() {
            $('.product-active').on('change', function() {
                $.ajax({

                    url: "{{ route('ajax_active') }}",
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id: $(this).data('id'),
                        active: $(this).is(":checked") ? 1 : 0
                    },
                }).done(function(response) {
                    console.log(1);
                });
            });
        });
    </script>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Productos') }}
        </h2>
    </x-slot>

    @if(isset($status) && $status)
        <span>{{ $status }}</span>
    @endif

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-200 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-100">
                    <div class="relative overflow-x-auto mb-8">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-700">
                            <thead class="text-xs uppercase bg-gray-300 text-gray-800">
                            <tr>
                                <th scope="col" class="px-4 py-3">Nombre</th>
                                <th scope="col" class="px-4 py-3">Precio</th>
                                <th scope="col" class="px-4 py-3">Stock</th>
                                <th scope="col" class="px-4 py-3">Activo</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                            <tr class="odd:bg-gray-100 even:bg-gray-200 border-b border-gray-200">
                                <td class="px-4 py-2">{{ $product->name }}</td>
                                <td class="px-4 py-2">{{ $product->price }}</td>
                                <td class="px-4 py-2">{{ $product->stock }}</td>
                                <td class="px-4 py-2">
                                    <input data-id="{{ $product->id }}" type="checkbox" class="product-active" {{ $product->active ? 'checked' : null }}>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
