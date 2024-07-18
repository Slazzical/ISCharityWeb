<?php
require_once 'php/connection.php';
session_start();

if (!isset($_SESSION['username']) && !isset($_SESSION['view_c'])) {
    header("Location: index.html");
}else{
  $filter = $_SESSION['username'];
  $query=mysqli_query($conn,"SELECT * FROM `users` WHERE `User_ID`='$filter'")or die(mysqli_error());
  $row1=mysqli_fetch_array($query);
  $filter1 = $_SESSION['view_c'];
  $query2=mysqli_query($conn,"SELECT * FROM `charities` WHERE `Charity_ID`='$filter1'")or die(mysqli_error());
  $row3=mysqli_fetch_array($query2);
  $filter2 = $row3['User_ID'];
  $query1=mysqli_query($conn,"SELECT * FROM `users` WHERE `User_ID`='$filter2'")or die(mysqli_error());
  $row2=mysqli_fetch_array($query1);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Donation System - Donor Module - <?php echo $row3['Name']; ?> Information</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
</head>
<body>
    <!-- Topbar Start -->
    <div class="container-fluid d-none d-lg-block">
        <div class="row align-items-center py-4 px-xl-5">
            <div class="col-lg-3">
                <a href="" class="text-decoration-none">
                    <h1 class="m-0" style="font-size: 32px;"><span class="text-primary">Donation</span>Central</h1>
                </a>
            </div>
            <div class="col-lg-3 text-right">
                <div class="d-inline-flex align-items-center">
                    <i class="fa fa-2x fa-map-marker-alt text-primary mr-3"></i>
                    <div class="text-left">
                        <h6 class="font-weight-semi-bold mb-1">Our Office</h6>
                        <small>Nairobi, KE.</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 text-right">
                <div class="d-inline-flex align-items-center">
                    <i class="fa fa-2x fa-envelope text-primary mr-3"></i>
                    <div class="text-left">
                        <h6 class="font-weight-semi-bold mb-1">Email Us</h6>
                        <small>donation.central@gmail.com</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 text-right">
                <div class="d-inline-flex align-items-center">
                    <i class="fa fa-2x fa-phone text-primary mr-3"></i>
                    <div class="text-left">
                        <h6 class="font-weight-semi-bold mb-1">Call Us</h6>
                        <small>+254 712 3456789</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0" style="font-size: 32px;"><span class="text-primary">Donation</span>Central</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav py-0">
                            <a href="index3.php" class="nav-item nav-link active">Home</a>
                            <a href="index3.php" class="nav-item nav-link">Database</a>
                            <a href="index3.php" class="nav-item nav-link">My Module</a>
                            <a href="index3.php" class="nav-item nav-link">My Profile</a>
                            <a href="#contact" class="nav-item nav-link">Contact</a>
                        </div>
                        <a class="btn btn-primary py-2 px-4 ml-auto d-none d-lg-block" href="php/logout.php">Logout</a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

<div id="Home">

    <!-- Carousel Start -->
    <div class="container-fluid p-0 pb-5 mb-5">
        <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#header-carousel" data-slide-to="1"></li>
                <li data-target="#header-carousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active" style="min-height: 300px;">
                    <img class="position-relative w-100" src="img/c1.jpg" style="min-height: 300px; object-fit: cover;">
                    <div class="carousel-caption d-flex align-items-center justify-content-center">
                        <div class="p-5" style="width: 100%; max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-md-3">Empower Charities</h5>
                            <h1 class="display-3 text-white mb-md-4">Welcome <?php echo $row1['User_Type']; ?>, <?php echo $row1['Fullname']; ?>!</h1>
                            <a href="#mod" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">My Module</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" style="min-height: 300px;">
                    <img class="position-relative w-100" src="img/c2.jpg" style="min-height: 300px; object-fit: cover;">
                    <div class="carousel-caption d-flex align-items-center justify-content-center">
                        <div class="p-5" style="width: 100%; max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-md-3">Efficient Delivery</h5>
                            <h1 class="display-3 text-white mb-md-4">Welcome <?php echo $row1['User_Type']; ?>, <?php echo $row1['Fullname']; ?>!</h1>
                            <a href="#data" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">View Database</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" style="min-height: 300px;">
                    <img class="position-relative w-100" src="img/c3.jpg" style="min-height: 300px; object-fit: cover;">
                    <div class="carousel-caption d-flex align-items-center justify-content-center">
                        <div class="p-5" style="width: 100%; max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-md-3">Transparent Process</h5>
                            <h1 class="display-3 text-white mb-md-4">Welcome <?php echo $row1['User_Type']; ?>, <?php echo $row1['Fullname']; ?>!</h1>
                            <a href="#contact" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Header Start -->
    <div class="container-fluid page-header" style="margin-bottom: 90px;">
        <div class="container">
            <div class="d-flex flex-column justify-content-center" style="min-height: 300px">
                <h3 class="display-4 text-white text-uppercase">Charity Info</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="index2.php">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase"><?php echo $row3['Name']; ?></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Detail Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-5">
                        
                        <h1 class="mb-5"><?php echo $row3['Name']; ?></h1>
                        <img class="img-fluid rounded mb-4" style="width: 200px;" src="img/<?php echo $row3['Image']; ?>" alt="Image">
                        <p style="text-align: justify; width: 400px; word-wrap: break-word; hyphens: auto;"><?php echo $row3['Description']; ?></p>
                        <br>
                        <h2 class="mb-4">Location:</h2>
                <iframe src="https://maps.google.com/maps?q=<?php echo ($row3['Lat']); ?>, <?php echo ($row3['Long']); ?>&z=15&output=embed" width="360" height="270" frameborder="0" style="border:0"></iframe>
                    </div>

                    <!-- Comment Form -->
                    <div class="bg-secondary rounded p-5">
                        <h3 class="text-uppercase mb-4" style="letter-spacing: 5px;">Make A Donation</h3>
                            <form action="php/functions.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="number" min="0" name="quan" class="form-control border-0 p-4" placeholder="Donation Quantity" required="required" />
                                </div>
                                <div class="form-group">
                                    <label style="color: black;">Donation Image:</label>
                                    <br>
                                    <input type="file" name="image" accept=".jpg, .png, .jpeg" class="form-control border-0 p-4" required="required" />
                                </div>
                                <div class="form-group">
                                    <select class="custom-select border-0 px-4" style="height: 47px;" name="type" required>
                                        <option selected disabled value="">Select A Donation Type</option>
                                        <option value="Money">Money</option>
                                        <option value="Clothes">Clothes</option>
                                        <option value="Books">Books</option>
                                        <option value="Toys">Toys</option>
                                        <option value="Electronics">Electronics</option>
                                        <option value="Tools">Tools</option>
                                    </select>
                                </div>
                                                                <div class="form-group">
                                    <textarea type="text" name="desc" class="form-control border-0 p-4"
                                        placeholder="Donation Description" required="required" /></textarea>
                                </div>
                                <div>
                                    <button class="btn btn-dark btn-block border-0 py-3" type="submit" name="makeD">Submit</button>
                                </div>
                            </form>
                    </div>
                </div>

                <div class="col-lg-4 mt-5 mt-lg-0">
                    <!-- Author Bio -->
                    <div class="d-flex flex-column text-center bg-dark rounded mb-5 py-5 px-4">
                        <img src="img/<?php echo $row2['Profile_Picture']; ?>" class="img-fluid rounded-circle mx-auto mb-3" style="width: 100px;">
                        <h3 class="text-primary mb-3">Charity Owner Details</h3>
                        <h3 class="text-uppercase mb-4" style="letter-spacing: 5px;"><?php echo $row2['Fullname']; ?></h3>
                        <p class="text-white m-0">Reach out on <a href="mailto:<?php echo $row2['Email_Address']; ?>"><?php echo $row2['Email_Address']; ?></a> or <?php echo $row2['Phone_Number']; ?>.</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Detail End -->

</div>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white py-5 px-sm-3 px-lg-5" style="margin-top: 90px;" id="contact">
        <div class="row pt-5">
            <div class="col-lg-12 col-md-12">
                <div class="row">
                    <div class="col-md-6 mb-5">
                        <h5 class="text-primary text-uppercase mb-4" style="letter-spacing: 5px;">Get In Touch</h5>
                        <p><i class="fa fa-map-marker-alt mr-2"></i>Nairobi, KE</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>+254 712 3456789</p>
                        <p><i class="fa fa-envelope mr-2"></i>donation.central@gmail.com</p>
                        <div class="d-flex justify-content-start mt-4">
                            <a class="btn btn-outline-light btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-outline-light btn-square" href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-md-6 mb-5">
                        <h5 class="text-primary text-uppercase mb-4" style="letter-spacing: 5px;">Important Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-white mb-2" href="index3.php"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-white mb-2" href="index3.php"><i class="fa fa-angle-right mr-2"></i>Database</a>
                            <a class="text-white mb-2" href="index3.php"><i class="fa fa-angle-right mr-2"></i>My Module</a>
                            <a class="text-white mb-2" href="index3.php" onclick="viewProf();"><i class="fa fa-angle-right mr-2"></i>My Profile</a>
                            <a class="text-white" href="php/logout.php"><i class="fa fa-angle-right mr-2"></i>Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="row">
            <div class="col-lg-12 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white">&copy; <a href="#">Donation Central</a>. All Rights Reserved.
                </p>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Javascript -->
    <script src="js/main.js"></script>

</body>

</html>