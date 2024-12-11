<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page - SL News</title>
    <style>
        /* Global Styles */
        body {
            font-family: 'Roboto', Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f4f4f9;
            color: #333;
        }

        /* Header Section */
        header {
            background: linear-gradient(to right, #1e90ff, #00bfff);
            color: white;
            padding: 30px 20px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        header h1 {
            margin: 0;
            font-size: 2.8rem;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        header p {
            font-size: 1.2rem;
            margin-top: 10px;
        }

        /* Navigation Section */
        nav {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: white;
            padding: 15px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        nav .nav-item {
            margin: 0 20px;
            list-style: none;
        }

        nav .nav-link {
            text-decoration: none;
            color: #333;
            font-size: 1.1rem;
            font-weight: bold;
            padding: 8px 20px;
            border: 2px solid transparent;
            border-radius: 20px;
            transition: all 0.3s ease;
        }

        nav .nav-link:hover {
            background-color: #1e90ff;
            color: white;
            border-color: #1e90ff;
        }

        /* Main Section */
        main {
            text-align: center;
            padding: 60px 20px;
            background-image: url('uploads/istockphoto-1181382649-612x612.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: white;
        }

        main .content {
            background-color: rgba(0, 0, 0, 0.6);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            display: inline-block;
        }

        main h2 {
            font-size: 2.2rem;
            margin-bottom: 20px;
        }

        main p {
            font-size: 1.2rem;
            line-height: 1.6;
        }

        main img {
            max-width: 100%;
            height: auto;
            margin-top: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }

        /* Footer Section */
        footer {
            text-align: center;
            padding: 20px;
            background-color: #1e90ff;
            color: white;
            font-size: 0.9rem;
            box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.2);
        }

        footer a {
            color: #ffeb3b;
            text-decoration: none;
            font-weight: bold;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header>
        <h1>Welcome to Sri Lanka News</h1>
        <p>Stay Updated with the Latest News from Around the Globe</p>
    </header>

    <!-- Navigation Section -->
    <nav>
        <li class="nav-item">
            <a class="nav-link" href="register.php">Register</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
        </li>
    </nav>

    <!-- Main Content Section -->
    <main>
        <div class="content">
            <h2>Discover the Latest Stories</h2>
            <p>
                Explore the latest news and updates from Sri Lanka and around the world. Join us by
                registering or logging in to personalize your news experience.
            </p>
            <img src="uploads/istockphoto-1181382649-612x612.jpg" alt="Welcome to SL News">
        </div>
    </main>

    <!-- Footer Section -->
    <footer>
        &copy; 2024 SL News | <a href="terms.php">Terms & Conditions</a> | All Rights Reserved
    </footer>
</body>
</html>
