function toggleDropdown() {
    var dropdownContent = document.getElementById("dropdownContent");
    dropdownContent.classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.dropdown img')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        for (var i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}

 // Your JavaScript for shopping cart functionality
document.addEventListener('DOMContentLoaded', function() {
  const increaseButtons = document.querySelectorAll('.increase-btn');
  const decreaseButtons = document.querySelectorAll('.decrease-btn');
  const deleteButtons = document.querySelectorAll('.delete-item');
  const parentCart = document.querySelector('.parentcart'); // Selecting the container for cart items

  increaseButtons.forEach(button => {
    button.addEventListener('click', function() {
      const itemQuantity = button.parentElement.querySelector('.quantity-value');
      let quantity = parseInt(itemQuantity.textContent);
      quantity++;
      itemQuantity.textContent = quantity;
      updateTotal(); // Update total amount after increasing quantity
    });
  });

  decreaseButtons.forEach(button => {
    button.addEventListener('click', function() {
      const itemQuantity = button.parentElement.querySelector('.quantity-value');
      let quantity = parseInt(itemQuantity.textContent);
      if (quantity > 1) {
        quantity--;
        itemQuantity.textContent = quantity;
        updateTotal(); // Update total amount after decreasing quantity
      }
    });
  });

  deleteButtons.forEach(button => {
    button.addEventListener('click', function() {
      const item = button.parentElement.parentElement;
      item.remove();
      updateTotal(); // Update total amount after deleting an item
    });
  });

  function updateTotal() {
    let totalAmount = 0;
    const items = parentCart.querySelectorAll('.item');

    items.forEach(item => {
      const price = parseFloat(item.querySelector('.item-price').textContent.replace('RM', ''));
      const quantity = parseInt(item.querySelector('.quantity-value').textContent);
      totalAmount += price * quantity;
    });

    // Update the total amount display
    const totalDisplay = document.querySelector('.total-amount');
    if (totalDisplay) {
      totalDisplay.textContent = 'Total: RM' + totalAmount.toFixed(2);
    }
  }

  // Initial calculation of total amount on page load
  updateTotal();
});

function redirectToCheckout() {
  const cartItems = document.querySelectorAll('.item');
  const items = [];

  cartItems.forEach(cartItem => {
      const itemName = cartItem.querySelector('.item-name').textContent.trim();
      const itemPrice = parseFloat(cartItem.querySelector('.item-price').textContent.replace('RM', ''));
      const itemQuantity = parseInt(cartItem.querySelector('.quantity-value').textContent);
      items.push({ name: itemName, price: itemPrice, quantity: itemQuantity });
  });

  const checkoutUrl = `../Checkout/checkout.php?${constructQueryString(items)}`;
  window.location.href = checkoutUrl;
} 

function constructQueryString(items) {
  const itemsQueryStrings = items.map(item =>
      `items[]=${encodeURIComponent(item.name)}&prices[]=${encodeURIComponent(item.price)}&quantities[]=${encodeURIComponent(item.quantity)}`
  );
  return itemsQueryStrings.join('&');
}
