let cartItems = JSON.parse(localStorage.getItem('cart')) || [];
const cartElement = document.getElementById('cart-items');
const cartTotal = document.getElementById('cart-total');
let total = 0;

function showCartItems() {
    cartItems.forEach(item => {

        let card = document.createElement('div');
        card.classList.add('card');

        let imgContainer = document.createElement('div');
        imgContainer.classList.add("image-container");

        let image = document.createElement("img");
        image.setAttribute("src", item.image);
        imgContainer.appendChild(image);


        let container = document.createElement('div');
        container.classList.add('container');

        let name = document.createElement('h3');
        name.classList.add("product-name");
        name.innerText = item.nama;

        let priceColumn = document.createElement('p');
        priceColumn.innerText = "Harga : $" + item.price;


        const form = document.createElement('form');
        form.setAttribute('method', 'POST');
        const deleteButton = document.createElement('button');
        deleteButton.classList.add('remove-button');
        deleteButton.textContent = 'Remove';
        deleteButton.addEventListener('click', () => removeItem(item));


        card.appendChild(imgContainer);
        container.appendChild(name);
        container.appendChild(priceColumn);
        card.appendChild(container);
        form.appendChild(deleteButton);
        card.appendChild(form);


        cartElement.appendChild(card);
    });
}

showCartItems();
updateCartTotal();

function removeItem(item) {
    let i = 0;
    cartItems.forEach((items) => {
        if (item == items) {
            cartItems.splice(i, 1);
        } else {
            i = i + 1;
        }
    });


    localStorage.setItem('cart', JSON.stringify(cartItems));
    showCartItems();
    updateCartTotal();
}

function updateCartTotal() {
    cartItems.forEach(item => {
        total = item.price * 1 + total;
    });
    let totHarga = document.createElement('h4');
    totHarga.innerText = "$" + total;
    cartTotal.appendChild(totHarga);
}



function clearCart() {
    localStorage.removeItem('cart');
    cartElement.innerHTML = '';
    cartTotal.getElementsByTagName('h4').innerHTML = '0';
}

function addToTable() {
    localStorage.setItem("histemp", JSON.stringify(cartItems));
    clearCart();
}


let reload = document.createElement("button");
reload.addEventListener("click", () => { clearCart(); });
reload.innerHTML = "Remove All";

let bayar = document.createElement('button');
bayar.addEventListener('click', () => { addToTable(); });
bayar.innerHTML = 'Bayar';
cartTotal.appendChild(bayar);
cartTotal.appendChild(reload);
