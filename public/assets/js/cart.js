let count = 0;

const cart_count = document.querySelector('#cart_count');

const add_to_cart = document.querySelectorAll('#add_to_cart');

if(add_to_cart){
	add_to_cart.forEach(button => {
		button.addEventListener('click', add_product(button));
	});

	console.log('cart', add_to_cart)
}

// load cart
init_cart();

function init_cart()
{

    console.log('site url', SITE_URL)
	getItems()
	updateItem()
}

function add_product(element){
	console.log('add product', element.getAttribute('data-id'))
}

function updateItem(){
	const items = document.querySelectorAll('#cart_item_qty');

	items.forEach(item => {
		item.addEventListener('click', (ele) => {
			console.log('click button', ele.currentTarget)
		})
	});

	function minusButton(){
		let number = 0
		console.log('minus button')
	}

	function plusButton(){
		let number = 0
	}
}

async function getItems()
{
	const url = SITE_URL + 'cart/items'
	const response = await fetch(url);
    const data = await response.json();

    cart_count.innerHTML = data.quantity;

    Object.entries(data).forEach(item => {
    	console.log('items', item)
    });

    console.log('data', data)
}