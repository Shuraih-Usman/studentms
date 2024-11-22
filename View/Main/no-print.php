<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No Result Found</title>
    <style>
        /* Basic Reset and Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body, html {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
        }
        .container {
            text-align: center;
            padding: 40px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 20px;
        }
        .container img {
            width: 150px;
            height: 150px;
            object-fit: contain;
            margin-bottom: 20px;
        }
        .container h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .container p {
            font-size: 18px;
            margin-bottom: 20px;
        }
        .container a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .container a:hover {
            background-color: #0056b3;
        }
        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 30px;
                max-width: 90%;
            }
            .container h1 {
                font-size: 22px;
            }
            .container p {
                font-size: 16px;
            }
            .container img {
                width: 120px;
                height: 120px;
            }
        }
        @media (max-width: 480px) {
            .container {
                padding: 20px;
                max-width: 95%;
            }
            .container h1 {
                font-size: 20px;
            }
            .container p {
                font-size: 14px;
            }
            .container img {
                width: 100px;
                height: 100px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- No Result Image -->
        <img src="<?=PUBLIC_URL.'/logo.jpg'?>" alt="No Result Found">
        <!-- Message Section -->
        <h1>No Result Found</h1>
        <p>Sorry, we couldn't find any results for your query. Please try again with different keywords or criteria.</p>
        <!-- Button for Navigation -->
        <a href="/home">Go Back to Home</a>
    </div>
</body>
</html>
