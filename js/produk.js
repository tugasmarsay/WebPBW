let products = {
  data: [
    {
      nama: "Mouse G",
      category: "Mouse",
      price: "30",
      image: "assets/produk1.webp",
      desc: "Tambahan terbaru pada jajaran produk G yang legendaris. Dilengkapi switch optik-mechanical hibrida LIGHTFORCE kami yang pertama dan protokol LIGHTSPEED",
    },
    {
      nama: "Keyboard G",
      category: "Keyboard",
      price: "49",
      image: "assets/produk2.png",
      desc: "Tactile mechanical switch standar gaming memberikan feedback yang jelas melalui momen aktuasi",
    },
    {
      nama: "Headset G",
      category: "Headset",
      price: "99",
      image: "assets/produk3.png",
      desc: "Mulai dari desain hingga produksi, sampai pengiriman, kami sebisa mungkin menggunakan plastik daur ulang, menciptakan kemasan yang ramah lingkungan,",
    },
    {
      nama: "Mouse M",
      category: "Mouse",
      price: "29",
      image: "assets/produk4.png",
      desc: "Kurang dari 63 gram. Low-latency LIGHTSPEED wireless terbaik. Presisi tingkat tinggi dengan sensor HERO 25K.",
    },
    {
      nama: "Keyboard M",
      category: "Keyboard",
      price: "129",
      image: "assets/produk5.png",
      desc: "Dilengkapi dengan pencahayaan RGB memukau dan switch mechanical GX pilihanmu. Hadir dalam corak White Mist. Aksesori bercorak warna dijual terpisah.",
    },
    {
      nama: "Headset M",
      category: "Headset",
      price: "89",
      image: "assets/produk6.webp",
      desc: "memaksimalkan kenyamanan dan kecocokan untuk semua gamer termasuk gamer dengan ukuran kepala lebih kecil.",
    },
    {
      nama: "Mousepad X",
      category: "Mousepad",
      price: "189",
      image: "assets/produk7.webp",
      desc: "Mouse G adalah tambahan",
    },
    {
      nama: "Mouse X",
      category: "Mouse",
      price: "49",
      image: "assets/produk8.webp",
      desc: " Dengan teknologi LIGHTSYNC, sensor kelas gaming, dan desain 6 tombol klasik, kamu akan menceriakan game-mu dan mejamu",
    },
  ],
};

localStorage.setItem('produk', JSON.stringify(products.data));

for (let i of products.data) {
  //div satu kotak
  let card = document.createElement("div");
  //Card should have category and should stay hidden initially
  card.classList.add("card", i.category, "hide");

  //div untuk image
  let imgContainer = document.createElement("div");
  imgContainer.classList.add("image-container");

  let image = document.createElement("img");
  image.setAttribute("src", i.image);
  imgContainer.appendChild(image);

  //nama dan price
  let container = document.createElement("div");
  container.classList.add("container");

  let name = document.createElement("h3");
  name.classList.add("product-name");
  name.innerText = i.nama.toUpperCase();
  container.appendChild(name);

  let price = document.createElement("p");
  price.innerText = "$" + i.price;
  container.appendChild(price);

  //form add to cart
  let form = document.createElement("div");
  form.classList.add("tombol");
  //tombol
  let button = document.createElement("button");
  button.classList.add("button-card");
  button.setAttribute("name", "button");
  button.innerText = "Add to Cart";
  button.addEventListener("click", () => {
    addToCart(i)
  });
  form.appendChild(button);
  container.appendChild(form)

  card.appendChild(imgContainer);
  card.appendChild(container);
  document.getElementById("products").appendChild(card);
}

function addToCart(item) {
  let cart = JSON.parse(localStorage.getItem("cart")) || [];
  cart.push(item);
  localStorage.setItem("cart", JSON.stringify(cart));
}


function filterProduct(value) {

  let buttons = document.querySelectorAll(".button-value");
  buttons.forEach((button) => {

    if (value.toUpperCase() == button.innerText.toUpperCase()) {
      button.classList.add("active");
      document.getElementById(button.innerText).style.padding = "10px 10px";
      document.getElementById(button.innerText).style.backgroundColor = "White";
      document.getElementById(button.innerText).style.color = "#505050";
      document.getElementById(button.innerText).style.border = "1px solid";
      document.getElementById(button.innerText).style.borderRadius = "7px";
    } else {
      button.classList.remove("active");
      document.getElementById(button.innerText).style.padding = "10px 10px";
      document.getElementById(button.innerText).style.backgroundColor = "#505050";
      document.getElementById(button.innerText).style.color = "White";
      document.getElementById(button.innerText).style.border = "none";
    }
  });


  let elements = document.querySelectorAll(".card");

  elements.forEach((element) => {

    if (value == "all") {
      element.classList.remove("hide");
    } else {
      if (element.classList.contains(value)) {
        element.classList.remove("hide");
      } else {
        element.classList.add("hide");
      }
    }
  });
}

document.getElementById("search").addEventListener("click", () => {

  let searchInput = document.getElementById("search-input").value;
  let elements = document.querySelectorAll(".product-name");
  let cards = document.querySelectorAll(".card");


  elements.forEach((element, index) => {
    if (element.innerText.includes(searchInput.toUpperCase())) {
      cards[index].classList.remove("hide");
    } else {
      cards[index].classList.add("hide");
    }
  });
});


window.onload = () => {
  filterProduct("all");
};