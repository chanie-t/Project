<x-client.client-layout>
    <x-slot name="clientContent">
        <main class="main-content mb-4">
        <section class="products-grid container">
            <div class="row" id="product-container">
            @foreach ($products as $product)
                @include('partials.product-card', ['product' => $product])
            @endforeach
            </div>

            <div class="text-center mt-2">
            <a id="load-more-btn" class="btn-link btn-link_lg default-underline text-uppercase fw-medium" href="javascript:void(0);">Tải thêm</a>
            </div>
        </section>
        </main>
    </x-slot>
    <x-slot name="clientScripts">
        <script>
        let page = 1;

        $('#load-more-btn').on('click', function () {
            page++;

            $.ajax({
            url: "{{ route('api.products') }}?page=" + page,
            type: "GET",
            dataType: "json",
            success: function (res) {
                if (res.html) {
                $('#product-container').append(res.html);
                if (!res.hasMore) {
                    $('#load-more-btn').hide();
                }
                } else {
                $('#load-more-btn').hide();
                }
            },
            error: function () {
                alert("Tải thêm sản phẩm thất bại.");
                $('#load-more-btn').hide();
            }
            });
        });
        </script>
    </x-slot>
</x-client.client-layout>
