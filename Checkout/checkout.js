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

// Function to extract URL parameters
function getUrlParams() {
    const urlParams = new URLSearchParams(window.location.search);
    const items = [];
  
    urlParams.getAll('items[]').forEach((item, index) => {
        items.push({
            name: item,
            price: parseFloat(urlParams.getAll('prices[]')[index]),
            quantity: parseInt(urlParams.getAll('quantities[]')[index])
        });
    });
  
    return items;
}

// Function to display checkout items and calculate total
function displayCheckoutItems() {
    const items = getUrlParams();
    const checkoutItemsContainer = document.querySelector('.checkout-items');
    let totalAmount = 0;

    items.forEach(item => {
        const itemPrice = item.price * item.quantity;
        totalAmount += itemPrice;

        const itemElement = document.createElement('div');
        itemElement.classList.add('item');
        itemElement.innerHTML = `
            <p>${item.name}</p>
            <p>Price: RM ${item.price.toFixed(2)}</p>
            <p>Quantity: ${item.quantity}</p>
            <p>Subtotal: RM ${itemPrice.toFixed(2)}</p>
        `;
        checkoutItemsContainer.appendChild(itemElement);
    });

    // Display total amount
    const totalElement = document.createElement('p');
    totalElement.classList.add('total');
    totalElement.textContent = `Total: RM ${totalAmount.toFixed(2)}`;
    checkoutItemsContainer.appendChild(totalElement);
}

// Call function to display checkout items and total on page load
window.addEventListener('DOMContentLoaded', displayCheckoutItems);
