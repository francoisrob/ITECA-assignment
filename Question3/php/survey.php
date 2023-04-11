<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kimiko Entertainment Survey</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.5;
            margin: 0;
            padding: 0;
            background-color: #800000;
        }

        .container {
            max-width: 800px;
            margin: 10vh auto;
            padding: 2vw;
            background-color: #ffffff;
            border-radius: 2vw;
            box-shadow: 0 0 1vh #000000;
            text-align: center;
        }

        h1 {
            margin-top: 0;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-size: 18px;
            font-weight: bold;
        }

        input[type=text],
        input[type=number],
        textarea {
            width: 80%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
            resize: vertical;
        }

        button {
            background-color: #800000;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            padding: 1vw;
            font-size: 1vw;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type=submit]:hover {
            background-color: #9b2c2c;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Kimiko Entertainment Survey</h1>
        <p>We would like to know what you think about Kimiko Entertainment!</p>
        <form id="survey-form" method="post">
            <label for="hero">Who would you like to see at the next Comicon?</label>
            <input type="text" id="hero" name="hero" required>
            <label for="rating">How would you rate our service?</label>
            <input type="number" id="rating" name="rating" min="1" max="10" required>
            <label for="comment">Any comments?</label>
            <textarea id="comment" name="comment" rows="5"></textarea><br>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>

</html>