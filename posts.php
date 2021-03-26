<?php
    $pageTitle = "Post Details";
    include 'includes/header.php';
    include 'includes/db/openConnection.php';
    $postId = 0;
    error_reporting(0);
?>
<body>
    <main id="main">
        <section id="facts" class="facts">
            <div class="container">
                <div class="section-title">
                    <h2>Posts</h2>   <br /> 
                    
                    <?php
                        if(isset($_GET['id'])){

                            $postId = $_GET['id'];
                            
                            if ($_SESSION['userName'] == "marcell"):
                                $sql = "SELECT authors.authorId, firstName, lastName, postId, post_date, postTitle, content, postImage 
                                        FROM authors 
                                        INNER JOIN posts ON authors.authorId = posts.authorId
                                        AND authors.authorId = 2 
                                        WHERE posts.postId = $postId;";
                            else:
                                $sql = "SELECT authors.authorId, firstName, lastName, post_date, postTitle, content, postImage 
                                        FROM authors 
                                        INNER JOIN posts ON authors.authorId = posts.authorId
                                        WHERE posts.postId = $postId;";
                            endif;

                        }
                        $result = $dbLink ->query($sql);

                        function n12br2($string) {
                            $string = str_replace(array("\\r\\n", "\\r", "\\n"), "<br />", $string);
                            return $string;
                        }

                        while($row = $result->fetch_assoc()){

                    ?>
                    <div><h4><?php echo $row['postTitle']; ?></h4>

                    <?php if($_SESSION['userName'] == "marcell") { ?>
                    <a href="updatePost.php?edit=<?php echo $row['postId']; ?>&project=false" class="btn btn-secondary btn-sm">Update</a>
                    <a href="deletePost.php?delete=<?php echo $row['postId']; ?>&project=false" class="btn btn-secondary btn-sm">Delete</a>
                    <?php } ?>

                    </div>
                    <div style= "color:white;"> BLANK </div>

                    <p>By <?php echo $row['firstName'], " ", $row['lastName']; ?></p>
                    <?php 
                    $date = strtotime($row['post_date']);
                    ?>
                    <h5><?php print date("F jS Y", $date); ?></h5><br />

                    <img src="assets/img/<?php echo $row['postImage'] ?>" class="img-thumbnail"><br />
                    <div style= "color:white;"> BLANK </div>
                    
                    <div><?php echo n12br2($row['content']); ?></div><br /><hr><br />

                    <?php

                    }

                    $result->close();
                    $dbLink->close();
        
                    ?>
                    <a href="allPosts.php" class="btn btn-secondary btn-sm">Back</a>
                </div>
            </div>
        </section>

    </main>
</body>
    
<?php
    include 'includes/footer.php';
?>