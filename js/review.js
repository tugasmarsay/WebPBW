// Ambil data produk dari local storage
let productData = JSON.parse(localStorage.getItem("produk"));

// Ambil data riwayat pembelian dari local storage
let historyData = JSON.parse(localStorage.getItem("riwayat")) || [];

// Ambil elemen select produk dari HTML
let productSelect = document.getElementById("product-select");

// Tambahkan opsi produk ke dalam select
for (let i = 0; i < productData.length; i++) {
    let option = document.createElement("option");
    option.text = productData[i].nama;
    productSelect.add(option);
}

// Ambil elemen form dari HTML
let reviewForm = document.getElementById("review-form");

// Tangani submit form
reviewForm.addEventListener("submit", function (event) {
    event.preventDefault();

    // Ambil data dari form
    let productName = productSelect.value;
    let starRating = document.querySelectorAll('#star-rating input:checked').length;
    let reviewText = document.getElementById("review-text").value;

    // Cari riwayat pembelian yang sesuai dengan produk yang dipilih
    let historyItem = historyData.find(item => item.nama === productName);

    // Tambahkan review ke riwayat pembelian
    if (historyItem) {
        historyItem.reviews.push({
            rating: starRating,
            review: reviewText
        });
    } else {
        historyData.push({
            nama: productName,
            reviews: [{
                rating: starRating,
                review: reviewText
            }]
        });
    }

    // Simpan riwayat pembelian yang telah diupdate ke dalam local storage
    localStorage.setItem("riwayat", JSON.stringify(historyData));

    // Reset form
    productSelect.selectedIndex = 0;
    document.querySelectorAll('#star-rating input').forEach(input => input.checked = false);
    document.getElementById("review-text").value = "";

    alert("Terima kasih atas review Anda!");
});

