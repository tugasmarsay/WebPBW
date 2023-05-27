let historyData = JSON.parse(localStorage.getItem("riwayat")) || [];
let hisNew = JSON.parse(localStorage.getItem("histemp")) || [];
hisNew.forEach(item => {
    historyData.push(item);
});
localStorage.removeItem('histemp');
let productList = document.getElementById("product-list");
localStorage.setItem('riwayat', JSON.stringify(historyData));

const tableBody = document.querySelector('#history-table tbody');

historyData.forEach((item) => {

    const row = document.createElement('tr');
    const nameCell = document.createElement('td');
    const priceCell = document.createElement('td');
    const dateCell = document.createElement('td');
    const statusCell = document.createElement('td');


    nameCell.textContent = item.nama;
    priceCell.textContent = "$" + item.price;
    dateCell.textContent = new Date().toISOString().slice(0, 10);
    statusCell.textContent = "Pending"

    row.appendChild(nameCell);
    row.appendChild(priceCell);
    row.appendChild(dateCell);
    row.appendChild(statusCell);

    tableBody.appendChild(row);
});

function clearHist() {
    localStorage.removeItem('riwayat');
}

