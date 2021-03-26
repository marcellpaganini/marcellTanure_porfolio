<?php
    include 'includes/db/dbFunctions.php';
    $pageTitle = 'Add Post';
    include 'includes/header.php';
    $postId = 0;
?>  
    
<body>
    <?php 
        if(!isset($_SESSION['userName'])) { ?>
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
        } else {
    ?>
    <main id="main">
        <section id="facts" class="facts">
        <div class="container">
            <div class="section-title">
                <h2>Insert Post</h2><br />

                <form form class="row g-3" action="insertPost.php" method="POST" enctype="multipart/form-data"> 
                <input type="file" name="file" form-control-file> <br />
                <input type="submit" value="upload" class="btn btn-secondary">
                </form>

                <?php 
                    if(isset($_FILES['file'])){
                        $file = $_FILES['file'];
                        //file properties
                        $file_name = $file['name'];
                        $file_tmp = $file['tmp_name'];
                        $file_size = $file['size'];
                        $file_error = $file['error'];

                        //work out the file extension
                        $file_ext = explode('.', $file_name);
                        $file_ext = strtolower(end($file_ext));

                        $allowed = array('jpg', 'png');

                        if(in_array($file_ext, $allowed)) {
                            if($file_error === 0) {
                                if($file_size <= 2097152) {
                                    $file_name_new = uniqid('', true) . '.' . $file_ext;
                                    $file_destination = 'assets/img/' . $file_name_new;

                                    if(move_uploaded_file($file_tmp, $file_destination)) {
                                        echo "<div class='alert alert-success' role='alert'>Image Uploaded</div>";
                                    }
                                }
                            }
                        }
                    }
                ?>
                <form form class="row g-3" action="insertPost.php" method="POST">
                    <label for="postTitle">Title</label>
                    <input type="text" id="postTitle" name="postTitle"class="form-control" 
                    type="text" placeholder="Ex: Adding form placeholders using Bootstrap" aria-label="default input example">

                    <label for="teaser">Teaser</label>
                    <input type="text" id="teaser" name="teaser" class="form-control" type="text" placeholder="Insert a catchy sentence that will attract your viewers" aria-label="default input example">
                    
                    <label for="content">Content:</label>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <label for="exampleFormControlTextarea1" class="form-label"></label>
                                <textarea class="form-control" name="content" id="content"></textarea>
                                </div>
                            </div>
                        </div>
                    <div>



                    <label for="postImage">Image</label>
                    <input type="text" id="postImage"  name="postImage" class="form-control" 
                    type="text" placeholder="Ex: img.jpeg" aria-label="default input example">

                    <!-- Dropdown -->
                    <?php
                    $server = 'localhost';
                    $username = 'dev';
                    $password = 'Dev1234$';
                    $dbName = 'MarcellTanure_Portfolio';
        
                    $dbLink = new mysqli($server, $username, $password, $dbName);
                    $dropdownsql = "SELECT categoryId, categoryName, type FROM category WHERE type = 1 ORDER BY categoryName";
                    $dropdownResult = $dbLink ->query($dropdownsql);
                    ?>       
                    <div style= "color:white;"> BLANK </div>
                    <label for="category">Category</label>
                    <select class="form-control" id="category" name="category">
                        <option value="0">Select a Category</option>
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
                    <input type="hidden" name="authorId" value=2> 
                    <button type="submit" class="btn btn-secondary" name="newPost">Add Entry</button>
                </form>

                <?php 
                    if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['newPost'])){
                        $postTitle = $_POST['postTitle'];
                        $teaser = $_POST['teaser'];
                        $content = $_POST['content'];
                        $postImage = $_POST['postImage'];
                        if ($_SESSION['userName'] == "delon") {
                            $authorId = 1;
                        } else {
                            $authorId = 2;
                        }
                        $categoryId = $_POST['category'];

                        if(!empty($postTitle) && !empty($teaser) && !empty($content) && !empty($authorId) && !empty($postImage) && $categoryId > 0){
                            $dbLink = connect('MarcellTanure_Portfolio');
                            $msg = insertPost($dbLink, $postTitle, $teaser, $content, $postImage, $authorId, $categoryId);
                            echo $msg;
                            $dbLink->close();
                        }else{
                            echo "<div class='alert alert-danger' role='alert'>
                                    Fields cannot be empty
                                  </div>";
                        }
                    }
                ?>   
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