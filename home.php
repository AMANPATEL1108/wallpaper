<?php
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'images';

$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch images from the database
$sql = "SELECT file_path, description FROM images";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ocean of Wallpaper</title>
    <link rel="stylesheet" href="home.css">
    <script src="home.js"></script>
</head>

<body>

    <header>
        <div class="logo-container">
            <img src="img/logo-1.png" alt="Logo">
            <a href="#"></a>
        </div>
        <h1>🌄 Oceans of Wallpaper</h1>
    </header>

    <nav class="sliderbarbutton">
        <a onclick="showContent('contentHome')">Home</a>
        <a onclick="showContent('contentDetails')">Details</a>
        <a onclick="showContent('contentAboutUs')">About Us</a>
    </nav>

    <main>
        <div id="contentHome" class="content">
            <div class="image-grid">
                <?php
                // Display images from the database
                while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="image-container">';
    echo '<img src="' . $row['file_path'] . '">';
    echo '<div class="image-overlay">';
    echo '<button class="view-btn" onclick="viewImage(\'' . $row['file_path'] . '\')">View</button>';
    echo '<button class="download-btn" onclick="downloadImage(\'' . $row['file_path'] . '\')">Download</button>';
    echo '</div></div>';
}

                ?>
            </div>
        </div>
        <!-- Additional content divs... -->
    </main>

    <footer>
        &copy; <?php echo date("Y"); ?> Your Website Name
    </footer>

</body>

</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
