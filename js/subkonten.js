// let produk = document.querySelector('.produk');
let konten2 = document.querySelector('.konten2');
let item = JSON.parse(localStorage.getItem('produk'));

function show(i) {
    clearHtml();
    let div = document.querySelector('.subkonten');
    for (let element of item) {
        let div2 = document.createElement('div');
        let div3 = document.createElement('div');
        div3.classList.add('desc');
        let b = document.createElement('h1');
        let desc = document.createElement('p');
        let img = document.createElement('img');
        if (i == 1 && element.category == 'Mouse') {
            b.textContent = element.nama;
            img.setAttribute('src', element.image);
            desc.textContent = element.desc;
        } else if (i == 2 && element.category == 'Keyboard') {
            b.textContent = element.nama;
            img.setAttribute('src', element.image);
            desc.textContent = element.desc;
        } else if (i == 3 && element.category == 'Headset') {
            b.textContent = element.nama;
            img.setAttribute('src', element.image);
            desc.textContent = element.desc;
        } else {
            continue;
        }
        div2.appendChild(img);
        div3.appendChild(b);
        div3.appendChild(desc);
        div.appendChild(div2);
        div.appendChild(div3);
    }
}


function clearHtml() {
    let a = document.querySelector('.subkonten');
    a.textContent = "";
}

