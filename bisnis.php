<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Reviews */
        .reviews {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .review-list {
            margin-top: 20px;
        }

        .review {
            margin-bottom: 20px;
        }

        .review-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .rating {
            font-size: 20px;
        }

        .star {
            color: #ffd700;
        }

        .review-media {
            margin-top: 10px;
        }

        .review-media img {
            max-width: 300px;
            height: auto;
        }

        /* Form */
        .form-popup {
            display: none;
            position: fixed;
            bottom: 0;
            right: 15px;
            border: 1px solid #ccc;
            z-index: 9;
            max-width: 400px;
            padding: 20px;
            background-color: #f2f2f2;
        }

        .form-container {
            max-width: 100%;
        }

        .form-container h2 {
            margin-top: 0;
        }

        label {
            font-weight: bold;
        }

        input[type=text],
        textarea {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        input[type=radio],
        input[type=checkbox] {
            margin-right: 10px;
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        .btn.cancel {
            background-color: #ccc;
            float: left;
        }

        .btn:hover {
            background-color: #45a049;
        }

        @media screen and (max-width: 600px) {
            .form-popup {
                max-width: 100%;
                bottom: 0;
                left: 0;
                right: 0;
            }
        }

        /* Rating Stars */
        .star-rating {
            display: inline-block;
            font-size: 0;
            line-height: 0;
        }

        .star-rating>input {
            display: none;
        }

        .star-rating>label {
            position: relative;
            display: inline-block;
            cursor: pointer;
            font-size: 20px;
        }

        .star-rating>label:before {
            content: '\f005';
            font-family: 'Font Awesome 5 Solid';
            position: absolute;
            left: 0;
            color: #ccc;
        }

        .star-rating>label:hover:before,
        .star-rating>label:hover~label:before,
        .star-rating>input:checked~label:before {
            color: #ffd700;
        }
    </style>
</head>

<body>
    <div class="reviews">
        <h2>Product Reviews</h2>
        <button onclick="openForm()">Add Review</button>
        <div class="review-list">
            <div class="review">
                <div class="review-header">
                    <h3>John Doe</h3>
                    <div class="rating">
                        <span class="star">&#9733;</span>
                        <span class="star">&#9733;</span>
                        <span class="star">&#9733;</span>
                        <span class="star">&#9733;</span>
                        <span class="star">&#9734;</span>
                    </div>
                </div>
                <div class="review-body">
                    <p>Great product! The quality is really good and the delivery was super fast. Would definitely recommend.</p>
                    <div class="review-media">
                        <img src="review-image.jpg" alt="Review Image">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-popup" id="review-form">
        <form action="" class="form-container">
            <h2>Add Review</h2>
            <label for="name"><b>Name</b></label>
            <input type="text" placeholder="Enter Name" name="name" required>
            <label for="product-select">Pilih Produk:</label>
            <select id="product-select"></select>
            <br><br>
            <label><b>Rating</b></label>
            <div class="rating">
                <input type="radio" id="star5" name="rating" value="5">
                <label for="star5" class="star">&#9733;5</label>
                <input type="radio" id="star4" name="rating" value="4">
                <label for="star4" class="star">&#9733;4</label>
                <input type="radio" id="star3" name="rating" value="3">
                <label for="star3" class="star">&#9733;3</label>
                <input type="radio" id="star2" name="rating" value="2">
                <label for="star2" class="star">&#9733;2</label>
                <input type="radio" id="star1" name="rating" value="1">
                <label for="star1" class="star">&#9733;1</label>
            </div>
            <label><b>Feedback</b></label>
            <div class="checkbox">
                <input type="checkbox" id="fast-shipping" name="fast-shipping" value="fast-shipping">
                <label for="fast-shipping">Fast Shipping</label><br>
                <input type="checkbox" id="good-quality" name="good-quality" value="good-quality">
                <label for="good-quality">Good Quality</label><br>
                <input type="checkbox" id="friendly-service" name="friendly-service" value="friendly-service">
                <label for="friendly-service">Friendly Service</label>
            </div>
            <label for="review"><b>Review</b></label>
            <textarea placeholder="Enter Review" name="review" required></textarea>
            <label for="media"><b>Media</b></label>
            <input type="file" id="media" name="media">
            <button type="submit" class="btn">Submit</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
        <div></div>
    </div>

    <script>
        // Open form popup
        function openForm() {
            document.getElementById("review-form").style.display = "block";
        }

        // Close form popup
        function closeForm() {
            document.getElementById("review-form").style.display = "none";
        }
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
    </script>
</body>

</html>
