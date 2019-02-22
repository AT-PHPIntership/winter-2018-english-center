@extends('frontend.layouts.master')
@section('content')
    <div class="breadcrumb-banner-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb-text">
                        <h1 class="text-center">PRODUCT DETAILS</h1>
                        <div class="breadcrumb-bar">
                            <ul class="breadcrumb text-center">
                                <li><a href="index.html">Home</a></li>
                                <li>PRODUCT DETAILS</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-details-area section-top-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="product-details-image">
                        <img src="img/details/3.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="product-details-content">
                        <form action="#" method="post">
                            <h2>Title Product Here</h2>
                            <div class="product-name-rating">
                                <h5>Book</h5>
                                <div class="single-item-rating">
                                    <i class="zmdi zmdi-star"></i>
                                    <i class="zmdi zmdi-star"></i>
                                    <i class="zmdi zmdi-star"></i>
                                    <i class="zmdi zmdi-star"></i>
                                    <i class="zmdi zmdi-star-half"></i>
                                </div>
                            </div>
                            <p>There are many variations of passages of Lorepsumavable, but the majority have suffered alteration in some form, by injected humour, </p>
                            <div class="qty">
                                <span>Qty</span>
                                <input type="text" name="qty" id="qty" maxlength="12" value="2" class="input-text qty">
                            </div>
                            <h1 class="p-price">$60</h1>
                            <button type="button" class="button-default">ADD TO CART</button>
                            <span>Share this product</span>
                            <div class="social-links">
                                <a href="#"><i class="zmdi zmdi-facebook"></i></a>
                                <a href="#"><i class="zmdi zmdi-twitter"></i></a>
                                <a href="#"><i class="zmdi zmdi-google-old"></i></a>
                                <a href="#"><i class="zmdi zmdi-instagram"></i></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
