<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews - Kia Motors</title>
    <link rel="stylesheet" href="homestyles.css">
</head>
<body>
    <header>
        <nav>
            <ul class="navbar">
                <li><a href="home.html#home">Home</a></li>
                <li><a href="home.html#cars">Cars</a></li>
                <li><a href="home.html#services">Services</a></li>
                <li><a href="submit_review.html">Reviews</a></li>
                <li><a href="https://www.kia.com/in/utility/contact-us.html">Contact</a></li>
            </ul>
        </nav>
    </header>

    <section id="reviews">
        <h1>Customer Reviews</h1>
        <p>Read what our customers have to say about Kia Motors.</p>

        <?php
        // Database connection
        $servername = "localhost";
        $username = "root"; // Replace with your MySQL username
        $password = ""; // Replace with your MySQL password
        $dbname = "kia_motors"; // Replace with your database name

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to retrieve reviews
        $sql = "SELECT name, model, rating, service, location, review FROM reviews ORDER BY name ASC"; // Adjust ORDER BY clause as needed
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output table header
            echo "<table>";
            echo "<tr><th>Name</th><th>Car Model</th><th>Rating</th><th>Service Type</th><th>Location</th><th>Review</th></tr>";

            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['model']}</td>";
                echo "<td>{$row['rating']}</td>";
                echo "<td>{$row['service']}</td>";
                echo "<td>{$row['location']}</td>";
                echo "<td>{$row['review']}</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No reviews yet.";
        }

        // Close connection
        $conn->close();
        ?>
    </section>

    <footer>
        <p>&copy; 2024 Kia Motors. All rights reserved.</p>
    </footer>
</body>
</html>
