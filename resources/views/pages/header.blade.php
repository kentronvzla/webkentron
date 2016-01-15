<!-- start preloader -->
<div class="preloader">
    <div class="sk-spinner sk-spinner-rotating-plane"></div>
</div>
<!-- end preloader -->
<!-- start navigation -->
<nav id="custom-nav" class="navbar navbar-default navbar-fixed-top templatemo-nav yamm" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">{!! Html::image('assets/img/logokntrans.png', 'Logo Kentron', array('class' => 'img-responsive logo')) !!}</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            @include('pages.menu')
        </div>
    </div>
</nav>
<!-- end navigation -->