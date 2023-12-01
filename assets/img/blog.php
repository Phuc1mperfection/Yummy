<?php
require_once("../components/connection.php");

// Get the blog ID from the URL
$MaBlog = $_GET['MaBlog'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            text-align: center;
            background-color: #7b403b;
            padding-left: 200px;
            padding-right: 200px;
        }

        .blog-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .blog-card {
            border: 1px solid #ccc;
            border-radius: 8px;
            overflow: hidden;
            background-color: white;
            width: 100%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            
        }

        .blog-image {
            
            height: 500px;
            object-fit: cover;
        }

        .blog-content {
            padding: 15px;
            text-align: center;
            margin: 0 50px;
        }
        .text-content{
            text-align: justify;
            padding: 50px;
        }
        
    </style>
</head>
<body>

    <div class="blog-container">
        <?php
            $sql = "SELECT * FROM blog where MaBlog=$MaBlog";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                <div class="blog-card">
                 <?php   echo '<h1>' . $row['TenBlog'] . '</h1>';
                    echo '<img class="blog-image" src="../assets/img/blog/' . $row['AnhBlog'] . '" alt="' . $row['TenBlog'] . '">';
                    ?>
                <div class="text-content">
                   <?php 
                    echo '<p>' . $row['NoiDung'] . '</p>';
                    ?>
                    </div>
                    </div>
            <?php        
                }
            } else {
                echo '<p>No blogs found</p>';
            }

            $conn->close();
        ?>
    </div>

</body>
</html>
