<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Admin Dashbord</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />

	<!-- Fonts and icons -->
	<script src="/base/assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['/base/assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="/base/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="/base/assets/css/atlantis.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="/base/assets/css/demo.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
	<style>
		select.form-control + .chosen-container.chosen-container-single .chosen-single {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.428571429;
    color: #555;
    vertical-align: middle;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);
    -webkit-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    background-image:none;
}

select.form-control + .chosen-container.chosen-container-single .chosen-single div {
    top:4px;
    color:#000;
}

select.form-control + .chosen-container .chosen-drop {
    background-color: #FFF;
    border: 1px solid #CCC;
    border: 1px solid rgba(0, 0, 0, 0.15);
    border-radius: 4px;
    -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
    background-clip: padding-box;
    margin: 2px 0 0;

}

select.form-control + .chosen-container .chosen-search input[type=text] {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.428571429;
    color: #555;
    vertical-align: middle;
    background-color: #FFF;
    border: 1px solid #CCC;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    -webkit-transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
    transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
    background-image:none;
}

select.form-control + .chosen-container .chosen-results {
    margin: 2px 0 0;
    padding: 5px 0;
    font-size: 14px;
    list-style: none;
    background-color: #fff;
    margin-bottom: 5px;
}

select.form-control + .chosen-container .chosen-results li , 
select.form-control + .chosen-container .chosen-results li.active-result {
    display: block;
    padding: 3px 20px;
    clear: both;
    font-weight: normal;
    line-height: 1.428571429;
    color: #333;
    white-space: nowrap;
    background-image:none;
}
select.form-control + .chosen-container .chosen-results li:hover, 
select.form-control + .chosen-container .chosen-results li.active-result:hover,
select.form-control + .chosen-container .chosen-results li.highlighted
{
    color: #FFF;
    text-decoration: none;
    background-color: #428BCA;
    background-image:none;
}

select.form-control + .chosen-container-multi .chosen-choices {
    display: block;
    width: 100%;
    min-height: 34px;
    padding: 6px;
    font-size: 14px;
    line-height: 1.428571429;
    color: #555;
    vertical-align: middle;
    background-color: #FFF;
    border: 1px solid #CCC;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    -webkit-transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
    transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
    background-image:none;
}

select.form-control + .chosen-container-multi .chosen-choices li.search-field input[type="text"] {
    height:auto;
    padding:5px 0;
}

select.form-control + .chosen-container-multi .chosen-choices li.search-choice {

    background-image: none;
    padding: 3px 24px 3px 5px;
    margin: 0 6px 0 0;
    font-size: 14px;
    font-weight: normal;
    line-height: 1.428571429;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    cursor: pointer;
    border: 1px solid #ccc;
    border-radius: 4px;
    color: #333;
    background-color: #FFF;
    border-color: #CCC;
}

select.form-control + .chosen-container-multi .chosen-choices li.search-choice .search-choice-close {
    top:8px;
    right:6px;
}

select.form-control + .chosen-container-multi.chosen-container-active .chosen-choices,
select.form-control + .chosen-container.chosen-container-single.chosen-container-active .chosen-single,
select.form-control + .chosen-container .chosen-search input[type=text]:focus{
    border-color: #66AFE9;
    outline: 0;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075),0 0 8px rgba(102, 175, 233, 0.6);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075),0 0 8px rgba(102, 175, 233, 0.6);
}

select.form-control + .chosen-container-multi .chosen-results li.result-selected{
    display: list-item;
    color: #ccc;
    cursor: default;
    background-color: white;
}

select:invalid {
    height: 0px !important;
    opacity: 0 !important;
    position: absolute !important;
    display: flex !important;
}

select:invalid[multiple] {
    margin-top: 15px !important;
}
	</style>
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				
				<a href="{{ route('dashboard') }}" class="logo">
					{{-- <img src="/base/assets/img/logo.svg" alt="navbar brand" class="navbar-brand"> --}}
					<h1>Dashbord</h1>
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
				
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
					
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="/base/assets/img/images.jpeg" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="/base/assets/img/images.jpeg" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4>{{ Auth::user()->name }}</h4>
												{{-- <p class="text-muted">hello@example.com</p><a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View Profile</a> --}}
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="{{ route('logout') }}"
										onclick="event.preventDefault();
													  document.getElementById('logout-form').submit();">
											Logout</a>
									</li>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="/base/assets/img/images.jpeg" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									{{ Auth::user()->name }}
									<span class="user-level">online</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							{{-- <div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="#edit">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Settings</span>
										</a>
									</li>
								</ul>
							</div> --}}
						</div>
					</div>
					<ul class="nav nav-primary">
					
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Components</h4>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#base">
								<i class="fa fa-user"></i>
								<p>User</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{ route('user') }}">
											<span class="sub-item">All Users</span>
										</a>
									</li>
								
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#sidebarLayouts">
								<i class="fa fa-th-list"></i>
								<p>Courses</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="sidebarLayouts">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{ route('get_course') }}">
											<span class="sub-item">Courses</span>
										</a>
									</li>
									<li>
										<a href="overlay-sidebar.html">
											<span class="sub-item">Newsletter</span>
										</a>
									</li>
									
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#tables">
								<i class="fa fa-newspaper-o"></i>
								<p>Blog</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="tables">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{ route('get_blog') }}">
											<span class="sub-item">All Blogs</span>
										</a>
									</li>
									<li>
										<a href="tables/datatables.html">
											<span class="sub-item">Newsletter</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

						<li class="nav-item">
							<a data-toggle="collapse" href="#donate">
								<i class="fa fa-th-list"></i>
								<p>Donation Plans</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="donate">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{ route('plans') }}">
											<span class="sub-item"> All Plans</span>
										</a>
									</li>
									
								</ul>
							</div>
						</li>

						<li class="nav-item">
							<a data-toggle="collapse" href="#message">
								<i class="fa fa-envelope"></i>
								<p>Messages</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="message">
								<ul class="nav nav-collapse">
									<li>
										<a href="sidebar-style-1.html">
											<span class="sub-item">All Messages</span>
										</a>
									</li>
									
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#event">
								<i class="fa fa-calendar"></i>
								<p>Events</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="event">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{ route('get_event') }}">
											<span class="sub-item">All Events</span>
										</a>
									</li>
									
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#gallery">
								<i class="fa fa-calendar"></i>
								<p>Gallery</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="gallery">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{ route('get_gallery') }}">
											<span class="sub-item">Upload photos</span>
										</a>
									</li>
									
								</ul>
							</div>
						</li>
						
						<li class="nav-item">
							<a href="{{ route('get_etting') }}">
								<i class="fa fa-cog"></i>
								<p>Settings</p>
								{{-- <span class="badge badge-success">4</span> --}}
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				@yield('content')
			
			</div>
			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul class="nav">
						
							<li class="nav-item">
								<a class="nav-link" href="{{ url('/') }}">
									Visit site
								</a>
							</li>
						</ul>
					</nav>
					<div class="copyright ml-auto">
						2020, made with <i class="fa fa-heart heart text-danger"></i> by <a href="https://www.themekita.com">Rashid</a>
					</div>				
				</div>
			</footer>
		</div>
		
		<!-- Custom template | don't include it in your project! -->
		<div class="custom-template">
			<div class="title">Settings</div>
			<div class="custom-content">
				<div class="switcher">
					<div class="switch-block">
						<h4>Logo Header</h4>
						<div class="btnSwitch">
							<button type="button" class="changeLogoHeaderColor" data-color="dark"></button>
							<button type="button" class="selected changeLogoHeaderColor" data-color="blue"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="green"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="red"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="white"></button>
							<br/>
							<button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Navbar Header</h4>
						<div class="btnSwitch">
							<button type="button" class="changeTopBarColor" data-color="dark"></button>
							<button type="button" class="changeTopBarColor" data-color="blue"></button>
							<button type="button" class="changeTopBarColor" data-color="purple"></button>
							<button type="button" class="changeTopBarColor" data-color="light-blue"></button>
							<button type="button" class="changeTopBarColor" data-color="green"></button>
							<button type="button" class="changeTopBarColor" data-color="orange"></button>
							<button type="button" class="changeTopBarColor" data-color="red"></button>
							<button type="button" class="changeTopBarColor" data-color="white"></button>
							<br/>
							<button type="button" class="changeTopBarColor" data-color="dark2"></button>
							<button type="button" class="selected changeTopBarColor" data-color="blue2"></button>
							<button type="button" class="changeTopBarColor" data-color="purple2"></button>
							<button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
							<button type="button" class="changeTopBarColor" data-color="green2"></button>
							<button type="button" class="changeTopBarColor" data-color="orange2"></button>
							<button type="button" class="changeTopBarColor" data-color="red2"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Sidebar</h4>
						<div class="btnSwitch">
							<button type="button" class="selected changeSideBarColor" data-color="white"></button>
							<button type="button" class="changeSideBarColor" data-color="dark"></button>
							<button type="button" class="changeSideBarColor" data-color="dark2"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Background</h4>
						<div class="btnSwitch">
							<button type="button" class="changeBackgroundColor" data-color="bg2"></button>
							<button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
							<button type="button" class="changeBackgroundColor" data-color="bg3"></button>
							<button type="button" class="changeBackgroundColor" data-color="dark"></button>
						</div>
					</div>
				</div>
			</div>
			<div class="custom-toggle">
				<i class="flaticon-settings"></i>
			</div>
		</div>
		<!-- End Custom template -->
	</div>
	<!--   Core JS Files   -->
	<script src="/base/assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="/base/assets/js/core/popper.min.js"></script>
	<script src="/base/assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="/base/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="/base/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="/base/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="/base/assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="/base/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="/base/assets/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="/base/assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="/base/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="/base/assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="/base/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="/base/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="/base/assets/js/atlantis.min.js"></script>
	<script src="/base/assets/js/setting-demo.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
	<script src="https://rawgit.com/moment/moment/2.2.1/min/moment.min.js"></script>
	<script src="https://cdn.tiny.cloud/1/n53cqwzg3ja2coxuklqzd3fpg9nxm5hp38cs5cnis8o4kcsa/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    {{-- <script src="http://harvesthq.github.io/chosen/chosen.jquery.js"></script> --}}
	
	{{-- <script src="/base/assets/js/demo.js"></script> --}}

	<script>
	$(document).ready(function(){
		$.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
	  });
	  
	  tinymce.init({
        selector:'textarea',
		height: 300
	  })

		@if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
            @endif
            @if(Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
            @endif
            @if(Session::has('info'))
            toastr.info("{{ Session::get('info') }}");
            @endif
			@if(Session::has('warning'))
			toastr.warning("{{ Session::get('warning') }}");
			@endif

			$('.chosen').chosen({"width": "350px"});
	})
	</script>
	@stack('scripts')
</body>
</html>