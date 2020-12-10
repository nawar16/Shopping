<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-093XQMGKWE"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-093XQMGKWE');
</script>
<header id="header"  style="background-color:#F0F0E9;"><!--header--> 

    <div class="header-top"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-1">
                   <!-- <div class="logo pull-left"> col-sm-4
                        <a href="{{url('/')}}"><img src="{{asset('frontEnd/images/home/logo.png')}}" alt="" /></a>
                    </div> -->
                    <div class="btn-group pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                USA
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Canada</a></li>
                                <li><a href="#">UK</a></li>
                            </ul>
                        </div>

                        <div class="btn-group">
                            <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                DOLLAR
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Canadian Dollar</a></li>
                                <li><a href="#">Pound</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-10" style="background-color:#F0F0E9;">
                    <div class="shop-menu pull-right" style="background-color:#F0F0E9;">
                        <ul class="nav navbar-nav">
                            <li><a href="{{url('/viewcart')}}"><button type="button" class="btn btn-default dropdown-toggle "><i class="fa fa-shopping-cart"></i> Cart</button></a></li>
                            @if(Auth::check())
                                <li><a href="{{url('/myaccount')}}"><button type="button" class="btn btn-default dropdown-toggle "><i class="fa fa-user"></i> My Account</button></a></li>
                                <li><a href="{{ url('/logout') }}"><button type="button" class="btn btn-default dropdown-toggle "><i class="fa fa-lock"></i> Logout </button></a>
                                </li>
                            @else
                                <li><a href="{{url('/login_page')}}"><button type="button" class="btn btn-default dropdown-toggle "><i class="fa fa-lock"></i> Login</button></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-middle"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{url('/')}}" class="active">Home</a></li>
                            <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="{{url('/list-products')}}">Products</a></li>
                                    <li><a href="{{url('/myaccount')}}">Account</a></li>
                                    <li><a href="{{url('/viewcart')}}">Cart</a></li>
                                </ul>
                            </li>
                            <li><a href="#f" >Contact</a></li>
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->