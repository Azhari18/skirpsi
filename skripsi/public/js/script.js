const d = new Date();
const months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "July", "Augustus", "September", "Oktober",
    "November", "Desember"
];
const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];

document.getElementById('day').innerText = days[d.getDay()];
document.getElementById('date').innerText = d.getDate();
document.getElementById('month').innerText = months[d.getMonth()];
document.getElementById('year').innerText = d.getFullYear();

const orderIdArray = [];
const orderQuantity = [];
const orderItemIdArray = [];
const orderPriceArray = [];
var cost;
let i = 0;

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
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
    const price = document.createTextNode(' Rp ' + numberWithCommas(itemPrice));

    // add price text into span
    priceSpan.appendChild(price);
    // end price =================================


    // create the text node for itemName
    const name = document.createTextNode(' ' + itemName);

    // start combine (img + itemName + itemPrice) ===============================
    // create a span  
    const leftSideSpan = document.createElement('span');
    const midSideSpan = document.createElement('span');

    // attach or append itemname left to span
    leftSideSpan.appendChild(name);

    // attach the orderitempricespan to left span
    midSideSpan.appendChild(priceSpan)

    // attach or append left span to li
    orderitem.appendChild(leftSideSpan)
    orderitem.appendChild(midSideSpan)
    // end of combine ===========================================================

    // attach or append the li tag (child) to parent id=orderlist 
    // orderlist.appendChild(orderitem);

    // Button section 
    const rightSideSpan = document.createElement('span');

    const incrementButton = document.createElement('button');
    const amountItemSpan = document.createElement('span');
    const decrementButton = document.createElement('button');

    const incrementbuttontext = document.createTextNode('+');
    const amountItemtext = document.createTextNode('1');
    const decrementbuttontext = document.createTextNode('-');

    incrementButton.className = 'btn btn-success rounded-pill ms-1';
    amountItemSpan.className = 'px-3 fw-bold item' + i;
    decrementButton.className = 'btn btn-danger rounded-pill ms-1';

    incrementButton.setAttribute('onclick', 'quantity(' + i + ', 1, this)');
    decrementButton.setAttribute('onclick', 'quantity(' + i + ', -1, this)');

    incrementButton.appendChild(incrementbuttontext);
    amountItemSpan.appendChild(amountItemtext);
    decrementButton.appendChild(decrementbuttontext);

    rightSideSpan.appendChild(incrementButton);
    rightSideSpan.appendChild(amountItemSpan);
    rightSideSpan.appendChild(decrementButton);

    // create a delete button 
    const deleteButton = document.createElement('button');
    const deleteButtonText = document.createTextNode('X');
    deleteButton.className = 'btn btn-danger rounded-pill ms-1 fw-bold';
    deleteButton.setAttribute('onclick', 'deleteItem(' + i + ', this)');

    // attach or append the text to delete button 
    deleteButton.appendChild(deleteButtonText);

    // attach the delete button into li tag
    rightSideSpan.appendChild(deleteButton);

    // attach or append left span to li
    orderitem.appendChild(rightSideSpan)

    // attach or append the li tag (child) to parent id=orderlist 
    orderlist.appendChild(orderitem);

    good_id.value = orderItemIdArray;

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
    const subTotal = [];
    if (orderPriceArray.length === 0) {
        document.getElementById('totalCost').innerText = 0;
        document.getElementById('amount').value = 0;
    } else {
        cost = orderPriceArray.reduce(summary, 0);

        function summary(total, num, i) {
            subTotal[i] = num * orderQuantity[i];
            return total + num * orderQuantity[i];
        }

        good_quantity.value = orderQuantity;
        good_total.value = subTotal;


        document.getElementById('total').value = cost;

        const costRp = numberWithCommas(cost);
        document.getElementById('totalCost').innerText = costRp;
        document.getElementById('amountScreen').value = 'Rp ' + costRp;
        document.getElementById('amount').value = cost;
    }
};

function orderbasketClear() {
    var orderlist = document.getElementById('orderlist');
    orderlist.innerHTML = '';
    orderItemIdArray.length = 0
    orderQuantity.length = 0;
    orderPriceArray.length = 0;
    orderIdArray.length = 0;
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
    totaltems();
    costItems();
    orderlist.removeChild((button.parentElement).parentElement);
    enableCheckOutButton()
};

const calculatorScreenAmount = document.getElementById('calculatorScreenAmount');
const calculatorScreenValue = document.getElementById('calculatorScreenValue');


function calculatorInsert(number) {
    if (calculatorScreenAmount.value == 0 && number == '0') {
        calculatorScreenAmount.value = '0';
    } else if (calculatorScreenAmount.value == 0 && number == '00') {
        calculatorScreenAmount.value = '0';
    } else if (calculatorScreenAmount.value == 0 && number == '000') {
        calculatorScreenAmount.value = '0';
    } else if (calculatorScreenAmount.value == '0' && parseInt(number) > 0) {
        calculatorScreenAmount.value = number;
        calculatorScreenValue.value = number;
    } else {
        calculatorScreenAmount.value += number;
        calculatorScreenValue.value += number;
        calculatorScreenAmount.value = numberWithCommas(calculatorScreenValue.value);
    }    
};

function calculatorCancel() {
    calculatorScreenAmount.value = '0';
    calculatorScreenValue.value = '0';    
};

function denominationButton(bill) {
    calculatorScreenValue.value = parseInt(calculatorScreenValue.value) + bill;
    calculatorScreenAmount.value = numberWithCommas(calculatorScreenValue.value);    
}

function enableSaveButton() {    
    if (calculatorScreenValue.value) {        
        document.getElementById('save').disabled = false;
    }
};

function confirmPaidButton() {
    var kembalian = parseInt(calculatorScreenValue.value) - cost;
    customer_paid.value = calculatorScreenValue.value;
    change.value = kembalian;
    customeramountpaid.value = 'Rp ' + calculatorScreenAmount.value;
    customeramountchange.value = 'Rp ' + numberWithCommas(kembalian);
    if(kembalian < 0){
        customeramountchange.className = 'rounded-pill text-center form-control form-control-lg fw-bold text-danger';
    } else {
        customeramountchange.className = 'rounded-pill text-center form-control form-control-lg fw-bold text-success';
    }
    enableSaveButton()    
}

const amount = document.getElementById('amount');

function exactAmountButton() {
    calculatorScreenValue.value = parseInt(amount.value);
    calculatorScreenAmount.value = numberWithCommas(calculatorScreenValue.value);    
};

function exactAmountCalculator() {
    const exactAmount = document.getElementById('exactAmountSpan');
    exactAmount.innerText = numberWithCommas(amount.value);
}

function enableCheckOutButton() {
    const checkOutButton = document.getElementById('checkOutButton')
    checkOutButton.disabled = true;
    if (orderIdArray.length > 0) {
        checkOutButton.disabled = false;
    }
    if (orderIdArray.length == 0) {
        const food = document.getElementById('pills-all-tab');
        const foodTab = new bootstrap.Tab(food);
        foodTab.show();
    }
}

function goToCheckOutTab() {
    const checkOut = document.getElementById('pills-checkout-tab');
    const checkOutTab = new bootstrap.Tab(checkOut);
    checkOutTab.show();
}