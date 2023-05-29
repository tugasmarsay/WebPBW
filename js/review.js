function showReviewForm() {
    var reviewFormPopup = document.getElementById("review-form-popup");
    reviewFormPopup.style.display = "block";
}

function closeReviewForm() {
    var reviewFormPopup = document.getElementById("review-form-popup");
    reviewFormPopup.style.display = "none";
}

document.getElementById("review-form").addEventListener("submit", function (e) {
    e.preventDefault(); // Prevent form submission

    // Submit form data using AJAX
    var xhr = new XMLHttpRequest();
    var formData = new FormData(document.getElementById("review-form"));
    xhr.open("POST", "review_action.php", true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            // Form submitted successfully, reload review list
            loadReviewList();
            closeReviewForm();
            document.getElementById("review-form").reset();
        }
    };
    xhr.send(formData);
});



function loadReviewList(searchValue) {
    var reviewListContainer = document.getElementById("review-list");

    while (reviewListContainer.firstChild) {
        reviewListContainer.removeChild(reviewListContainer.firstChild);
    }

    var xhr = new XMLHttpRequest();
    var url = "get_reviews.php";
    if (searchValue !== '') {
        url += "?search=" + encodeURIComponent(searchValue);
    }
    xhr.open("GET", url, true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            var reviews = JSON.parse(xhr.responseText);
            reviews.forEach(function (review) {
                var reviewElem = document.createElement("div");
                reviewElem.classList.add("review");

                var usernameElem = document.createElement("p");
                usernameElem.classList.add("username");
                usernameElem.textContent = review.username;
                reviewElem.appendChild(usernameElem);

                var starsElem = document.createElement("div");
                starsElem.classList.add("stars");
                reviewElem.appendChild(starsElem);
                for (var i = 0; i < review.stars; i++) {
                    var starIcon = document.createElement("img");
                    starIcon.src = "assets/star.png";
                    starIcon.classList.add("star-icon");
                    starIcon.style.width = "20px";
                    starIcon.style.height = "20px";
                    starsElem.appendChild(starIcon);
                }


                var tableElem = document.createElement("table");
                tableElem.classList.add("review-table");

                // Judul Kategori
                var categoryRow = document.createElement("tr");
                var categoryTitle = document.createElement("td");
                categoryTitle.textContent = "Kategori :";
                var categoryData = document.createElement("td");
                categoryData.textContent = review.category;
                categoryRow.appendChild(categoryTitle);
                categoryRow.appendChild(categoryData);
                tableElem.appendChild(categoryRow);

                // Judul Nama Produk
                var productNameRow = document.createElement("tr");
                var productNameTitle = document.createElement("td");
                productNameTitle.textContent = "Nama Produk :";
                var productNameData = document.createElement("td");
                productNameData.textContent = review.product_name;
                productNameRow.appendChild(productNameTitle);
                productNameRow.appendChild(productNameData);
                tableElem.appendChild(productNameRow);

                // Judul Options
                var optionsRow = document.createElement("tr");
                var optionsTitle = document.createElement("td");
                optionsTitle.textContent = "Options :";
                var optionsData = document.createElement("td");
                optionsData.textContent = review.options;
                optionsRow.appendChild(optionsTitle);
                optionsRow.appendChild(optionsData);
                tableElem.appendChild(optionsRow);

                // Judul Deskripsi
                var descriptionRow = document.createElement("tr");
                var descriptionTitle = document.createElement("td");
                descriptionTitle.textContent = "Deskripsi :";
                // descriptionTitle.textContent = review.image;
                var descriptionData = document.createElement("td");
                descriptionData.textContent = review.description;
                descriptionRow.appendChild(descriptionTitle);
                descriptionRow.appendChild(descriptionData);
                tableElem.appendChild(descriptionRow);

                reviewElem.appendChild(tableElem);
                reviewListContainer.appendChild(reviewElem);

                if (review.image !== "") {
                    var imageElem = document.createElement("div");
                    imageElem.classList.add("image");
                    var imageTag = document.createElement("img");
                    imageTag.src = "reviews/" + review.image;
                    imageElem.appendChild(imageTag);
                    reviewElem.appendChild(imageElem);
                    imageElem.style.display = "flex";
                    imageElem.style.justifyContent = "center";
                    imageTag.style.width = "50%";
                }
                reviewListContainer.appendChild(reviewElem);
            });
        }
    };
    xhr.send();
}

// Load initial review list
loadReviewList('');