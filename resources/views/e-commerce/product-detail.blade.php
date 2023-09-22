@extends('layout.e-commerce')

@section('title', 'Product Detail')
@section('content')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Products</a></li>
                <li class="breadcrumb-item active">Product Detail</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Detail Start -->
    <div class="product-detail">
        <div class="container-fluid">
            <div class="row">
                @foreach ($productDetail as $item)
                    <div class="col-lg-8">
                        <div class="product-detail-top">
                            <div class="row align-items-center">
                                <div class="col-md-5">
                                    <div class="product-slider-single normal-slider">
                                        <img src="{{ asset('img') }}/{{ $item->image }}" alt="Product Image">
                                    </div>
                                    <div class="product-slider-single-nav normal-slider">
                                        <div class="slider-nav-img"><img src="{{ asset('img') }}/{{ $item->image }}"
                                                alt="Product Image"></div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="product-content">
                                        <div class="title">
                                            <h2>{{ $item->name }}</h2>
                                        </div>
                                        <div class="ratting">
                                            @for ($i = 0; $i < $item->ratting; $i++)
                                                <i class="fa fa-star"></i>
                                            @endfor
                                        </div>
                                        <div class="price">
                                            <h4>Price:</h4>
                                            <p>${{ $item->sale_price }} <span>${{ $item->original_price }}</span></p>
                                        </div>
                                        <div class="quantity">
                                            <h4>Quantity:</h4>
                                            <div class="qty">
                                                <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                                <input type="text" value="1">
                                                <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                        <div class="p-size">
                                            <h4>Size:</h4>
                                            <div class="btn-group btn-group-sm">
                                                <button type="button" class="btn">S</button>
                                                <button type="button" class="btn">M</button>
                                                <button type="button" class="btn">L</button>
                                                <button type="button" class="btn">XL</button>
                                            </div>
                                        </div>
                                        <div class="p-color">
                                            <h4>Color:</h4>
                                            <div class="btn-group btn-group-sm">
                                                <button type="button" class="btn">White</button>
                                                <button type="button" class="btn">Black</button>
                                                <button type="button" class="btn">Blue</button>
                                            </div>
                                        </div>
                                        <div class="action">
                                            <a class="btn" href="#"><i class="fa fa-shopping-cart"></i>Add to
                                                Cart</a>
                                            <a class="btn" href="#"><i class="fa fa-shopping-bag"></i>Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row product-detail-bottom">
                            <div class="col-lg-12">
                                <ul class="nav nav-pills nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#description">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#specification">Specification</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#reviews">Reviews (1)</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div id="description" class="container tab-pane active">
                                        <h4>Product description</h4>
                                        <p>
                                            {{ $item->description }}
                                        </p>
                                    </div>
                                    <div id="specification" class="container tab-pane fade">
                                        <h4>Product specification</h4>
                                        <ul>
                                            <li>Lorem ipsum dolor sit amet</li>
                                            <li>Lorem ipsum dolor sit amet</li>
                                            <li>Lorem ipsum dolor sit amet</li>
                                            <li>Lorem ipsum dolor sit amet</li>
                                            <li>Lorem ipsum dolor sit amet</li>
                                        </ul>
                                    </div>
                                    <div id="reviews" class="container tab-pane fade">
                                        @foreach ($reviews as $r)
                                            <div class="reviews-submitted">
                                                <div class="reviewer">{{ $r->name }} -
                                                    <span>{{ $r->created_at }}</span>
                                                </div>
                                                <div class="ratting">
                                                    @for ($i = 0; $i < $r->ratting; $i++)
                                                        <i class="fa fa-star"></i>
                                                    @endfor
                                                </div>
                                                <p>
                                                    {{ $r->review }}
                                                </p>
                                            </div>
                                        @endforeach
                                        <form method="POST" action="{{ route('review_post', ['category_id' => $item->category_id, 'product_id' => $item->id]) }}">
                                            @csrf
                                            <div class="reviews-submit">
                                                <h4>Give your Review:</h4>
                                                <div class="ratting" id="rating-stars">
                                                    <i class="far fa-star" data-rating="1"></i>
                                                    <i class="far fa-star" data-rating="2"></i>
                                                    <i class="far fa-star" data-rating="3"></i>
                                                    <i class="far fa-star" data-rating="4"></i>
                                                    <i class="far fa-star" data-rating="5"></i>
                                                </div>
                                                <input type="hidden" name="rating" id="rating" value="0">
                                                <div class="row form">
                                                    <div class="col-sm-6">
                                                        <input name="name" type="text" placeholder="Name"
                                                            value="{{ old('name') }}">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input name="email" type="email" placeholder="Email"
                                                            value="{{ old('email') }}">
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <textarea placeholder="Review" name="review">{{ old('review') }}</textarea>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <button>Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                            @if (session()->get('success'))
                                                <div class="alert alert-success text-center">
                                                    {{ session()->get('success') }}
                                                </div>
                                            @endif
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="product">
                            <div class="section-header">
                                <h1>Related Products</h1>
                            </div>

                            <div class="row align-items-center product-slider product-slider-3">
                                @foreach ($products as $items)
                                    <div class="col-lg-3">
                                        <div class="product-item">
                                            <div class="product-title">
                                                <a
                                                    href="/product-detail/{{ $items->category_id }}/{{ $items->id }}">{{ $items->name }}</a>
                                                <div class="ratting">
                                                    @for ($i = 0; $i < $items->ratting; $i++)
                                                        <i class="fa fa-star"></i>
                                                    @endfor
                                                </div>
                                            </div>
                                            <div class="product-image">
                                                <a href="product-detail.html">
                                                    <img src="{{ asset('img') }}/{{ $items->image }}"
                                                        alt="Product Image">
                                                </a>
                                                <div class="product-action">
                                                    <a href="#"><i class="fa fa-cart-plus"></i></a>
                                                    <a href="#"><i class="fa fa-heart"></i></a>
                                                    <a
                                                        href="/product-detail/{{ $item->category_id }}/{{ $items->id }}"><i
                                                            class="fa fa-search"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-price">
                                                <h3><span>$</span>99</h3>
                                                <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy
                                                    Now</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- Side Bar Start -->
                <div class="col-lg-4 sidebar">
                    <div class="sidebar-widget category">
                        <h2 class="title">Category</h2>
                        <nav class="navbar bg-light">
                            <ul class="navbar-nav">
                                @foreach ($categories as $item)
                                    <li class="nav-item">
                                        <a class="nav-link" href="/product-list/{{ $item->id }}"><i
                                                class="fa {{ $item->icon }}"></i>{{ $item->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>

                    <div class="sidebar-widget widget-slider">
                        <div class="sidebar-slider normal-slider">
                            @foreach ($products as $item)
                                <div class="product-item">
                                    <div class="product-title">
                                        <a
                                            href="/product-detail/{{ $item->category_id }}/{{ $item->id }}">{{ $item->name }}</a>
                                        <div class="ratting">
                                            @for ($i = 0; $i < $item->ratting; $i++)
                                                <i class="fa fa-star"></i>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="product-image">
                                        <a href="product-detail.html">
                                            <img src="{{ asset('img') }}/{{ $item->image }}" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="/product-detail/{{ $item->category_id }}/{{ $item->id }}">
                                                <i class="fa fa-search"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span>$</span>{{ $item->original_price }}</h3>
                                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="sidebar-widget brands">
                        <h2 class="title">Our Brands</h2>
                        <ul>
                            <li><a href="#">Nulla </a><span>(45)</span></li>
                            <li><a href="#">Curabitur </a><span>(34)</span></li>
                            <li><a href="#">Nunc </a><span>(67)</span></li>
                            <li><a href="#">Ullamcorper</a><span>(74)</span></li>
                            <li><a href="#">Fusce </a><span>(89)</span></li>
                            <li><a href="#">Sagittis</a><span>(28)</span></li>
                        </ul>
                    </div>

                    <div class="sidebar-widget tag">
                        <h2 class="title">Tags Cloud</h2>
                        <a href="#">Lorem ipsum</a>
                        <a href="#">Vivamus</a>
                        <a href="#">Phasellus</a>
                        <a href="#">pulvinar</a>
                        <a href="#">Curabitur</a>
                        <a href="#">Fusce</a>
                        <a href="#">Sem quis</a>
                        <a href="#">Mollis metus</a>
                        <a href="#">Sit amet</a>
                        <a href="#">Vel posuere</a>
                        <a href="#">orci luctus</a>
                        <a href="#">Nam lorem</a>
                    </div>
                </div>
                <!-- Side Bar End -->
            </div>
        </div>
    </div>
    <!-- Product Detail End -->

    <script>
        const ratingStars = document.querySelectorAll('#rating-stars i');
        const ratingInput = document.getElementById('rating');
    
        ratingStars.forEach(star => {
            star.addEventListener('click', () => {
                const ratingValue = parseInt(star.getAttribute('data-rating'));
                ratingInput.value = ratingValue;
    
                // Cambiar el ícono de estrella de vacía a llena según la calificación
                ratingStars.forEach((s, index) => {
                    if (index < ratingValue) {
                        s.classList.remove('far');
                        s.classList.add('fas');
                    } else {
                        s.classList.remove('fas');
                        s.classList.add('far');
                    }
                });
            });
        });
    </script>
    
    
    

@endsection
