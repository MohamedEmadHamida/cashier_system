//Orders
const ordersData = [
    { name: "بيتزا", price: 10, category: "food" },
    { name: "برجر", price: 5, category: "food" },
    { name: "طعمية", price: 2, category: "food" },
    { name: "كريب", price: 8, category: "food" },
    { name: "سبيرو سباطس", price: 10, category: "drink" },
    { name: "سينا كولا", price: 5, category: "drink" },
    { name: "شنايدر", price: 2, category: "drink" },
    { name: "بشاير", price: 8, category: "drink" }
];

//filter data
const foodOrders = ordersData.filter(item => item.category === "food");
const drinkOrders = ordersData.filter(item => item.category === "drink");

//specify data
let foodsButton = document.getElementById("foodsButton");
let drinksButton = document.getElementById("drinksButton");

//order text area
let orders = document.getElementById("orders");

const orderHtml = [...foodOrders, ...drinkOrders]
    .map(item => `<div class="order-item" style="cursor: pointer; display: flex; justify-content: space-between ;">
    <p>${item.name}</p> <p>${item.price}</p> </div>`)
    .join("\n");

orders.innerHTML = orderHtml;


foodsButton.addEventListener("click", function(){
    orders.innerHTML = foodOrders.map(item => `<div class="order-item" style="cursor: pointer; display: flex; justify-content: space-between ;">
    <p>${item.name}</p> <p>${item.price}</p> </div>`).join("\n")
})
// Select all order items
const orderItems = document.querySelectorAll('.order-item');

// Initialize an array to store selected items
let selectedItems = [];

// Add click event listener to each order item
orderItems.forEach(orderItem => {
    orderItem.addEventListener('click', function() {
        // name and price of the order list when click 
        const itemName = this.querySelector('p:first-child').textContent;
        const itemPrice = this.querySelector('p:last-child').textContent;

        // Check if the item is already selected
        const selectedItemIndex = selectedItems.findIndex(item => item.name === itemName);

        if (selectedItemIndex === -1) {
            // If not selected, add it to array with quantity 1
            selectedItems.push({ name: itemName, price: itemPrice, quantity: 1 });
        } else {
            // Increase quantity by 1 if exist
            selectedItems[selectedItemIndex].quantity++;
        }

        const bill = document.getElementById('bill');
        bill.innerHTML = `
            ${selectedItems.map(item => `<div class="order-item" style="cursor: pointer; display: flex; justify-content: space-between ;"> 
            <p><span style="display: block;">الصنف</span>${item.name}</p> 
            <p><span style="display: block;">السعر</span>${item.price}</p> 
            <p><span style="display: block;">الكمية</span>${item.quantity}</p></div> `).join('')}
        `;
    });
});



drinksButton.addEventListener("click", function(){
    orders.innerHTML = drinkOrders.map(item => `<h4 ">${item.name} ${item.price}</h4>`).join("\n")
})
