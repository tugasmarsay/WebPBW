<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Review</title>
    <link rel="stylesheet" href="css/review.css">
</head>

<body>
    <?php
    include "navigasi.php";
    ?>
    <div class="container">
        <h1>Product Review</h1>
        <div id="review-list">
            <!-- Review list will be displayed here dynamically -->
        </div>
        <button id="add-review-btn" onclick="showReviewForm()">Add Review</button>
    </div>

    <!-- Review Form Popup -->
    <div id="review-form-popup" class="review-form-popup">
        <div class="review-form-container">
            <span class="close" onclick="closeReviewForm()">&times;</span>
            <h2>Add Review</h2>
            <form id="review-form" method="POST" action="review_action.php" enctype="multipart/form-data">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Enter username" required>

                <label for="stars">Stars:</label>
                <select id="stars" name="stars" required>
                    <option value="1">1 Star</option>
                    <option value="2">2 Stars</option>
                    <option value="3">3 Stars</option>
                    <option value="4">4 Stars</option>
                    <option value="5">5 Stars</option>
                </select>

                <label for="category">Category:</label>
                <input type="text" id="category" name="category" placeholder="Enter category" required>

                <label for="product_name">Product Name:</label>
                <input type="text" id="product_name" name="product_name" placeholder="Enter product name" required>

                <div class="checkboxes">
                    <p>Options:</p>
                    <input type="checkbox" id="fast_delivery" name="options[]" value="Fast Delivery">
                    <label for="fast_delivery">Fast Delivery</label>
                    <input type="checkbox" id="good_service" name="options[]" value="Good Service">
                    <label for="good_service">Good Service</label>
                    <input type="checkbox" id="good_quality" name="options[]" value="Good Quality">
                    <label for="good_quality">Good Quality</label>
                </div>

                <label for="description">Description:</label>
                <textarea id="description" name="description" placeholder="Enter your review" required></textarea>

                <label for="image">Image:</label>
                <input type="file" id="image" name="image">

                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
    <script src="js/review.js"></script>
</body>

</html>