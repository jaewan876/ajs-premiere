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
cart();

function add_product(element){
	console.log('add product', element.getAttribute('data-id'))
}

console.log(sessionStorage);

function cart()
{
	getItems()
}

function getCart()
{

}

async function getItems()
{
	const url = '/cart/item'
	const response = await fetch(url);
    const data = await response.json();

    cart_count.innerHTML = data.quantity;

    Object.entries(data).forEach(item => {
    	console.log('items', item)
    });

    console.log('data', data)
}