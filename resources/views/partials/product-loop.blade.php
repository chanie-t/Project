@foreach ($products as $product)
  @include('partials.product-card', ['product' => $product])
@endforeach
