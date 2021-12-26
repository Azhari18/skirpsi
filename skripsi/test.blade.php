function orderbasket(itemId, itemName, itemPrice) {
orderQuantity.push(1);
orderIdArray.push(i);
orderItemIdArray.push(itemId);
orderPriceArray.push(itemPrice);
let orderlist = document.getElementById('orderlist');
const orderitem = document.createElement('li');
orderitem.className = 'd-flex justify-content-between align-items-center'
const priceSpan = document.createElement('span');
priceSpan.className = 'text-danger';
const price = document.createTextNode(' Rp ' + numberWithCommas(itemPrice));
priceSpan.appendChild(price);
const name = document.createTextNode(' ' + itemName);
const leftSideSpan = document.createElement('span');
const midSideSpan = document.createElement('span');
leftSideSpan.appendChild(name);
midSideSpan.appendChild(priceSpan)
orderitem.appendChild(leftSideSpan)
orderitem.appendChild(midSideSpan)
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
const deleteButton = document.createElement('button');
const deleteButtonText = document.createTextNode('X');
deleteButton.className = 'btn btn-danger rounded-pill ms-1 fw-bold';
deleteButton.setAttribute('onclick', 'deleteItem(' + i + ', this)');
deleteButton.appendChild(deleteButtonText);
rightSideSpan.appendChild(deleteButton);
orderitem.appendChild(rightSideSpan)
orderlist.appendChild(orderitem);
good_id.value = orderItemIdArray;
totaltems();
costItems();
i++;
enableCheckOutButton();
};
