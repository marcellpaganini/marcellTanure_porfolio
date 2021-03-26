<?php
    function connect($dbName){
        $dbLink = new mysqli('localhost', 'dev', 'Dev1234$', $dbName)
        or die("There is a problem connecting to the database");
        return $dbLink;
    }

    function insertPost($conn, $postTitle, $teaser, $content, $postImage, $authorId, $categoryId){
        $sql = "INSERT INTO posts(postTitle, teaser, content, postImage, authorId, categoryId) VALUES (?,?,?,?,?,?)";
        
        if($stmt = $conn->prepare($sql)){

            $stmt->bind_param('ssssii', $postTitle, $teaser, $content, $postImage, intval($authorId), intval($categoryId));
            $stmt->execute();
            $stmt->close();
            $msg = "Successfully inserted $postTitle. New record id is ". $conn->insert_id;
        } else{
            $msg = "Error inserting record";
        }
        return $msg;
    }

    function insertProject($conn, $projectTitle, $projectDesc, $projectImage, $projectImage2, $projectImage3, $authorId, $categoryId){
        $sql = "INSERT INTO project(projectTitle, projectDesc, projectImage, projectImage2, projectImage3, authorId, categoryId) VALUES (?,?,?,?,?,?,?)";
        
        if($stmt = $conn->prepare($sql)){

            $stmt->bind_param('sssssii', $projectTitle, $projectDesc, $projectImage, $projectImage2, $projectImage3, intval($authorId), intval($categoryId));
            $stmt->execute();
            $stmt->close();
            $msg = "Successfully inserted $projectTitle. New record id is ". $conn->insert_id;
        } else{
            $msg = "Error inserting record";
        }
        return $msg;
    }
    
?>

<?php 
    if (isset($_POST['update'])) {
        $dbLink = connect('MarcellTanure_Portfolio');

        $postId = $_POST['postId'];
        $postTitle = $_POST['postTitle'];
        $teaser = $_POST['teaser'];
        $content = $_POST['content'];
        $postImage = $_POST['postImage'];
        $categoryId = $_POST['category'];

        $dbLink->query("UPDATE posts 
                        SET postTitle='$postTitle', teaser='$teaser', content='$content', postImage='$postImage', categoryId=$categoryId
                        WHERE postId=$postId;") or
                        die($dbLink->error);
        header('location: ../../index.php');
    }

    if (isset($_POST['updateProject'])) {
        $dbLink = connect('MarcellTanure_Portfolio');

        $projectId = $_POST['projectId'];
        $projectTitle = $_POST['projectTitle'];
        $projectDesc = $_POST['content'];
        $projectImage = $_POST['projectImage'];
        $projectImage2 = $_POST['projectImage2'];
        $projectImage3 = $_POST['projectImage3'];
        $categoryId = $_POST['category'];

        $dbLink->query("UPDATE project 
                        SET projectTitle='$projectTitle', projectDesc='$projectDesc', projectImage='$projectImage', projectImage2='$projectImage2', projectImage3='$projectImage3', categoryId=$categoryId
                        WHERE projectId=$projectId;") or
                        die($dbLink->error);
        header('location: ../../index.php');
    }
?>

<?php
        if(isset($_POST['delete'])) {
            $dbLink = connect('MarcellTanure_Portfolio');
            $postId = $_POST['postId'];     

            $dbLink->query("DELETE FROM posts WHERE postId=$postId") or die($mysqli->error());
            echo "Record has been deleted. <br /><br />
            <a href='posts.php' class='btn btn-secondary'>Back</a>";
            header('location: ../../index.php');
        }

        if(isset($_POST['deleteProject'])) {
            $dbLink = connect('MarcellTanure_Portfolio');
            $projectId = $_POST['projectId'];     

            $dbLink->query("DELETE FROM project WHERE projectId=$projectId") or die($mysqli->error());
            echo "Record has been deleted. <br /><br />
            <a href='projects.php' class='btn btn-secondary'>Back</a>";
            header('location: ../../index.php');
        }
?>