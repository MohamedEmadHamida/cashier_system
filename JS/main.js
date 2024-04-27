// Orders data
const ordersData = [
    { name: "بيتزا", price: 10, category: "food" },
    { name: "برجر", price: 5.8, category: "food" },
    { name: "طعمية", price: 2, category: "food" },
    { name: "كريب", price: 8, category: "food" },
    { name: "سبيرو سباطس", price: 10, category: "drink" },
    { name: "سينا كولا", price: 5, category: "drink" },
    { name: "شنايدر", price: 2, category: "drink" },
    { name: "بشاير", price: 8, category: "drink" }
];

// Filter food and drink data
const foodOrders = ordersData.filter(item => item.category === "food");
const drinkOrders = ordersData.filter(item => item.category === "drink");

// Specify dom elements
const foodsButton = document.getElementById("foodsButton");
const drinksButton = document.getElementById("drinksButton");
const orders = document.getElementById("orders");


// display food orders
foodsButton.addEventListener("click", function(){
    orders.innerHTML = foodOrders.map(item => `<div class="foodOrder" style="cursor: pointer; display: flex; justify-content: space-between ;">
    <p>${item.name}</p> <p>${item.price}</p> </div>`).join("\n");

    // Event listeners for food items

    document.querySelectorAll('.foodOrder').forEach(orderItem => {
        orderItem.addEventListener('click', function() {
            // Get name and price of the clicked item
            const itemName = this.querySelector('p:first-child').textContent;
            const itemPrice = this.querySelector('p:last-child').textContent;

            // Check if the item is already selected
            const selectedItemIndex = selectedItems.findIndex(item => item.name === itemName);

            if (selectedItemIndex === -1) {
                // add data into  array with quantity 1
                selectedItems.push({ name: itemName, price: itemPrice, quantity: 1 });
            } else {
                selectedItems[selectedItemIndex].quantity++;
            }

            updateBill();
        });
    });
});

// display drink orders
drinksButton.addEventListener("click", function(){
    orders.innerHTML = drinkOrders.map(item => `<div class="drinkOrder" style="cursor: pointer; display: flex; justify-content: space-between ;">
    <p>${item.name}</p> <p>${item.price}</p> </div>`).join("\n");


    document.querySelectorAll('.drinkOrder').forEach(orderItem => {
        orderItem.addEventListener('click', function() {

            const itemName = this.querySelector('p:first-child').textContent;
            const itemPrice = this.querySelector('p:last-child').textContent;

            const selectedItemIndex = selectedItems.findIndex(item => item.name === itemName);
            if (selectedItemIndex === -1) {
                selectedItems.push({ name: itemName, price: itemPrice, quantity: 1 });
            } else {
                selectedItems[selectedItemIndex].quantity++;
            }
            updateBill();
        });
    });
});


// Array to store selected items
let selectedItems = [];

// Function to update the bill content
function updateBill() {
    const bill = document.getElementById('bill');
    bill.innerHTML = `
        ${selectedItems.map(item => `<div class="billOrder" style="cursor: pointer; display: flex; justify-content: space-between ;"> 
        <p><span style="display: block;">الصنف</span>${item.name}</p> 
        <p><span style="display: block;">السعر</span>${item.price}</p> 
        <p><span style="display: block;">الكمية</span>${item.quantity}</p></div> `).join('')}`;

        //total price
        const totalPrice = selectedItems.reduce((total, item)=> total + (item.price * item.quantity), 0)
        document.getElementById('totalPrice').innerHTML = totalPrice;

        //remove whole oreder
        document.getElementById("cancelOrder").addEventListener("click", function(){
           selectedItems = [];
           updateBill(); // to update 
        })
        addBillItemEventListeners();
}

function addBillItemEventListeners() {
    document.querySelectorAll('.billOrder').forEach(billItem => {
        billItem.addEventListener('click', function() {
            const itemName = this.querySelector('p:first-of-type').textContent;
            const itemIndex = selectedItems.findIndex(item => item.name === itemName);

            selectedItems.splice(itemIndex, 1);
            updateBill();
        });
    });
}