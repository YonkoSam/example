<div>
    @foreach ($products as $product)
        <div wire:loading.delay class="loading">Loading...</div>

        <div class="product-item">
            <button wire:click.prevent="addToCart({{ $product->id }})">
                Add to Cart
            </button>
        </div>
    @endforeach

    @if (!empty($cart))
    @endif
</div>

@push('scripts')
    <script>
        Livewire.on('cartUpdated', () => {
            // Update cart display or notification after add
        });
    </script>
@endpush
