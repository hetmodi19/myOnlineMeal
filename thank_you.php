<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thank You - MyOnlineMeal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            overflow: hidden;
            animation: fadeInBg 2s ease;
        }

        @keyframes fadeInBg {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }

        .thank-box {
            text-align: center;
            background: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            animation: popIn 1s ease;
        }

        @keyframes popIn {
            0% { transform: scale(0.8); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }

        .thank-box h2 {
            font-size: 2em;
            margin-bottom: 20px;
        }

        .thank-box p {
            font-size: 1.2em;
        }

        .home-btn {
            margin-top: 30px;
            background: #fff;
            color: #0072ff;
            padding: 12px 25px;
            border: none;
            border-radius: 30px;
            font-size: 1em;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 114, 255, 0.3);
        }

        .home-btn:hover {
            background: #0072ff;
            color: white;
            transform: translateY(-3px);
        }

        .emoji {
            font-size: 2.5em;
            animation: bounce 1.5s infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
    </style>
</head>
<body>
    <div class="thank-box">
        <div class="emoji">🍽️</div>
        <h2>Thank you! Your order has been placed.</h2>
        <p>We’ll get your food ready shortly.</p>
        <a href="index.php" class="home-btn">Go back to Home</a>
    </div>
</body>
</html>
