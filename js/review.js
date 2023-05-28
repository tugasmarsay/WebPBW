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

function loadReviewList() {
    var reviewListContainer = document.getElementById("review-list");

    // Clear review list container
    while (reviewListContainer.firstChild) {
        reviewListContainer.removeChild(reviewListContainer.firstChild);
    }

    // Fetch review data from database
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "get_reviews.php", true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            var reviews = JSON.parse(xhr.responseText);

            // Create review elements and append to review list container
            reviews.forEach(function (review) {
                var reviewElem = document.createElement("div");
                reviewElem.classList.add("review");

                var usernameElem = document.createElement("p");
                usernameElem.classList.add("username");
                usernameElem.textContent = "Username: " + review.username;
                reviewElem.appendChild(usernameElem);

                var starsElem = document.createElement("p");
                starsElem.classList.add("stars");
                starsElem.textContent = "Stars: " + review.stars;
                reviewElem.appendChild(starsElem);

                var categoryElem = document.createElement("p");
                categoryElem.classList.add("category");
                categoryElem.textContent = "Category: " + review.category;
                reviewElem.appendChild(categoryElem);

                var productNameElem = document.createElement("p");
                productNameElem.classList.add("product-name");
                productNameElem.textContent = "Product Name: " + review.product_name;
                reviewElem.appendChild(productNameElem);

                var optionsElem = document.createElement("p");
                optionsElem.classList.add("options");
                optionsElem.textContent = "Options: " + review.options;
                reviewElem.appendChild(optionsElem);

                var descriptionElem = document.createElement("p");
                descriptionElem.classList.add("description");
                descriptionElem.textContent = "Description: " + review.description;
                reviewElem.appendChild(descriptionElem);

                if (review.image !== "") {
                    var imageElem = document.createElement("div");
                    imageElem.classList.add("image");
                    var imageTag = document.createElement("img");
                    imageTag.src = "images/" + review.image;
                    imageElem.appendChild(imageTag);
                    reviewElem.appendChild(imageElem);
                }

                reviewListContainer.appendChild(reviewElem);
            });
        }
    };
    xhr.send();
}

// Load initial review list
loadReviewList();