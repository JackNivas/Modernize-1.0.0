<?php ob_start();
      session_start();
      include '../includes/connection.php';  
     
      $result = mysqli_query($conn,"SELECT * FROM posts WHERE post_id = '" . $_GET['Id'] . "'");
      $row= mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Site Metas -->
    <title>Markedia - Marketing Blog Template</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    
    <!-- Design fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700" rel="stylesheet"> 
    
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- FontAwesome Icons core CSS -->
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">

    <!-- Animate styles for this template -->
    <link href="css/animate.css" rel="stylesheet">

    <!-- Responsive styles for this template -->
    <link href="css/responsive.css" rel="stylesheet">

    <!-- Colors for this template -->
    <link href="css/colors.css" rel="stylesheet">

    <!-- Version Marketing CSS for this template -->
    <link href="css/version/marketing.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

    <div id="wrapper">
        <header class="market-header header">
            <div class="container-fluid">
                <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><img src="images/favicon.png" alt=""><span class="hide-menu fw-5 fs-5">NivModernize</span></a>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Home</a>
                            </li>
                            <?php
                                $result = mysqli_query($conn,"SELECT * FROM category");
                                while($row = mysqli_fetch_array($result)) {
                                ?>
                            
                            
                            <li class="nav-item"><a class="nav-link" href="category.php?cattitle=<?php echo $row["categorytitle"]; ?>"><?php echo $row["categorytitle"]; ?></a></li>
                                <?php
                                }
                                ?>
                            <li class="nav-item">
                                <a class="nav-link" href="marketing-contact.html">Contact Us</a>
                            </li>
                        </ul>
                        <form class="form-inline">
                            <input class="form-control mr-sm-2" type="text" placeholder="How may I help?">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                </nav>
            </div><!-- end container-fluid -->
        </header><!-- end market-header -->

        <section class="section lb m3rem">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-title-area">
                                <ol class="breadcrumb hidden-xs-down">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Blog</a></li>
                                    <li class="breadcrumb-item active"><?php echo $row['posttitle']; ?></li>
                                </ol>

                                <span class="color-yellow"><a href="marketing-category.html" title="">Development</a></span>
                                <?php
                                 $result = mysqli_query($conn,"SELECT * FROM posts WHERE post_id = '" . $_GET['Id'] . "'");
                                 $row= mysqli_fetch_array($result);
                           
                           
                                ?>
                                <h3><?php echo $row['posttitle']; ?></h3>

                                <div class="blog-meta big-meta">
                                    <small><a href="marketing-single.html" title=""><?php echo $row['postdate']; ?></a></small>
                                    <small><a href="blog-author.html" title="">by <?php echo $row['postauthor']; ?></a></small>
                                    <!-- <small><a href="#" title=""><i class="fa fa-eye"></i> 2344</a></small> -->
                                </div><!-- end meta -->

                                <div class="post-sharing">
                                    <ul class="list-inline">
                                        <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                        <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                        <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div><!-- end post-sharing -->
                            </div><!-- end title -->

                            <div class="single-post-media">
                                <img src="../html/images/<?php echo $row['postimage']; ?>" alt="" class="img-fluid">
                            </div><!-- end media -->

                            <div class="blog-content">  
                                <div class="pp">
                                    <p>In lobortis pharetra mattis. Morbi nec nibh iaculis, <a href="#">bibendum augue a</a>, ultrices nulla. Nunc velit ante, lacinia id tincidunt eget, faucibus nec nisl. In mauris purus, bibendum et gravida dignissim, venenatis commodo lacus. Duis consectetur quis nisi nec accumsan. Pellentesque enim velit, ut tempor turpis. Mauris felis neque, egestas in lobortis et,iaculis at nunc ac, rhoncus sagittis ipsum. </p>

                                    <h3><strong>Maecenas non convallis quam, eu sodales justo. Pellentesque quis lectus elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</strong></h3>

                                    <p>Donec nec metus sed leo sollicitudin ornare sed consequat neque. Aliquam iaculis neque quis dui venenatis, eget posuere felis viverra. Ut sit amet feugiat elit, nec elementum velit. Sed eu nisl convallis, efficitur turpis eu, euismod nunc. Proin neque enim, malesuada non lobortis nec, facilisis et lectus. Ie consectetur. Nam eget neque ac ex fringilla dignissim eu ac est. Nunc et nisl vel odio posuere. </p>

                                    <p>Vivamus non condimentum orci. Pellentesque venenatis nibh sit amet est vehicula lobortis. Cras eget aliquet eros. Nunc lectus elit, suscipit at nunc sed, finibus imperdiet ipsum. Maecenas dapibus neque sodales nulla finibus volutpat. Integer pulvinar massa vitae ultrices posuere. Proin ut tempor turpis. Mauris felis neque, egestas in lobortis et, sodales non ante. Ut vestibulum libero quis luctus tempus. Nullam eget dignissim massa. Vivamus id condimentum orci. Nunc ac sem urna. Aliquam et hendrerit nisl massa nunc. </p>

                                </div><!-- end pp -->

                                <img src="../html/images/<?php echo $row['postimage']; ?>" alt="" class="img-fluid img-fullwidth">

                                <div class="pp">
                                    <h3><strong>Nam non velit est. Sed lobortis arcu vitae nunc molestie consectetur. Nam eget neque ac ex fringilla dignissim eu ac est. Nunc et nisl vel odio posuere. </strong></h3>

                                    <p>Vivamus non condimentum orci. Pellentesque venenatis nibh sit amet est vehicula lobortis. Cras eget aliquet eros. Nunc lectus elit, suscipit at nunc sed, finibus imperdiet ipsum. Maecenas dapibus neque sodales nulla finibus volutpat. Integer pulvinar massa vitae ultrices posuere. Proin ut tempor turpis. Mauris felis neque, egestas in lobortis et, sodales non ante. Ut vestibulum libero quis luctus tempus. Nullam eget dignissim massa. Vivamus id condimentum orci. Nunc ac sem urna. Aliquam et hendrerit nisl massa nunc. </p>

                                    <p>Morbi pharetra porta consequat. Aenean et diam sapien. <a href="#">Interdum et malesuada</a> fames ac ante ipsum primis in faucibus. Pellentesque dictum ligula iaculis, feugiat metus eu, sollicitudin ex. Quisque eu ullamcorper ligula. In vel ex ac purus finibus viverra. Maecenas pretium lobortis turpis. Fusce lacinia nisi in tortor massa nunc.</p>

                                    <ul class="check">
                                        <li>Integer sit amet odio ac lectus imperdiet elementum.</li>
                                        <li>Praesent vitae lacus sed lacus ullamcorper mollis.</li>
                                        <li>Donec vitae metus ac felis vulputate tincidunt non et ex.</li>
                                        <li>In dapibus sapien at viverra venenatis.</li>
                                        <li>Pellentesque mollis velit id maximus finibus.</li>
                                    </ul>

                                    <p>Proin ultricies nulla consectetur, sollicitudin dolor at, sollicitudin mauris. Maecenas at nunc nunc. Ut nulla felis, tincidunt et porttitor at, rutrum in dolor. Aenean id tincidunt ligula. Donec vitae placerat odio. Mauris accumsan nibh ut nunc maximus, ac auctor elit vehicula. Cras leo sem, vehicula a ultricies ac, condimentum vitae lectus. Sed ut eros euismod, luctus nisl eu, congue odio. </p>

                                    <p><img src="../html/images/<?php echo $row['postimage']; ?>" class="float-left" width="340" alt="">Suspendisse ultrices placerat dolor sed efficitur. Morbi in laoreet diam. Pellentesque habitant m tristique senectus et netus et malesuada fames ac turpis egestas. Mauris ut massa id lectus laoreet porta non in metus. Donec nibh justo, tincidunt non justo ut, tincidunt malesuada turpis. Cras pellentesque sollicitudin ex eget pharetra.orbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris ut massa id lectus laoreet porta non in metus. Donec nibh justo, tincidunt non justo ut, tincidunt malesuada turpis. Cras pellentesque sollicitudin ex eget pharetra.</p>

                                    <h3><strong>Nam non velit est. Sed lobortis arcu vitae nunc molestie consectetur. Nam eget neque ac ex fringilla dignissim eu ac est. Nunc et nisl vel odio posuere. </strong></h3>


                                    <p>Aliquam eget maximus odio. Aliquam varius nisl ut leo fermentum, id fringilla magna tempus. Curabitur quis bibendum lorem, ut suscipit tellus. Morbi id dictum justo, et massa nunc. Mauris laoreet, neque et varius malesuada, justo neque consequat dolor, sit amet semper dui ligula commodo enim. Duis mauris magna, euismod in ante sed, laoreet faucibus elit. Nam euismod vulputate lorem, nec tincidunt lacus volutpat sit amet. In libero eros, dignissim vitae quam sed, maximus consectetur justo. Donec id orci eget odio convallis pellentesque. Quisque urna cras amet.Vivamus non condimentum orci. Pellentesque venenatis nibh sit amet est vehicula lobortis. Cras eget aliquet eros. Nunc lectus elit, suscipit at nunc sed, finibus imperdiet ipsum. Maecenas dapibus neque sodales nulla finibus volutpat. Integer pulvinar massa vitae ultrices posuere. Proin ut tempor turpis. Mauris felis neque, egestas in lobortis et, sodales non ante. Ut vestibulum libero quis luctus tempus. Nullam eget dignissim massa. Vivamus id condimentum orci. Nunc ac sem urna. Aliquam et hendrerit nisl massa nunc. </p>

                                    <p>Vivamus non condimentum orci. Pellentesque venenatis nibh sit amet est vehicula lobortis. Cras eget aliquet eros. Nunc lectus elit, suscipit at nunc sed, finibus imperdiet ipsum. Maecenas dapibus neque sodales nulla finibus volutpat. Integer pulvinar massa vitae ultrices posuere. Proin ut tempor turpis. Mauris felis neque, egestas in lobortis et, sodales non ante. Ut vestibulum libero quis luctus tempus. Nullam eget dignissim massa. Vivamus id condimentum orci. Nunc ac sem urna. Aliquam et hendrerit nisl massa nunc. </p>
                                </div><!-- end pp -->
                            </div><!-- end content -->

                            <div class="blog-title-area">
                                <div class="tag-cloud-single">
                                    <span>Tags</span>
                                    <small><a href="#" title=""><?php echo $row['posttag']; ?></a></small>
                                    </div><!-- end meta -->

                                
                            </div><!-- end title -->
                            <hr class="invis1">

                            <div class="custombox authorbox clearfix">
                                <h4 class="small-title">About author</h4>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <img src="../html/images/<?php echo $row['postimage']; ?>" alt="" class="img-fluid rounded-circle"> 
                                    </div><!-- end col -->

                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                        <h4><a href="#"><?php echo $row['postauthor']; ?></a></h4>
                                        <p>Quisque sed tristique felis. Lorem <a href="#">visit my website</a> amet, consectetur adipiscing elit. Phasellus quis mi auctor, tincidunt nisl eget, finibus odio. Duis tempus elit quis risus congue feugiat. Thanks for stop Markedia!</p>

                                        <div class="topsocial">
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Website"><i class="fa fa-link"></i></a>
                                        </div><!-- end social -->

                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end author-box -->


                            
                            <hr class="invis1">

                            <div class="custombox clearfix">
                                <h4 class="small-title">Comments</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                    <?php
                                    
                                    $result = mysqli_query($conn,"SELECT * FROM comments WHERE comment_post_id = '" . $_GET['Id'] . "' && comment_status = 'published'");
                                    if (mysqli_num_rows($result) > 0) {
                                        $i=0;
                                        while($row = mysqli_fetch_array($result)) {    
    
                                    ?>
                                        <div class="comments-list">
                                            <div class="media">
                                                <a class="media-left" href="#">
                                                    <img src="upload/author.jpg" alt="" class="rounded-circle">
                                                </a>
                                                <div class="media-body">
                                                <h4 class="media-heading user_name">
                                                    <?php echo $row["comment_author"]; ?>
                                                     <small><?php echo $row["comment_date"]; ?></small></h4>
                                                    <p><?php echo $row["comment_content"]; ?></p>
                                                    <!-- <a href="#" class="btn btn-primary btn-sm">Reply</a> -->
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        $i++;
                                        }
                                    }
                                        ?>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end custom-box -->

                            <hr class="invis1">

                            <div class="custombox clearfix">

                                <h4 class="small-title">Leave a Reply</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                    
                                    <form class="form-wrapper" action="postdetails.php" method="POST">
                                    <?php
                                    if(isset($_GET['Id'])){
                                        $cpost_id = $_GET['Id'];
                                        
                                        $result = mysqli_query($conn,"SELECT * FROM posts WHERE post_id='" . $_GET['Id'] . "'");
                                        $row= mysqli_fetch_array($result);
                                  ?>
                                        
                                            <input type="text" hidden="true" name="postid" value=<?php echo $_GET['Id']; ?> class="form-control" placeholder="Your name">
                                    <?php    }
                                        ?>    
                                            <input type="text" name="author" class="form-control" placeholder="Your name">
                                            <input type="text" name="email" class="form-control" placeholder="Email address">
                                            <textarea class="form-control" name="comments" placeholder="Your comment"></textarea>
                                            <button type="submit" name="submit" class="btn btn-primary">Submit Comment</button>
                                            
                                        </form>
                                        <?php 
                  
                  if(isset($_POST['submit'])){
                    $id=$_POST['postid'];
                    $cauthor = $_POST['author'];
                    $cemail = $_POST['email'];
                    $ccomments = $_POST['comments'];
                    
                    
                    // print_r($_FILES["postimage"]);
                    
                    
                    $sql = "INSERT INTO comments 
                    (comment_post_id,comment_author,comment_email,comment_content) VALUES
                    ('$id','$cauthor','$cemail','$ccomments')";
 
                        if(mysqli_query($conn, $sql)){
                          echo "New record has been added successfully !";
                          header("location: index.php");
                              }
                          else{
                              echo "ERROR: Hush! Sorry $sql. "
                                  . mysqli_error($conn);
                              }
                          
                          // Close connection
                          mysqli_close($conn);
                  }
                
                ?>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end page-wrapper -->
                    </div><!-- end col -->

                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <!-- <div class="sidebar">
                            <div class="widget-no-style">
                                <div class="newsletter-widget text-center align-self-center">
                                    <h3>Subscribe Today!</h3>
                                    <p>Subscribe to our weekly Newsletter and receive updates via email.</p>
                                    <form class="form-inline" method="post">
                                        <input type="text" name="email" placeholder="Add your email here.." required class="form-control" />
                                        <input type="submit" value="Subscribe" class="btn btn-default btn-block" />
                                    </form>         
                                </div>
                            </div> -->

                            <div class="widget">
                                <h2 class="widget-title">Recent Posts</h2>
                                <div class="blog-list-widget">
                                    <div class="list-group">
                                    <?php
                        
                        $result = mysqli_query($conn,"SELECT * FROM posts WHERE postdate = (SELECT MAX(postdate) FROM posts)");
                        
                        $i=0;
                        while($row = mysqli_fetch_array($result)) {
                        ?>
                           
                                    <a href="postdetails.php" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="w-100 justify-content-between">
                                            <img src="../html/images/<?php echo $row['postimage']; ?>" alt="" class="img-fluid float-left">
                                            <h5 class="mb-1"><?php echo $row['posttitle']; ?></h5>
                                            <small><?php echo $row['postdate']; ?></small>
                                        </div>
                                    </a>
                                <?php }?>
                                    </div>
                                </div><!-- end blog-list -->
                            </div><!-- end widget -->

                            

                            
                            <div class="widget">
                                <h2 class="widget-title">Popular Categories</h2>
                                <div class="link-widget">
                                    <ul>
                                    <?php
                                $result = mysqli_query($conn,"SELECT * FROM category");
                                $i=0;
                                while($row = mysqli_fetch_array($result)) {
                                ?>
                                        <li><a href="category.php?cattitle=<?php echo $row["categorytitle"]; ?>"><?php echo $row["categorytitle"]; ?></a></li>
                                <?php
                                }
                                ?>        
                            
                                    </ul>
                                </div><!-- end link-widget -->
                            </div><!-- end widget -->
                        </div><!-- end sidebar -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <h2 class="widget-title">Recent Posts</h2>
                            <div class="blog-list-widget">
                                <div class="list-group">
                                <?php
                        
                        $result = mysqli_query($conn,"SELECT * FROM posts WHERE postdate = (SELECT MAX(postdate) FROM posts)");
                        
                        $i=0;
                        while($row = mysqli_fetch_array($result)) {
                        ?>
                           
                                    <a href="postdetails.php" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="w-100 justify-content-between">
                                            <img src="../html/images/<?php echo $row['postimage']; ?>" alt="" class="img-fluid float-left">
                                            <h5 class="mb-1"><?php echo $row['posttitle']; ?></h5>
                                            <small><?php echo $row['postdate']; ?></small>
                                        </div>
                                    </a>
                                <?php }?>
                                </div>
                            </div><!-- end blog-list -->
                        </div><!-- end widget -->
                    </div><!-- end col -->

                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <h2 class="widget-title">Popular Posts</h2>
                            <div class="blog-list-widget">
                                <div class="list-group">
                                <?php
                        
                        $result = mysqli_query($conn,"SELECT * FROM posts p WHERE 
                        EXISTS(SELECT comment_post_id FROM comments c WHERE c.comment_post_id = p.post_id)");
                        
                        while($row = mysqli_fetch_array($result)) {
                        ?>    
                                <a href="postdetails.php?Id=<?php echo $row['post_id']; ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="w-100 justify-content-between">
                                            <img src="../html/images/<?php echo $row['postimage']; ?>" alt="" class="img-fluid float-left">
                                            <h5 class="mb-1"><?php echo $row['posttitle']; ?></h5>
                                            <span class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                        </div>
                                    </a>

                            <?php } ?>            
                                </div>
                            </div><!-- end blog-list -->
                        </div><!-- end widget -->
                    </div><!-- end col -->

                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <h2 class="widget-title">Popular Categories</h2>
                            <div class="link-widget">
                                <ul>
                                <?php
                                $result = mysqli_query($conn,"SELECT * FROM category");
                                $i=0;
                                while($row = mysqli_fetch_array($result)) {
                                ?>
                                        <li><a href="category.php?cattitle=<?php echo $row["categorytitle"]; ?>"><?php echo $row["categorytitle"]; ?></a></li>
                                <?php
                                }
                                ?>
                                </ul>
                            </div><!-- end link-widget -->
                        </div><!-- end widget -->
                    </div><!-- end col -->
                </div><!-- end row -->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <br>
                        <br>
                        <div class="copyright">&copy; <img src="images/favicon.png" alt=""><span class="hide-menu fw-5 fs-5">NivModernize</span></a>.</div>
                    </div>
                </div>
            </div><!-- end container -->
        </footer><!-- end footer -->

        <div class="dmtop">Scroll to Top</div>
        
    </div><!-- end wrapper -->

    <!-- Core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animate.js"></script>
    <script src="js/custom.js"></script>

</body>
</html>