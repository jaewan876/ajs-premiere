let cart_count = 0;

const add_to_cart = document.querySelectorAll('#add_to_cart');

if(add_to_cart){
	add_to_cart.forEach(button => {
		button.addEventListener('click', add_product(button));
	});

	console.log('cart', add_to_cart)
}

function add_product(element){
	console.log('add product', element.getAttribute('data-id'))
}