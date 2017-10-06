<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <title>Coming Soon</title>

    <link href="{{ 'comingsoon/css/bootstrap.css' }}" rel="stylesheet" />
    <link href="{{ 'comingsoon/css/coming-sssoon.css' }}" rel="stylesheet" />

    <!--     Fonts     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Grand+Hotel' rel='stylesheet' type='text/css'>

</head>

<body>
<nav class="navbar navbar-transparent navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#">
                        <i class="fa fa-facebook-square"></i>
                        Share
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-twitter"></i>
                        Tweet
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-envelope-o"></i>
                        Email
                    </a>
                </li>
            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
</nav>
<div class="main" style="background-image: url('comingsoon/images/default.jpg')">
    <div class="cover blue" data-color="blue"></div>

    <!--   You can change the black color for the filter with those colors: blue, green, red, orange       -->

    <div class="container">
        <h1 class="logo cursive">
            Coming Soon
        </h1>
        <!--  H1 can have 2 designs: "logo" and "logo cursive"           -->

        <div class="content">
            <h4 class="motto">Find the best Bootstrap 3 freebies and themes on the web.</h4>
            <div class="subscribe">
                <h5 class="info-text">
                    Join the waiting list for the beta. We'll keep you posted.
                </h5>
                <div class="row">
                    <div class="col-md-4 col-md-offset-4 col-sm6-6 col-sm-offset-3 ">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form class="form-inline" role="form" action="{{ route('marketing.prospect.create') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputEmail2">Email address</label>
                                <input type="email" name="email" class="form-control transparent" placeholder="Email Address">
                            </div>

                            @if (isset($_GET['utm_source']))
                                <input type="hidden" name="utm_source" value="{{ $_GET['utm_source'] }}">
                            @endif

                            @if (isset($_GET['utm_campaign']))
                                <input type="hidden" name="utm_campaign" value="{{ $_GET['utm_campaign'] }}">
                            @endif

                            @if (isset($_SERVER['HTTP_REFERER']))
                                <input type="hidden" name="referrer" value="{{ $_SERVER['HTTP_REFERER'] }}">
                            @endif

                            <button type="submit" class="btn btn-primary btn-fill">Notify Me</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="container">
            &copy; {{ date('Y') }}
        </div>
    </div>
</div>
</body>
<script src="{{ asset('comingsoon/js/jquery-1.10.2.js') }}" type="text/javascript"></script>
<script src="{{ asset('comingsoon/js/bootstrap.min.js') }}" type="text/javascript"></script>

</html>