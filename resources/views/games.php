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

    <!-- Material Design Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Material Design Bootstrap -->
    <link href="MDB/css/mdb.css" rel="stylesheet">

    <link href="bootstrap-star-rating-master/css/star-rating.css" media="all" rel="stylesheet" type="text/css" />
    <link href="bootstrap-star-rating-master/themes/krajee-fa/theme.css" media="all" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="css/hw4-global.css">
    <link rel="stylesheet" href="css/leaderboard.css">

    <link href="css/base.css" rel="stylesheet">
    <link href="css/games_custom.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="modal fade" id="comment_modal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="text-right"><h4 class="modal-title">نظر دهید</h4></div>
                </div>
                <div class="modal-body">
                    <div class="text-right"><input type="text" placeholder="متن نظر"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ثبت نظر</button>
                </div>
            </div>

        </div>
    </div>
    <nav class="navbar no-pad-mar navbar-fixed-top">
        <div class="container">
            <div class="navbar-header pull-right">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">
                    <div><span>امیرکبیر</span><span class="studio">استودیو</span><img src="images/gamepad2.png" class="gamepad"></div>
                </a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/login"><span>ورود</span></a></li>
                    <li><span class="material-icons navbar-icon">person</span></li>
                    <li>
                        <div class="span12">
                            <form id="custom-search-form" class="form-search form-horizontal pull-right" method="get" action="list.htm">
                                <div class="input-append span12 text-right">
                                    <input type="text" class="search-query" placeholder="جست و جو ..." name="q">
                                        <button type="submit" class="btn search"><span class="material-icons">search</span></button>
                                </div>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="header-div">
        <div class="header-img"></div>
    </div>
    <ul class="nav nav-tabs tabs-5">
        <li><a data-toggle="tab" href="#menu5">عکس ها و ویدئو ها</a></li>
        <li><a data-toggle="tab" href="#menu4">بازی های مشابه</a></li>
        <li><a data-toggle="tab" href="#menu3">نظرات کاربران</a></li>
        <li><a data-toggle="tab" href="#menu2">رتبه بندی و امتیازات</a></li>
        <li class="active"><a data-toggle="tab" href="#menu1">اطلاعات بازی</a></li>
    </ul>
    <div class="tab-content">
        <div id="menu1" class="tab-pane active container">
            <div class="page-header">
                <div class="row">
                    <div class="text-right content-title">اطلاعات بازی</div>
                </div>
            </div>
            <div class="content text-right"></div>
        </div>
        <div id="menu2" class="tab-pane container">
            <div class="page-header">
                <div class="row">
                    <div class="text-right content-title">رتبه بندی و امتیازات</div>
                </div>
            </div>
            <div class="content"></div>
        </div>
        <div id="menu3" class="tab-pane container">
            <div class="page-header"></div>
            <div class="content"></div>
            <div class="text-center">
                <button type="button" class="btn btn-default" id="load_more_comment">بارگذاری نظرات بعدی</button>
            </div>
        </div>
        <div id="menu4" class="tab-pane container">
            <div class="page-header">
                <div class="row">
                    <div class="text-right content-title">بازی های مشابه</div>
                </div>
            </div>
            <div class="content"></div>
        </div>
        <div id="menu5" class="tab-pane container">
            <div class="page-header">
                <div class="row">
                    <div class="text-right content-title">عکس ها و ویدئو ها</div>
                </div>
            </div>
            <div class="content"></div>
        </div>
    </div>
    <footer>
        <div class="footer" id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <a href="index"><span>امیرکبیر</span><span class="studio">استودیو</span><img src="images/gamepad2.png" class="gamepad"></a>
                    </div>
                    <div class="col-md-9 pull-right">
                        <span class="pull-right">
                            <a href="index">صفحه اصلی</a>
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
    <script src="js/bootstrap.min.js"></script>

    <!-- Material Design Bootstrap -->
    <script type="text/javascript" src="MDB/js/mdb.js"></script>
    <script src="bootstrap-star-rating-master/js/star-rating.js" type="text/javascript"></script>

    <script src="bootstrap-star-rating-master/themes/krajee-fa/theme.js"></script>

    <script type="text/javascript" src="games.js"></script>

</body>

</html>