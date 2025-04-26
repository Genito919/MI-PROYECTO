<?php
include 'db.php'; 


$sql = "SELECT * FROM reels ORDER BY creado_en DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reels</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300..800&family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <!--LOGOTIPO------------------------------------------------------------------->
    <p class="logo">
        <a href="http://192.168.10.10/curso_php/PROYECTO%20TRAVELBLOGS/">
            <i class="ph ph-caret-left"></i>
            <span>TravelBlogs</span>
        </a>
    </p>

    <div class="reels-container">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="reel">
                        <div>
                            <video src="http://192.168.10.10/curso_php/PROYECTO%20TRAVELBLOGS/Reels/VideoReels/' . $row["reel_url"] . '" loop muted playsinline></video>
                            <button class="sound-btn"><i class="fa-solid fa-volume-xmark"></i></button>
                            <input type="range" class="progress-bar" min="0" max="100" value="0"> 
                        </div>
                        <!--BOTONES DE CONTROL--------------------------------------------------------->
                        <div class="controls">
                            <button class="btn user-btn"><i class="ph ph-user-square"></i></button>
                            <button class="btn like"><i class="ph ph-thumbs-up"></i>
                                <span class="like-count">1.530</span>
                            </button>
                            <button class="btn dislike"><i class="ph ph-thumbs-down"></i></button>
                            <button class="btn comment">
                                <i class="ph ph-chat-circle"></i>
                                <span class="comment-count">30</span>
                            </button>
                            <button class="btn save"><i class="ph ph-bookmark-simple"></i></button>
                            <button class="btn user-btn"><i class="ph ph-dots-three"></i></button>
                        </div>
                        <!--BOTON DE PLAY-------------------------------------------------------------->
                        <button class="play-btn"><i class="ph-bold ph-play"></i></button>
                    </div>';
            }
        } else {
            echo "<p>No hay reels disponibles.</p>";
        }
        ?>
    </div>

    <script src="js/scripts.js"></script>
</body>
</html>

<?php
$conn->close();  
?>

