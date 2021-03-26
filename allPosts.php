<?php
    $pageTitle = "Posts";
    include 'includes/header.php';
    include 'includes/db/openConnection.php';
    error_reporting(0);
?>
<body>
    <main id="main">
        <section id="facts" class="facts">
            <div class="container">
                <div class="section-title">
                    <div class="container">
                        <div class="row">
                            <div class="col-7"><h2>Posts</h2></div>
                            <div class="col-5">
                            <form action="allPosts.php" method="POST">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search" id="simpleSearch" name="simpleSearch">
                                    <div class="input-group-btn">
                                        <button class="btn btn-default" type="submit">
                                            <i class="icofont-ui-search":before></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                    <br /> 
                    
                    <?php

                        if($_SERVER['REQUEST_METHOD'] == "POST") {
                            $search = $_POST['simpleSearch'];

                            if(!empty($search)){
                                if($result = $dbLink->query("CALL simpleSearch('$search')")){
                                    ?>
                                    <table class="table">
                                            <tbody>
                                            <?php 
                                                while($row = $result->fetch_assoc()){
                                            ?>

                                            <tr style="height:1px; margin:0%">
                                            <td style="height: inherit; border: 0px; width: 100px;"><img src="assets/img/<?php echo $row['postImage'] ?>" class="img-thumbnail"><br /><br />
                                            <?php if($_SESSION['userName'] == "delon" ||  $_SESSION['userName'] == "marcell") { ?>
                                            <a href="updatePost.php?edit=<?php echo $row['postId']; ?>&project=false" class="btn btn-secondary btn-sm">Update</a>
                                            <a href="deletePost.php?delete=<?php echo $row['postId']; ?>&project=false" class="btn btn-secondary btn-sm">Delete</a>
                                            <?php } ?>
                                            </td>

                                            <td style="width:70%;">
                                            <h5><?php echo $row['postTitle']; ?></h5>
                                            <small>By <?php echo $row['firstName'], " ", $row['lastName']; ?></small><br />
                                            <?php 
                                            $date = strtotime($row['post_date']);
                                            ?>
                                            <small><?php print date("F jS Y", $date); ?></small><br /><br />
                                            <?php echo $row['teaser']; ?> <br />
                                            <a href="posts.php?id=<?php echo $row['postId']; ?>">Details</a>
                                            </td>
                                            </tr>

                                            <?php
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                    <?php
                                }
                                $dbLink->close();
                            }else{
                                echo "<div class='alert alert-danger' role='alert'>
                                         Search field cannot be empty
                                      </div>";
                            }
                        }else{
                            if ($_SESSION['userName'] == "delon"):
                                $sql = "SELECT authors.authorId, firstName, lastName, postId, post_date, postTitle, teaser, content, postImage 
                                        FROM authors 
                                        INNER JOIN posts ON authors.authorId = posts.authorId
                                        AND authors.authorId = 1
                                        ORDER BY post_date DESC;";
                            elseif ($_SESSION['userName'] == "marcell"):
                                $sql = "SELECT authors.authorId, firstName, lastName, postId, post_date, postTitle, teaser, content, postImage 
                                        FROM authors 
                                        INNER JOIN posts ON authors.authorId = posts.authorId
                                        AND authors.authorId = 2 
                                        ORDER BY post_date DESC;";
                            else:
                                $sql = "SELECT authors.authorId, firstName, lastName, postId, post_date, postTitle, teaser, content, postImage 
                                        FROM authors 
                                        INNER JOIN posts ON authors.authorId = posts.authorId
                                        ORDER BY post_date DESC";
                            endif;
                            
                            $result = $dbLink ->query($sql);
    
                            function n12br2($string) {
                                $string = str_replace(array("\\r\\n", "\\r", "\\n"), "<br />", $string);
                                return $string;
                            }
    
                            
    
                        ?>
    
                                <table class="table">
                                        <tbody>
                                        <?php 
                                            $totalCount = $result->num_rows;
                                            $perPage = 3;

                                            if(isset($_GET['page'])){
                                                $currentPage = $_GET['page'];
                                                $offset = $perPage * ($currentPage -1);
                                            }else{
                                                $currentPage = 1;
                                                $offset = 0;
                                            }
                                            $result->close();

                                            $sql2 = "SELECT authors.authorId, firstName, lastName, postId, post_date, postTitle, teaser, content, postImage 
                                            FROM authors 
                                            INNER JOIN posts ON authors.authorId = posts.authorId
                                            ORDER BY post_date DESC
                                            LIMIT $perPage OFFSET $offset";

                                            if($result = $dbLink ->query($sql2)){

                                            while($row = $result->fetch_assoc()){
                                        ?>
    
                                        <tr style="height:1px; margin:0%">
                                        <td style="height: inherit; border: 0px; width: 100px;"><img src="assets/img/<?php echo $row['postImage'] ?>" class="img-thumbnail"><br /><br />
                                        <?php if($_SESSION['userName'] == "delon" ||  $_SESSION['userName'] == "marcell") { ?>
                                        <a href="updatePost.php?edit=<?php echo $row['postId']; ?>&project=false" class="btn btn-secondary btn-sm">Update</a>
                                        <a href="deletePost.php?delete=<?php echo $row['postId']; ?>&project=false" class="btn btn-secondary btn-sm">Delete</a>
                                        <?php } ?>
                                        </td>
    
                                        <td style="width:70%;">
                                        <h5><?php echo $row['postTitle']; ?></h5>
                                        <small>By <?php echo $row['firstName'], " ", $row['lastName']; ?></small><br />
                                        <?php 
                                        $date = strtotime($row['post_date']);
                                        ?>
                                        <small><?php print date("F jS Y", $date); ?></small><br /><br />
                                        <?php echo $row['teaser']; ?> <br />
                                        <a href="posts.php?id=<?php echo $row['postId']; ?>">Details</a>
                                        </td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>

                                <?php
                                    $count = 1;
                                    for($i = 0; $i < $totalCount; $i += $perPage){
                                        if($count == $currentPage){
                                            echo $count, "&nbsp;";
                                        } else {
                                            echo "<a href='allPosts.php?page=$count'>$count</a>&nbsp;";
                                        }
                                        $count++;
                                    }
                                    }else{
                                        printf("Prepared statement error: %s\n", $conn->error);
                                    }
                                ?>

                        <?php
                        }

                    $result->close();
                    $dbLink->close();
        
                    ?>

                </div>
            </div>
        </section>
    </main>
</body>
    
<?php
    include 'includes/footer.php';
?>