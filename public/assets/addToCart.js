function addToCart(productID) {
    const quantityInput = document.getElementById('number-input');
    const quantity = quantityInput.value; // Get the current value
    const productObject = {product: productID, quantity: quantity};
    Livewire.dispatch('addToCart', productObject);

    const addToCartComponent = document.getElementById('addToCartComponent');
    if (addToCartComponent.style.display === 'none') {
        addToCartComponent.style.display = 'block';
        toggleButton.style.marginBottom = '10px';
    } else {
        addToCartComponent.style.display = 'none';
        toggleButton.style.marginBottom = '0px';
    }
}
