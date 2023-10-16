<?php 
      include '../includes/connection.php';  
     

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

        <div class="page-title db">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <h2> Marketing <small class="hidden-xs-down hidden-sm-down">Nulla felis eros, varius sit amet volutpat non. </small></h2>
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Blog</a></li>
                            <li class="breadcrumb-item active">Marketing</li>
                        </ol>
                    </div><!-- end col -->                    
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end page-title -->

        <section class="section lb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="sidebar">
                            
                            <div class="widget">
                                <h2 class="widget-title">Recent Posts</h2>
                                <?php
                        
                        $result = mysqli_query($conn,"SELECT * FROM posts WHERE postdate = max(postdate)");
                        
                        $i=0;
                        while($row = mysqli_fetch_array($result)) {
                        ?>
                            <div class="blog-list-widget">
                                <div class="list-group">
                                    <a href="postdetails.php" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="w-100 justify-content-between">
                                            <img src="../html/images/<?php echo $row['postimage']; ?>" alt="" class="img-fluid float-left">
                                            <h5 class="mb-1"><?php echo $row['posttitle']; ?></h5>
                                            <small><?php echo $row['postdate']; ?></small>
                                        </div>
                                    </a>
                                </div>
                                <?php }?>
                                    
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
                    
                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                        <?php
                        
                        $result = mysqli_query($conn,"SELECT * FROM posts WHERE postcategory = '" . $_GET['cattitle'] . "'");
                        
                        $i=0;
                        while($row = mysqli_fetch_array($result)) {
                        ?>
                        
                        <div class="page-wrapper">
                            <div class="blog-custom-build">
                                <div class="blog-box wow fadeIn">
                                    <div class="post-media">
                                        <a href="index.php" title="">
                                            <img src="../html/images/<?php echo $row['postimage']; ?>" alt="" class="img-fluid">
                                            <div class="hovereffect">
                                                <span></span>
                                            </div>
                                            <!-- end hover -->
                                        </a>
                                    </div>
                                    <!-- end media -->
                                    <div class="blog-meta big-meta text-center">
                                        <div class="post-sharing">
                                            <ul class="list-inline">
                                                <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                                <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                                <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                            </ul>
                                        </div><!-- end post-sharing -->
                                        <h4><a href="index.php" title=""><?php echo $row['posttitle']; ?></a></h4>
                                        <p><?php echo $row['postcomment']; ?>.</p>
                                        <small><a href="index.php" title=""><?php echo $row['postcategory']; ?></a></small>
                                        <small><a href="index.php" title=""><?php echo $row['postdate']; ?></a></small>
                                        <small><a href="#" title="">by <?php echo $row['postauthor']; ?></a></small>
                                        <!-- <small><a href="#" title=""><i class="fa fa-eye"></i> 2291</a></small> -->
                                    </div><!-- end meta -->
                                </div><!-- end blog-box -->
                                <?php
                                }
                                ?>
                                


                            </div>
                        </div>

                        <hr class="invis">

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
                            <?php
                        
                        $result = mysqli_query($conn,"SELECT * FROM posts WHERE postdate = max(postdate)");
                        
                        $i=0;
                        while($row = mysqli_fetch_array($result)) {
                        ?>
                            <div class="blog-list-widget">
                                <div class="list-group">
                                    <a href="postdetails.php" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="w-100 justify-content-between">
                                            <img src="../html/images/<?php echo $row['postimage']; ?>" alt="" class="img-fluid float-left">
                                            <h5 class="mb-1"><?php echo $row['posttitle']; ?></h5>
                                            <small><?php echo $row['postdate']; ?></small>
                                        </div>
                                    </a>
                                </div>
                                <?php }?>
                            </div><!-- end blog-list -->
                        </div><!-- end widget -->
                    </div><!-- end col -->

                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <h2 class="widget-title">Popular Posts</h2>
                            <div class="blog-list-widget">
                                <div class="list-group">
                                    <a href="postdetails.php" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="w-100 justify-content-between">
                                            <img src="upload/small_01.jpg" alt="" class="img-fluid float-left">
                                            <h5 class="mb-1">Banana-chip chocolate cake recipe with customs</h5>
                                            <span class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                        </div>
                                    </a>

                                    <a href="marketing-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="w-100 justify-content-between">
                                            <img src="upload/small_02.jpg" alt="" class="img-fluid float-left">
                                            <h5 class="mb-1">10 practical ways to choose organic vegetables</h5>
                                            <span class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                        </div>
                                    </a>

                                    <a href="marketing-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="w-100 last-item justify-content-between">
                                            <img src="upload/small_03.jpg" alt="" class="img-fluid float-left">
                                            <h5 class="mb-1">We are making homemade ravioli, nice and good</h5>
                                            <span class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                        </div>
                                    </a>
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
                        <div class="copyright">&copy; <img src="images/favicon.png" alt=""><span class="hide-menu fw-5 fs-5">NivModernize</span>.</div>
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