<?php
$pageTitle = "Delete";
    include 'includes/header.php';
?>
<body>
    <main id="main"> 
        <section id="facts" class="facts">
            <div class="container">
                <div class="section-title">
                    <h2>Delete Post</h2> <br />   
                    <p>
                        <?php
                        connect($dbName);
                        
                        $project = $_GET['project'];

                        if(isset($_GET['delete']) && $project == 'true') {
                                $projectId = $_GET['delete'];
                                echo "Are you sure? <br /><br />"; 
                            ?>  <form action="includes/db/dbFunctions.php" method="POST">
                                <input type="hidden" name="projectId" value="<?php echo $projectId; ?>">
                                <button type="submit" name="deleteProject" class="btn btn-secondary btn-sm">Yes</button>
                                <a href='projects.php' class='btn btn-secondary btn-sm'>No</a>
                                </form>
                        <?php
                        } else {
                                $postId = $_GET['delete'];
                                echo "Are you sure? <br /><br />"; 
                            ?>  <form action="includes/db/dbFunctions.php" method="POST">
                                <input type="hidden" name="postId" value="<?php echo $postId; ?>">
                                <button type="submit" name="delete" class="btn btn-secondary btn-sm">Yes</button>
                                <a href='posts.php' class='btn btn-secondary btn-sm'>No</a>
                                </form>
                            <?php        
                        } 
                        ?>
                    </p>
                </div>
            </div>
        </section>
    </main>
</body>
<?php
    include 'includes/footer.php';
?>