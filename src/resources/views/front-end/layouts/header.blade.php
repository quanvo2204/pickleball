
<!DOCTYPE html>
<html class="no-js" lang="en_AU" />
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>@yield('title')</title>
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no" />

	<meta name="HandheldFriendly" content="True" />
	<meta name="pinterest" content="nopin" />

	<meta property="og:locale" content="en_AU" />
	<meta property="og:type" content="website" />
	<meta property="fb:admins" content="" />
	<meta property="fb:app_id" content="" />
	<meta property="og:site_name" content="" />
	<meta property="og:title" content="" />
	<meta property="og:description" content="" />
	<meta property="og:url" content="" />
	<meta property="og:image" content="" />
	<meta property="og:image:type" content="image/jpeg" />
	<meta property="og:image:width" content="" />
	<meta property="og:image:height" content="" />
	<meta property="og:image:alt" content="" />

	<meta name="twitter:title" content="" />
	<meta name="twitter:site" content="" />
	<meta name="twitter:description" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:image:alt" content="" />
	<meta name="twitter:card" content="summary_large_image" />
    <meta name="csrf-token" content="{{ csrf_token() }}">


	<link rel="stylesheet" type="text/css" href="{{ asset('frontend-asset/css/slick.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend-asset/css/slick-theme.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend-asset/css/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend-asset/css/ion.rangeSlider.min.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">



    <link rel="icon" type="image/x-icon" href="{{ asset('logo/phuc.png') }}">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;500&family=Raleway:ital,wght@0,400;0,600;0,800;1,200&family=Roboto+Condensed:wght@400;700&family=Roboto:wght@300;400;700;900&display=swap" rel="stylesheet">

	<!-- Fav Icon -->
	<link rel="shortcut icon" type="image/x-icon" href="#" />
</head>
<body data-instant-intensity="mousedown">

<div class="bg-light top-header">
	<div class="container">
		<div class="row align-items-center py-3 d-none d-lg-flex justify-content-between">
			<div class="col-lg-4 logo">
				<a href="{{ route('front.home')}}" class="text-decoration-none">
					<span class="h1 text-uppercase text-dark bg-primary px-2">HP</span>
					<span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">SHOP</span>
				</a>
			</div>
			<div class="col-lg-6 col-6 text-left  d-flex justify-content-end align-items-center">
				
				<a href="{{ route('account.profile')}}" class="nav-link text-dark">
                    @if (Auth::check())
                        {{Auth::user()->name}}
                    @else
					{{__('message.My account')}}
                    @endif

                </a>
				<form action="{{ route('front.shop')}}">
					<div class="input-group">
						<input value="{{  old('search', Request::get('search'))}}" type="text" placeholder="Search For Products" class="form-control" name="search" id="search">
						<button type="submit" class="input-group-text">
							<i class="fa fa-search"></i>
					  	</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<header class="bg-dark">
	<div class="container">
		<nav class="navbar navbar-expand-xl" id="navbar">
			<a href="{{route('front.home')}}" class="text-decoration-none mobile-logo">
				<span class="h2 text-uppercase text-primary bg-dark">HP</span>
				<span class="h2 text-uppercase text-white px-2">SHOP</span>
			</a>
			<button class="navbar-toggler menu-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      			<!-- <span class="navbar-toggler-icon icon-menu"></span> -->
				  <i class="navbar-toggler-icon fas fa-bars"></i>
    		</button>
    		<div class="collapse navbar-collapse" id="navbarSupportedContent">
      			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
        			<!-- <li class="nav-item">
          				<a class="nav-link active" aria-current="page" href="index.php" title="Products">Home</a>
        			</li> -->
                    @if ((getCategory()->isNotEmpty()))
                        @foreach (getCategory() as $category)
                            <li class="nav-item dropdown">
                                <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ $category->name}}
                                </button>
                                @if ( $category->sub_categories->isNotEmpty())
                                    <ul class="dropdown-menu dropdown-menu-dark">
                                        @foreach ( $category->sub_categories as $sub_category)
                                            <li><a class="dropdown-item nav-link" href="{{ route('front.shop', [$category->slug, $sub_category->slug]) }}">{{$sub_category->name}}</a></li>
                                        @endforeach
                                    </ul>

                                @endif

                            </li>

                        @endforeach
                    @endif

      			</ul>
      		</div>
			<div class="right-nav py-0">
				<a href="{{ route('front.cart') }}" class="ml-3 d-flex pt-2">
					<i class="fas fa-shopping-cart text-primary"></i>
                    @if (Cart::content()->count() > 0)
                        <span class="cart-counter" id="cart-counter">{{ Cart::content()->count()}}</span>
                    @endif

				</a>
			</div>
      	</nav>
  	</div>
</header>
