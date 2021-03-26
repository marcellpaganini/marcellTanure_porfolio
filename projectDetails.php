<?php
$pageTitle = "Project Details";
    include 'includes/header.php';
    include 'includes/db/openConnection.php';
?>
<body>
<main id="main"> 
        <section id="facts" class="facts">
            <div class="container">
                <div class="section-title">
                <?php
                    $id = $_GET['id'];
                    $sql = "SELECT projectId, projectTitle, projectDesc, projectImage, projectImage2, projectImage3, projectDate, categoryId 
                            FROM project WHERE projectId = $id
                            ORDER BY projectDate DESC";
                    
                    $result = $dbLink ->query($sql);
                    $row = $result->fetch_assoc();

                    function n12br2($string) {
                        $string = str_replace(array("\\r\\n", "\\r", "\\n"), "<br />", $string);
                        return $string;
                    }
                ?>

                <h1><?php echo $row['projectTitle']; ?></h1>

                <?php if(isset($_SESSION['userName']) && $_SESSION['userName'] == "marcell") { ?>
                    <a href="updatePost.php?edit=<?php echo $row['projectId']; ?>&project=true" class="btn btn-secondary btn-sm">Update</a>
                    <a href="deletePost.php?delete=<?php echo $row['projectId']; ?>&project=true" class="btn btn-secondary btn-sm">Delete</a>
                <?php } ?>

                    </div>
                    <div style= "color:white;"> BLANK </div>

                    <?php 
                    $date = strtotime($row['projectDate']);
                ?>
                    <h5><?php print date("F jS Y", $date); ?></h5><br />
                    
                    <div><?php echo $row['projectDesc']; ?></div>
                    <div style= "color:white;"> BLANK </div>
                    
                    <div>
                    <img src="assets/img/<?php echo $row['projectImage2'] ?>" class="rounded mx-auto d-block img-fluid"><br/>
                    <img src="assets/img/<?php echo $row['projectImage3'] ?>" class="rounded mx-auto d-block img-fluid">
                    </div>
                    <div style= "color:white;"> BLANK </div>
                    <a href="projects.php" class="btn btn-secondary btn-sm">Back</a>
    
                </div>
            </div>
        </section>
    </main>
<?php
    include 'includes/footer.php';
?>