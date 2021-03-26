<?php
    include 'includes/db/dbFunctions.php';
    $pageTitle = 'Edit Post';
    include 'includes/header.php';
    $postId = 0;
?>  

    
<body>
    <?php
        $project = $_GET['project'];

        if(isset($_GET['edit']) && $project == 'true') {
            $server = 'remotemysql.com';
            $username = 'TyZShYLZqQ';
            $password = 'hAd45jczoE';
            $dbName = 'TyZShYLZqQ';

            $dbLink = new mysqli($server, $username, $password, $dbName);
            $projectId = $_GET['edit'];
            $update = true;
            $result = $dbLink->query("SELECT * FROM project WHERE projectId=$projectId") or die($dbLink->error);
                $row = $result->fetch_assoc();
                $projectTitle = $row['projectTitle'];
                $projectDesc = $row['projectDesc'];
                $projectImage = $row['projectImage'];
                $projectImage2 = $row['projectImage2'];
                $projectImage3 = $row['projectImage3'];
                $categoryId = $row['categoryId'];?>
                    <main id="main">
                        <section id="facts" class="facts">
                        <div class="container">
                            <div class="section-title">
                                <h2>Update Project</h2><br />
                                <form form class="row g-3" action="includes/db/dbFunctions.php" method="POST">
                                    <input type="hidden" name="projectId" value="<?php echo $projectId; ?>">
                                    <label for="projectTitle">Title</label>
                                    <input type="text" id="projectTitle" value="<?php echo $projectTitle; ?>" name="projectTitle" class="form-control" 
                                    type="text" placeholder="Ex: Adding form placeholders using Bootstrap" aria-label="default input example">
                                    
                                    <label for="content">Content:</label>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col">
                                                    <label for="exampleFormControlTextarea1" class="form-label"></label>
                                                    <textarea class="form-control" name="content" id="content"?>"><?php echo $projectDesc; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        <div>

                                    <label for="projectImage">Cover Image</label>
                                    <input type="text" id="projectImage" value="<?php echo $projectImage; ?>" name="projectImage"class="form-control" 
                                    type="text" placeholder="Ex: img.jpeg" aria-label="default input example">

                                    <label for="projectImage2">Project Image 1</label>
                                    <input type="text" id="projectImage2" value="<?php echo $projectImage2; ?>" name="projectImage2"class="form-control" 
                                    type="text" placeholder="Ex: img.jpeg" aria-label="default input example">

                                    <label for="projectImage3">Project Image 2</label>
                                    <input type="text" id="projectImage3" value="<?php echo $projectImage3; ?>" name="projectImage3"class="form-control" 
                                    type="text" placeholder="Ex: img.jpeg" aria-label="default input example">

                                    <!-- Dropdown -->
                                    <?php
                                    $server = 'remotemysql.com';
                                    $username = 'TyZShYLZqQ';
                                    $password = 'hAd45jczoE';
                                    $dbName = 'TyZShYLZqQ';
                        
                                    $dbLink = new mysqli($server, $username, $password, $dbName);
                                    $dropdownsql = "SELECT categoryId, categoryName, type FROM category WHERE type = 2 ORDER BY categoryName";
                                    $dropdownResult = $dbLink ->query($dropdownsql);
                                    ?>       
                                    <div style= "color:white;"> BLANK </div>
                                    <label for="postImage">Category</label>
                                    <select class="form-control" id="category" name="category">
                                        <option value="<?php echo $categoryId; ?>"><?php 
                                        $result = $dbLink->query("SELECT category.categoryId, categoryName, projectId 
                                                                    FROM category 
                                                                    INNER JOIN project ON category.categoryId = project.categoryId 
                                                                    WHERE projectId = $projectId;") or die($dbLink->error);
                                        $row = $result->fetch_assoc(); 
                                        echo $row['categoryName']; ?></option>
                                        <?php
                                            //Create a variable to hold the id, set it to 0
                                            $id = 0;
                                            //Test if a post has happened and set the id to the user id
                                            if(!empty($_POST['category'])){
                                                $id = $_POST['category'];
                                            }
                                            while($row = $dropdownResult->fetch_assoc()){
                                            //If id matches the id of the user in the db set option to selected
                                            if($row['categoryId'] == $id){
                                                $selected = "selected='selected'";
                                            }else{
                                                $selected = "";
                                            }
                                        ?>
                                            <option value="<?php echo $row['categoryId'];?>" <?php echo $selected; ?>><?php echo $row['categoryName']; ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>

                                    <div style= "color:white;"> BLANK <div>
                                    <button type="submit" name="updateProject" class="btn btn-secondary">Update</button>
                                    
                                </form>
                            </div>
                        </div>
                        </section>
                    </main>
        <?php
        } else {
            $server = 'remotemysql.com';
            $username = 'TyZShYLZqQ';
            $password = 'hAd45jczoE';
            $dbName = 'TyZShYLZqQ';

            $dbLink = new mysqli($server, $username, $password, $dbName);
            $postId = $_GET['edit'];
            $update = true;
            $result = $dbLink->query("SELECT * FROM posts WHERE postId=$postId") or die($dbLink->error);
                $row = $result->fetch_assoc();
                $postTitle = $row['postTitle'];
                $teaser = $row['teaser'];
                $content = $row['content'];
                $postImage = $row['postImage'];
                $categoryId = $row['categoryId'];?>
                    <main id="main">
                        <section id="facts" class="facts">
                        <div class="container">
                            <div class="section-title">
                                <h2>Update Post</h2><br />
                                <form form class="row g-3" action="includes/db/dbFunctions.php" method="POST">
                                    <input type="hidden" name="postId" value="<?php echo $postId; ?>">
                                    <label for="postTitle">Title</label>
                                    <input type="text" id="postTitle" value="<?php echo $postTitle; ?>" name="postTitle" class="form-control" 
                                    type="text" placeholder="Ex: Adding form placeholders using Bootstrap" aria-label="default input example">
        
                                    <label for="teaser">Teaser</label>
                                    <input type="text" id="teaser" value="<?php echo $teaser; ?>" name="teaser" class="form-control" type="text" placeholder="Insert a catchy sentence that will attract your viewers" aria-label="default input example">
                                    
                                    <label for="content">Content:</label>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col">
                                                    <label for="exampleFormControlTextarea1" class="form-label"></label>
                                                    <textarea class="form-control" name="content" id="content"><?php echo $content; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        <div>

                                    <label for="postImage">Image</label>
                                    <input type="text" id="postImage" value="<?php echo $postImage; ?>" name="postImage"class="form-control" 
                                    type="text" placeholder="Ex: img.jpeg" aria-label="default input example">

                                    <!-- Dropdown -->
                                    <?php
                                    $server = 'remotemysql.com';
                                    $username = 'TyZShYLZqQ';
                                    $password = 'hAd45jczoE';
                                    $dbName = 'TyZShYLZqQ';
                        
                                    $dbLink = new mysqli($server, $username, $password, $dbName);
                                    $dropdownsql = "SELECT categoryId, categoryName, type FROM category WHERE type = 1 ORDER BY categoryName";
                                    $dropdownResult = $dbLink ->query($dropdownsql);
                                    ?>       
                                    <div style= "color:white;"> BLANK </div>
                                    <label for="postImage">Category</label>
                                    <select class="form-control" id="category" name="category">
                                        <option value="<?php echo $categoryId; ?>"><?php 
                                        $result = $dbLink->query("SELECT category.categoryId, categoryName, postId 
                                                                    FROM category 
                                                                    INNER JOIN posts ON category.categoryId = posts.categoryId 
                                                                    WHERE postId = $postId;") or die($dbLink->error);
                                        $row = $result->fetch_assoc(); 
                                        echo $row['categoryName']; ?></option>
                                        <?php
                                            //Create a variable to hold the id, set it to 0
                                            $id = 0;
                                            //Test if a post has happened and set the id to the user id
                                            if(!empty($_POST['category'])){
                                                $id = $_POST['category'];
                                            }
                                            while($row = $dropdownResult->fetch_assoc()){
                                            //If id matches the id of the user in the db set option to selected
                                            if($row['categoryId'] == $id){
                                                $selected = "selected='selected'";
                                            }else{
                                                $selected = "";
                                            }
                                        ?>
                                            <option value="<?php echo $row['categoryId'];?>" <?php echo $selected; ?>><?php echo $row['categoryName']; ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>

                                    <div style= "color:white;"> BLANK <div>
                                    <button type="submit" name="update" class="btn btn-secondary">Update</button>
                                    
                                </form>
                            </div>
                        </div>
                        </section>
                    </main>
        <?php
        }
        ?>
            
                <?php            
                     
                        if(!isset($_SESSION['userName'])) {
                ?>
                    <main id="main"> 
                        <section id="facts" class="facts">
                            <div class="container">
                                <div class="section-title">
                                <div class="alert alert-danger" role="alert">
                                    You have no access to this page. And you know it!
                                </div>         
                                </div>
                            </div>
                        </section>
                    </main>
                <?php
                        }
                    
                ?>

    <script src="ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');
    </script>

</body>

<?php
    include 'includes/footer.php';
?>