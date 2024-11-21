/**
     * Calculate the total price and update the value attribute of the Total Price input
     */
function calculateTotal() {
    // Get the input elements for quantity, unit price, and total price
    const qtyInput = document.getElementById('product_1_qty');
    const priceInput = document.getElementById('product_1_unite_price');
    const totalInput = document.getElementById('product_1_total_price');

    // Parse the input values as numbers, defaulting to 0 if empty or invalid
    const qty = parseFloat(qtyInput.value) || 0;
    const unitPrice = parseFloat(priceInput.value) || 0;

    // Calculate the total price
    const total = qty * unitPrice;

    // Write the calculated total into the Total Price input's value attribute
    totalInput.value = total.toFixed(2); // Ensure 2 decimal places
}

// Add event listeners to trigger calculation on user input
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('product_1_qty').addEventListener('input', calculateTotal);
    document.getElementById('product_1_unite_price').addEventListener('input', calculateTotal);
});