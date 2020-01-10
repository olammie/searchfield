<?php
    include_once 'header.php';
?>

<h1>Search page</h1>

<div class="article-container">
    <?php
        if (isset($_POST['submit-search'])) {
            $search = mysqli_real_escape_string($conn, $_POST['search']);
            $sql = "SELECT * FROM article WHERE title LIKE '%$search%' OR a_text LIKE '%$search%' OR author LIKE '%$search%' OR a_date LIKE '%$search%'";
            $result = mysqli_query($conn, $sql);
            $queryResult = mysqli_num_rows($result);

            echo "There are ".$queryResult." results!";

            if ($queryResult > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<a href='article.php?title=".$row['title']."&date=".$row['a_date']."'><div class='article-box'>
                    <h3>".$row['title']."</h3>
                    <p>".$row['a_text']."</p>
                    <p>".$row['a_date']."</p>
                    <p>".$row['author']."</p>
                </div></a>";
                }
            } else {
                echo "There are no result for your search!";
            }
        }
    ?>

</div>