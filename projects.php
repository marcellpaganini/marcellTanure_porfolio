<?php
$pageTitle = "Projects";
    include 'includes/header.php';
    include 'includes/db/openConnection.php';
?>

<body>
<main id="main">
    <section id="facts" class="facts">
      <div class="container">
        <div class="section-title">
          <div class="container">
            <div class="row">
              <div class="col-7"><h2>Projects</h2></div>
                <div class="col-5">
                  <form action="projects.php" method="POST">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search" id="projectSearch" name="projectSearch">
                      <div class="input-group-btn">
                          <button class="btn btn-default" type="submit">
                              <i class="icofont-ui-search":before></i>
                          </button>
                      </div> 
                    </div>
                    <p class="fs-6 text-secondary">By programming language or framework</p>
                  </form>
                </div>
            </div>
        </div>
        <br /> 
                    
        <?php

            if($_SERVER['REQUEST_METHOD'] == "POST") {
                $search = $_POST['projectSearch'];
                $sql = "SELECT projectId, projectTitle,projectDate, projectImage, category.categoryId, categoryName
                FROM project
                INNER JOIN category ON  project.categoryId = category.categoryId
                WHERE categoryName LIKE '%$search%';";

                if(!empty($search)){
                    if($result = $dbLink->query($sql)){
                        ?>
                        <div class="table">
                          <table class="table table-borderless">
                            <tbody>  
                                  <tr>
                                <?php while($row = $result->fetch_assoc()) { ?>
                                  <td>
                                      <div class="card" style="margin: 0 auto; padding: 0%;">
                                        <div class="card-header">
                                        <strong><?php echo $row['projectTitle']; ?></strong>
                                      <?php if(isset($_SESSION['userName']) && ($_SESSION['userName'] == "marcell")) { ?>
                                        <br /><a href="updatePost.php?edit=<?php echo $row['projectId']; ?>&project=true" class="btn btn-secondary btn-sm">Update</a>
                                        <a href="deletePost.php?delete=<?php echo $row['projectId']; ?>&project=true" class="btn btn-secondary btn-sm">Delete</a>
                                      <?php } ?>

                                        <div style= "color:white;"> - </div>

                                      <?php 
                                        $date = strtotime($row['projectDate']);
                                      ?>
                                        </div>
                                        <div class="card-body">
                                        <?php print date("F jS Y", $date); ?><br />
                                          <a href="projectDetails.php?id=<?php echo $row['projectId']; ?>">
                                            <div class="portfolio">
                                              <div class="portfolio-wrap">
                                                <img src="assets/img/<?php echo $row['projectImage'] ?>" class="rounded mx-auto d-block img-fluid hover-zoom">
                                              </div>
                                            </div>  
                                          </a><br />
                                        </div>
                                  </div>
                                  </td>
                                <?php }?>  
                                  </tr>
                                
                            </tbody>
                          </table> 
                          </div>
                        <?php
                    }
                    $dbLink->close();
                }else{
                    echo "<div class='alert alert-danger' role='alert'>
                              Search field cannot be empty
                          </div>";
                }
            } else {
                $sql = "SELECT projectId, projectTitle, projectDate, projectImage 
                        FROM project 
                        WHERE projectId = 9 OR projectId = 10";
                
                $result = $dbLink ->query($sql);

              ?>
                <div class="table">
                <table class="table table-borderless">
                  <tbody>  
                        <tr>
                      <?php while($row = $result->fetch_assoc()) { ?>
                        <td>
                            <div class="card" style="margin: 0 auto; padding: 0%;">
                              <div class="card-header">
                              <strong><?php echo $row['projectTitle']; ?></strong>
                            <?php if(isset($_SESSION['userName']) && ($_SESSION['userName'] == "marcell")) { ?>
                              <br /><a href="updatePost.php?edit=<?php echo $row['projectId']; ?>&project=true" class="btn btn-secondary btn-sm">Update</a>
                              <a href="deletePost.php?delete=<?php echo $row['projectId']; ?>&project=true" class="btn btn-secondary btn-sm">Delete</a>
                            <?php } ?>

                              <div style= "color:white;"> - </div>

                            <?php 
                              $date = strtotime($row['projectDate']);
                            ?>
                              </div>
                              <div class="card-body">
                              <?php print date("F jS Y", $date); ?><br />
                                <a href="projectDetails.php?id=<?php echo $row['projectId']; ?>">
                                  <div class="portfolio">
                                    <div class="portfolio-wrap">
                                      <img src="assets/img/<?php echo $row['projectImage'] ?>" class="rounded mx-auto d-block img-fluid hover-zoom">
                                    </div>
                                  </div>  
                                </a><br />
                              </div>
                        </div>
                        </td>
                      <?php }?>  
                        </tr>
                      
                  </tbody>
                </table> 
                </div>
              <?php
              $sql = "SELECT projectId, projectTitle, projectDate, projectImage 
                        FROM project 
                        WHERE projectId = 7 OR projectId = 8";
                
                $result = $dbLink ->query($sql);

                function n12br2($string) {
                    $string = str_replace(array("\\r\\n", "\\r", "\\n"), "<br />", $string);
                    return $string;
                }

              ?>
                <div class="table">
                <table class="table table-borderless">
                  <tbody>  
                        <tr>
                      <?php while($row = $result->fetch_assoc()) { ?>
                        <td>
                            <div class="card" style="margin: 0 auto; padding: 0%;">
                              <div class="card-header">
                              <strong><?php echo $row['projectTitle']; ?></strong>
                            <?php if(isset($_SESSION['userName']) && ($_SESSION['userName'] == "marcell")) { ?>
                              <br /><a href="updatePost.php?edit=<?php echo $row['projectId']; ?>&project=true" class="btn btn-secondary btn-sm">Update</a>
                              <a href="deletePost.php?delete=<?php echo $row['projectId']; ?>&project=true" class="btn btn-secondary btn-sm">Delete</a>
                            <?php } ?>

                              <div style= "color:white;"> - </div>

                            <?php 
                              $date = strtotime($row['projectDate']);
                            ?>
                              </div>
                              <div class="card-body">
                              <?php print date("F jS Y", $date); ?><br />
                                <a href="projectDetails.php?id=<?php echo $row['projectId']; ?>">
                                  <div class="portfolio">
                                    <div class="portfolio-wrap">
                                      <img src="assets/img/<?php echo $row['projectImage'] ?>" class="rounded mx-auto d-block img-fluid hover-zoom">
                                    </div>
                                  </div>  
                                </a><br />
                              </div>
                        </div>
                        </td>
                      <?php }?>  
                        </tr>
                      
                  </tbody>
                </table> 
                </div>

                <?php
              $sql = "SELECT projectId, projectTitle, projectDate, projectImage 
                        FROM project 
                        WHERE projectId = 3 OR projectId = 4";
                
                $result = $dbLink ->query($sql);

                function n12br2($string) {
                    $string = str_replace(array("\\r\\n", "\\r", "\\n"), "<br />", $string);
                    return $string;
                }

              ?>
                <div class="table">
                <table class="table table-borderless">
                  <tbody>  
                        <tr>
                      <?php while($row = $result->fetch_assoc()) { ?>
                        <td>
                            <div class="card" style="margin: 0 auto; padding: 0%;">
                              <div class="card-header">
                              <strong><?php echo $row['projectTitle']; ?></strong>
                            <?php if(isset($_SESSION['userName']) && ($_SESSION['userName'] == "marcell")) { ?>
                              <br /><a href="updatePost.php?edit=<?php echo $row['projectId']; ?>&project=true" class="btn btn-secondary btn-sm">Update</a>
                              <a href="deletePost.php?delete=<?php echo $row['projectId']; ?>&project=true" class="btn btn-secondary btn-sm">Delete</a>
                            <?php } ?>

                              <div style= "color:white;"> - </div>

                            <?php 
                              $date = strtotime($row['projectDate']);
                            ?>
                              </div>
                              <div class="card-body">
                              <?php print date("F jS Y", $date); ?><br />
                                <a href="projectDetails.php?id=<?php echo $row['projectId']; ?>">
                                  <div class="portfolio">
                                    <div class="portfolio-wrap">
                                      <img src="assets/img/<?php echo $row['projectImage'] ?>" class="rounded mx-auto d-block img-fluid hover-zoom">
                                    </div>
                                  </div>  
                                </a><br />
                              </div>
                        </div>
                        </td>
                      <?php }?>  
                        </tr>
                      
                  </tbody>
                </table> 
                </div>

                <?php
                $sql = "SELECT projectId, projectTitle, projectDate, projectImage 
                        FROM project 
                        WHERE projectId = 5 OR projectId = 6";
                
                $result = $dbLink ->query($sql);

              ?>
                <div class="table">
                <table class="table table-borderless">
                  <tbody>  
                        <tr>
                      <?php while($row = $result->fetch_assoc()) { ?>
                        <td>
                            <div class="card" style="margin: 0 auto; padding: 0%;">
                              <div class="card-header">
                              <strong><?php echo $row['projectTitle']; ?></strong>
                            <?php if(isset($_SESSION['userName']) && ($_SESSION['userName'] == "delon" ||  $_SESSION['userName'] == "marcell")) { ?>
                              <br /><a href="updatePost.php?edit=<?php echo $row['projectId']; ?>&project=true" class="btn btn-secondary btn-sm">Update</a>
                              <a href="deletePost.php?delete=<?php echo $row['projectId']; ?>&project=true" class="btn btn-secondary btn-sm">Delete</a>
                            <?php } ?>

                              <div style= "color:white;"> - </div>

                            <?php 
                              $date = strtotime($row['projectDate']);
                            ?>
                              </div>
                              <div class="card-body">
                              <?php print date("F jS Y", $date); ?><br />
                                <a href="projectDetails.php?id=<?php echo $row['projectId']; ?>">
                                  <div class="portfolio">
                                    <div class="portfolio-wrap">
                                      <img src="assets/img/<?php echo $row['projectImage'] ?>" class="rounded mx-auto d-block img-fluid hover-zoom">
                                    </div>
                                  </div>  
                                </a><br />
                              </div>
                        </div>
                        </td>
                      <?php }?>  
                        </tr>
                      
                  </tbody>
                </table> 
                </div>

                <?php
                $sql = "SELECT projectId, projectTitle, projectDate, projectImage 
                        FROM project 
                        WHERE projectId = 1 OR projectId = 2";
                
                $result = $dbLink ->query($sql);

              ?>
                <div class="table">
                <table class="table table-borderless">
                  <tbody>  
                        <tr>
                      <?php while($row = $result->fetch_assoc()) { ?>
                        <td>
                            <div class="card" style="margin: 0 auto; padding: 0%;">
                              <div class="card-header">
                              <strong><?php echo $row['projectTitle']; ?></strong>
                            <?php if(isset($_SESSION['userName']) && ($_SESSION['userName'] == "delon" ||  $_SESSION['userName'] == "marcell")) { ?>
                              <br /><a href="updatePost.php?edit=<?php echo $row['projectId']; ?>&project=true" class="btn btn-secondary btn-sm">Update</a>
                              <a href="deletePost.php?delete=<?php echo $row['projectId']; ?>&project=true" class="btn btn-secondary btn-sm">Delete</a>
                            <?php } ?>

                              <div style= "color:white;"> - </div>

                            <?php 
                              $date = strtotime($row['projectDate']);
                            ?>
                              </div>
                              <div class="card-body">
                              <?php print date("F jS Y", $date); ?><br />
                                <a href="projectDetails.php?id=<?php echo $row['projectId']; ?>">
                                  <div class="portfolio">
                                    <div class="portfolio-wrap">
                                      <img src="assets/img/<?php echo $row['projectImage'] ?>" class="rounded mx-auto d-block img-fluid hover-zoom">
                                    </div>
                                  </div>  
                                </a><br />
                              </div>
                        </div>
                        </td>
                      <?php }?>  
                        </tr>
                      
                  </tbody>
                </table> 
                </div>

              <?php
                $result->close();
                $dbLink->close();
              ?>
            <?php
            }
            ?>
        
          </div>
        </div>
      </section>
  </main>
</body>
    
<?php
    include 'includes/footer.php';
?>