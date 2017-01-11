<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Amirkabir Studio</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="OwlCarousel/dist/assets/owl.carousel.min.css" />

    <!-- Material Design Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Material Design Bootstrap -->
    <link href="MDB/css/mdb.css" rel="stylesheet">

    <link href="bootstrap-star-rating-master/css/star-rating.css" media="all" rel="stylesheet" type="text/css" />
    <link href="bootstrap-star-rating-master/themes/krajee-fa/theme.css" media="all" rel="stylesheet" type="text/css" />


    <link href="css/base.css" rel="stylesheet">
    <link href="css/home_custom.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div>
        <nav class="navbar nav-justified no-margin transparent-nav">
            <div class="container">
                <div class="navbar-header pull-right">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <div><span>امیرکبیر</span><span class="studio">استودیو</span><img src="images/gamepad.png" class="gamepad"></div>
                    </a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><input type="button" onclick="location.href='register';" value="ثبت نام" class="btn btn-default"/></li>
                        <li><a href="login"><span>ورود</span></a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="large-carousel" class="carousel slide" data-ride="carousel" data-interval="false">
            <div class="carousel-inner" role="listbox"></div>
        </div>
    </div>
    <div class="owl-carousel owl-theme"></div>
    <div class="latest-games-container">
        <div class="row">
            <div class="text-right">
                <span class="title">جدیدترین بازی ها</span>
            </div>
        </div>
        <div id="latest-carousel" class="carousel slide" data-ride="carousel" data-interval="8000">
            <ol class="carousel-indicators">
                <li data-target="#latest-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#latest-carousel" data-slide-to="1"></li>
                <li data-target="#latest-carousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox"></div>
        </div>
    </div>
    <div class="guides-and-comments-container">
            <div class="text-right">
                <span class="title">نظرات کاربران و راهنمای بازی ها</span>
            </div>
        <div class="row no-margin">
            <div class="col-md-3"></div>
            <div class="col-md-3 mycontainer">
                <div class="text-right">
                    <span class="subtitle">آخرین راهنمای بازی ها</span>
                </div>
                <div class="list-group guides"></div>
            </div>
            <div class="col-md-3 mycontainer">
                <div class="text-right">
                    <span class="subtitle">نظرات و گفتگوها</span>
                </div>
                <div class="list-group comments"></div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    <div class="join-us">
        <br/><br/><br/><br/><br/><br/><br/>
        <div class="text-center">
            <span id="first">به جامعه بازی سازان امیرکبیر بپیوندید</span>
            <br/>
            <span id="second">بیش از ۵۰۰۰ عضو در سراسر کشور</span>
            <br/><br/>
            <button type="button" class="btn btn-default">به ما بپیوندید</button>
        </div>
        <br/><br/><br/><br/><br/><br/><br/>
    </div>
    <footer>
        <div class="footer" id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <a href="index.htm"><span>امیرکبیر</span><span class="studio">استودیو</span><img src="images/gamepad2.png" class="gamepad"></a>
                    </div>
                    <div class="col-md-9 pull-right">
                        <span class="pull-right">
                            <a href="index.htm">صفحه اصلی</a>
                            <a href="#">درباره ما</a>
                            <a href="#">ارتباط با سازندگان</a>
                            <a href="#">سوالات متداول</a>
                            <a href="#">حریم خصوصی</a>
                        </span>
                    </div>
                </div>
                <div class="row pull-right">
                    <ul class="social">
                        <li> <a href="#"> <i class=" fa fa-facebook">   </i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-twitter">   </i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-instagram">   </i> </a> </li>
                    </ul>
                </div>
                <!--/.row-->
            </div>
            <!--/.container-->
        </div>
        <!--/.footer-->

        <div class="footer-bottom text-center text-right">
            <div class="container">
                <p>تمامی حقوق محفوظ و متعلق به دانشگاه امیرکبیر است.</p>
            </div>
        </div>
        <!--/.footer-bottom-->
    </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!--<script src="OwlCarousel/docs/assets/vendors/jquery.min.js"></script>-->
    <script src="OwlCarousel/dist/owl.carousel.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- Material Design Bootstrap -->
    <script type="text/javascript" src="MDB/js/mdb.js"></script>
    <script src="bootstrap-star-rating-master/js/star-rating.js" type="text/javascript"></script>

    <!-- optionally if you need to use a theme, then include the theme JS file as mentioned below -->
    <script src="bootstrap-star-rating-master/themes/krajee-fa/theme.js"></script>

    <script type="text/javascript" src="home.js"></script>
</body>
</html>
