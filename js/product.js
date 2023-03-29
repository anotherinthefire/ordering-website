function setQuantity(upordown) {
    var quantity = document.getElementById('quantity');

    if (quantity.value > 1) {
        if (upordown == 'up') { ++document.getElementById('quantity').value; }
        else if (upordown == 'down') { --document.getElementById('quantity').value; }
    }
    else if (quantity.value == 1) {
        if (upordown == 'up') { ++document.getElementById('quantity').value; }
    }
    else { document.getElementById('quantity').value = 1; }
}