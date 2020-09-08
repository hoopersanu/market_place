<html>
    <head>
	<title> Dashboard </title>
	@include("header")
    </head>

    <body style="background-image: none !important;">
	<!-- navigationbar start -->
    <div class="bgimg12">
		<nav class="navbar navbar-expand-md bg-dark navbar-dark">
			<div class="container">
				<a href="javascript:void(0);" class="navbar-brand text-warning font-weight-bold"> Market Place</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsenavbar">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse text-center" id="collapsenavbar">
					<ul class="navbar-nav m-auto ">
						<li class="nav-item">
                        <a href="{{url('view-admin-offer')}}" class="nav-link text-white">View Offer</a>
                        </li>

                    </ul>


                    <ul class="navbar-nav ml-auto">
                       <li class="nav-item">
                            <a href="{{url('admin-logout')}}" class="nav-link pull-right"><strong>Logout</strong></a>
                        </li>
                    </ul>
				</div>
			</div>
		</nav>
    </div>
    <!-- navigationbar end -->

    @yield("content")

    </body>
</html>
