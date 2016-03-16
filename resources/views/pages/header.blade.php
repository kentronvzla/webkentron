<!-- start preloader -->
<div class="preloader">
    <div class="sk-spinner sk-spinner-rotating-plane"></div>
</div>
<!-- end preloader -->

<!-- start navigation -->
<div id="custom-nav" class="navbar yamm navbar-default navbar-fixed-top templatemo-nav">
    <div class="container">
        <div class="navbar-header">
          <button type="button" data-toggle="collapse" data-target="#navbar-collapse-1" class="navbar-toggle">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="{{ url('/') }}">{!! Html::image('assets/img/logokntrans.png', 'Logo Kentron', ['class' => 'img-responsive logo']) !!}</a>
        </div>
        <div id="navbar-collapse-1" class="navbar-collapse collapse">
            @include('pages.menu')
        </div>
    </div>
</div>

<!--<nav id="custom-nav" class="navbar navbar-default navbar-fixed-top templatemo-nav yamm" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Logo</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
           Menu
        </div>
    </div>
</nav>-->

<!-- end navigation -->