const d = new Date();
const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October",
    "November", "December"
];
const days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

document.getElementById('day').innerText = days[d.getDay()];
document.getElementById('date').innerText = d.getDate();
document.getElementById('month').innerText = months[d.getMonth()];
document.getElementById('year').innerText = d.getFullYear();

var jam = document.getElementById('jam');

setInterval(time, 1000);

function time() {
    var h = d.getHours();
    var m = d.getMinutes();
    var s = d.getSeconds();
    jam.textContent = ("0" + h).substr(-2) + ":" + ("0" + m).substr(-2) + ":" + ("0" + s).substr(-2);
}

// document.getElementById('hour').innerText = d.getHours();
// document.getElementById('minute').innerText = d.getMinutes();

const orderIdArray = [];
const orderQuantity = [];
const orderItemIdArray = [];
const orderPriceArray = [];
var cost;
let i = 0;

// const orderItemArray = [];
// const orderImageArray = [];
// const orderArray = [];
// var paid;

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function checkId(itemId, itemname, itemprice, itemimage) {
    if (orderItemIdArray.includes(itemId)) {
        const indexnum = orderItemIdArray.indexOf(itemId);
        orderQuantity[indexnum] += 1;
        const itemSpan = document.querySelector('.item' + indexnum);
        itemSpan.innerText = orderQuantity[indexnum];
        console.log('order item id: ' + orderItemIdArray)
        console.log('quantity: ' + orderQuantity)
        totaltems();
        costItems();

    } else {
        orderbasket(itemId, itemname, itemprice, itemimage)
    }
}

function orderbasket(itemId, itemName, itemPrice, itemImage) {

    orderQuantity.push(1);
    orderIdArray.push(i);
    orderItemIdArray.push(itemId);
    orderPriceArray.push(itemPrice);

    // orderItemArray.push(itemname);
    // orderImageArray.push(itemimage);
    // orderArray.push(itemId, itemname, itemprice, itemimage);

    let orderlist = document.getElementById('orderlist');

    // create the li tag 
    const orderitem = document.createElement('li');
    orderitem.className = 'd-flex justify-content-between align-items-center'

    // start price ===============================
    // create a span for price 
    const priceSpan = document.createElement('span');

    // adjust text color to text-danger 
    priceSpan.className = 'text-danger';

    // create the text node for itemPrice
    const price = document.createTextNode(' Rp. ' + itemPrice);

    // add price text into span
    priceSpan.appendChild(price);
    // end price =================================

    // start image ===============================
    // create element image 
    const imgTag = document.createElement('img');

    // className w-25 for img 
    imgTag.className = 'w-25 rounded border border-dark';

    // assign the src to img tag
    imgTag.src = itemImage;
    // end image =================================

    // create the text node for itemName
    const name = document.createTextNode(' ' + itemName);

    // start combine (img + itemName + itemPrice) ===============================
    // create a span  
    const leftSideSpan = document.createElement('span');

    // attach or append the img to left span
    leftSideSpan.appendChild(imgTag);

    // attach or append itemname left to span
    leftSideSpan.appendChild(name);

    // attach the orderitempricespan to left span
    leftSideSpan.appendChild(priceSpan)

    // attach or append left span to li
    orderitem.appendChild(leftSideSpan)
    // end of combine ===========================================================

    // attach or append the li tag (child) to parent id=orderlist 
    orderlist.appendChild(orderitem);

    // Button section 
    const incrementButton = document.createElement('button');
    const amountItemSpan = document.createElement('span');
    const decrementButton = document.createElement('button');

    const incrementbuttontext = document.createTextNode('+');
    const amountItemtext = document.createTextNode('1');
    const decrementbuttontext = document.createTextNode('-');

    incrementButton.className = 'btn btn-success rounded-pill px-3 fw-bold';
    amountItemSpan.className = 'px-3 fw-bold item' + i;
    decrementButton.className = 'btn btn-danger rounded-pill px-3 fw-bold';

    incrementButton.setAttribute('onclick', 'quantity(' + i + ', 1, this)');
    decrementButton.setAttribute('onclick', 'quantity(' + i + ', -1, this)');

    incrementButton.appendChild(incrementbuttontext);
    amountItemSpan.appendChild(amountItemtext);
    decrementButton.appendChild(decrementbuttontext);

    orderitem.appendChild(incrementButton);
    orderitem.appendChild(amountItemSpan);
    orderitem.appendChild(decrementButton);

    // create a delete button 
    const deleteButton = document.createElement('button');
    const deleteButtonText = document.createTextNode('X');
    deleteButton.className = 'btn btn-danger rounded-pill ms-1 fw-bold';
    deleteButton.setAttribute('onclick', 'deleteItem(' + i + ', this)');

    // attach or append the text to delete button 
    deleteButton.appendChild(deleteButtonText);

    // attach the delete button into li tag
    orderitem.appendChild(deleteButton);

    totaltems();
    costItems();
    i++;
    // console.log('order id array: ' + orderIdArray)
    enableCheckOutButton();

};

function quantity(i, value, button) {
    const itemSpan = document.querySelector('.item' + i);
    var quantity = parseInt(itemSpan.innerText);

    if (value == -1 && quantity == 1) {
        deleteItem(i, button);
    } else {
        itemSpan.innerText = quantity + value;
        orderQuantity[i] = parseInt(itemSpan.innerText);
    }
    totaltems();
    costItems();
}

function totaltems() {
    var quantity = orderQuantity.reduce((partial_sum, a) => partial_sum + a, 0);
    document.getElementById('totalItems').innerText = quantity;
};

function costItems() {
    if (orderPriceArray.length === 0) {
        document.getElementById('totalCost').innerText = 0;
        document.getElementById('amount').value = 0;
    } else {
        cost = orderPriceArray.reduce(summary, 0);

        function summary(total, num, i) {
            return total + num * orderQuantity[i];
        }

        const costRp = numberWithCommas(cost);
        document.getElementById('totalCost').innerText = costRp;
        document.getElementById('amount').value = costRp;
    }
};

function orderbasketClear() {
    let orderlist = document.getElementById('orderlist');
    document.getElementById('amount').value = 0;
    orderlist.innerHTML = '';
    orderQuantity.length = 0;
    orderPriceArray.length = 0;
    orderIdArray.length = 0;

    // orderItemArray.length = 0;
    // orderImageArray.length = 0;
    // orderArray.length = 0;

    i = 0;
    totaltems();
    costItems();
    enableCheckOutButton()
};

function deleteItem(id, button) {
    const indexnum = orderIdArray.indexOf(id);
    orderItemIdArray[id] = 0;
    orderQuantity[id] = 0;
    orderIdArray.splice(indexnum, 1);
    orderPriceArray[id] = 0;

    // orderItemArray.splice(indexnum, 1);
    // orderImageArray.splice(indexnum, 1);

    totaltems();
    costItems();
    orderlist.removeChild(button.parentElement);
    enableCheckOutButton()
};

const calculatorScreenAmount = document.getElementById('calculatorScreenAmount');

function calculatorInsert(number) {
    if (calculatorScreenAmount.value == 0 && number == '00') {
        calculatorScreenAmount.value = '0.';
    } else if (calculatorScreenAmount.value == 0 && number == '0') {
        calculatorScreenAmount.value = '0.';
    } else if (calculatorScreenAmount.value.includes('.') == true && number == '.') {
        calculatorScreenAmount.value = calculatorScreenAmount.value;
    } else if (calculatorScreenAmount.value == '0' && parseInt(number) > 0) {
        calculatorScreenAmount.value = number;
    } else {
        calculatorScreenAmount.value += number;
    }

    if (calculatorScreenAmount.value == '.') {
        calculatorScreenAmount.value = '0.';
    }

    enableConfirmPaidButton();
};

function calculatorCancel() {
    calculatorScreenAmount.value = '0';
    enableConfirmPaidButton();
};

function denominationButton(bill) {
    calculatorScreenAmount.value = parseFloat(calculatorScreenAmount.value) + bill;
    enableConfirmPaidButton();
}

function enableConfirmPaidButton() {
    document.getElementById('confirmPaid').disabled = true;
    if (parseFloat(calculatorScreenAmount.value) >= parseFloat(amount.value)) {
        document.getElementById('confirmPaid').disabled = false;
    }
};

function confirmPaidButton() {
    customeramountpaid.value = numberWithCommas(calculatorScreenAmount.value);
    customeramountchange.value = numberWithCommas(parseInt(calculatorScreenAmount.value) - cost);
    document.getElementById('calculatorModal').disabled = true;
}

const amount = document.getElementById('amount');

function exactAmountButton() {
    calculatorScreenAmount.value = parseInt(amount.value) * 1000;
    enableConfirmPaidButton();
};

function exactAmountCalculator() {
    const exactAmount = document.getElementById('exactAmountSpan');
    exactAmount.innerText = amount.value;
}

function enableCheckOutButton() {
    const checkOutButton = document.getElementById('checkOutButton')
    checkOutButton.disabled = true;
    if (orderIdArray.length > 0) {
        checkOutButton.disabled = false;
    }
    if (orderIdArray.length == 0) {
        const food = document.getElementById('pills-food-tab');
        const foodTab = new bootstrap.Tab(food);
        foodTab.show();
    }
}

function goToCheckOutTab() {
    const checkOut = document.getElementById('pills-checkout-tab');
    const checkOutTab = new bootstrap.Tab(checkOut);
    checkOutTab.show();
}