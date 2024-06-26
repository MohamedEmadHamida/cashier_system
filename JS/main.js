// Orders data
 

// Filter food and drink data
const foodOrders = ordersData.filter(item => item.category === "food");
const drinkOrders = ordersData.filter(item => item.category === "drink");

// Specify dom elements
const foodsButton = document.getElementById("foodsButton");
const drinksButton = document.getElementById("drinksButton");
const orders = document.getElementById("orders");
const totalPriceDisplay = document.getElementById("totalPrice");

// Array to store selected items
let selectedItems = [];

// Function to update the bill content
function updateBill() {
    const bill = document.getElementById('bill');
    bill.innerHTML = `
        ${selectedItems.map(item => `<div class="billOrder" data-item-id="${item.id}" style="cursor: pointer; display: flex; justify-content: space-between ;"> 
        <p><span style="display: block;">الصنف</span>${item.name}</p> 
        <p><span style="display: block;">السعر</span>${item.price}</p> 
        <p><span style="display: block;">الكمية</span>${item.quantity}</p></div> `).join('')}`;

    // Calculate total price
    const totalPrice = selectedItems.reduce((total, item) => total + (item.price * item.quantity), 0);
    totalPriceDisplay.textContent = totalPrice;

    // Add event listeners to bill items
    addBillItemEventListeners();
}

function addBillItemEventListeners() {
    document.querySelectorAll('.billOrder').forEach(billItem => {
        const itemId = billItem.dataset.itemId;
        billItem.addEventListener('click', function() {
            const itemIndex = selectedItems.findIndex(item => item.id === itemId);
            if (itemIndex !== -1) {
                selectedItems.splice(itemIndex, 1);
                updateBill();
            }
        });
    });
}



// display drink orders
drinksButton.addEventListener("click", function(){
    orders.innerHTML = drinkOrders.map(item => `<div class="drinkOrder" data-item-id="${item.id}" style="cursor: pointer; display: flex; justify-content: space-between ;">
    <p>${item.name}</p> <p>${item.price}</p> </div>`).join("\n");

    document.querySelectorAll('.drinkOrder').forEach(orderItem => {
        orderItem.addEventListener('click', function() {
            const itemId = this.dataset.itemId;
            const selectedItem = selectedItems.find(item => item.id === itemId);
            if (!selectedItem) {
                selectedItems.push({ ...drinkOrders.find(item => item.id === itemId), quantity: 1 });
            } else {
                selectedItem.quantity++;
            }
            updateBill();
        });
    });
});

// Clear all selected items
document.getElementById("cancelOrder").addEventListener("click", function(){
    selectedItems = [];
    updateBill();
});
