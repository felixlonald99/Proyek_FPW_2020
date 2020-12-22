<title>HotelInn</title>
@extends('home')
@section('content')
@if (Session::has('message'))
        <script>alert(`{{ Session::get('message') }}`)</script>
@endif

    <div class="tm-main-content" id="top">
        <div class="tm-top-bar-bg"></div>
        <div class="tm-section tm-bg-img" id="tm-section-1">
            <div class="tm-bg-white ie-container-width-fix-2">
                <div class="container ie-h-align-center-fix">
                    <div class="row">
                        <div class="col-xs-12 ml-auto mr-auto ie-container-width-fix">
                            <form action="/findRoom" method="post" class="tm-search-form tm-section-pad-2">
                                @csrf
                                <div class="form-row tm-search-form-row">
                                    <div class="form-group tm-form-element tm-form-element-100">
                                        <i class="fa fa-map-marker fa-2x tm-form-element-icon"></i>
                                        <input name="city" type="text" class="form-control" id="inputCity" value="HotelInn" placeholder="HotelInn..." disabled>
                                    </div>
                                    <div class="form-group tm-form-element tm-form-element-50">
                                        <i class="fa fa-calendar fa-2x tm-form-element-icon"></i>
                                        <input name="checkin" type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" placeholder="Check In">
                                    </div>
                                    <div class="form-group tm-form-element tm-form-element-50">
                                        <i class="fa fa-moon-o fa-2x tm-form-element-icon"></i>
                                        <select name="night" class="form-control tm-select">
                                            <option value="">Night</option>
                                            <option value="1">1 night</option>
                                            <option value="2">2 night</option>
                                            <option value="3">3 night</option>
                                            <option value="4">4 night</option>
                                            <option value="5">5 night</option>
                                            <option value="6">6 night</option>
                                            <option value="7">7 night</option>
                                            <option value="8">8 night</option>
                                            <option value="9">9 night</option>
                                            <option value="10">10 night</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row tm-search-form-row">
                                    <div class="form-group tm-form-element tm-form-element-4">
                                        <select name="room" class="form-control tm-select" id="room">
                                            <option value="">Room</option>
                                            <option value="1">1 room</option>
                                            <option value="2">2 room</option>
                                            <option value="3">3 room</option>
                                            <option value="4">4 room</option>
                                            <option value="5">5 room</option>
                                            <option value="6">6 room</option>
                                            <option value="7">7 room</option>
                                            <option value="8">8 room</option>
                                            <option value="9">9 room</option>
                                            <option value="10">10 room</option>
                                        </select>
                                        <i class="fa fa-2x fa-bed tm-form-element-icon"></i>
                                    </div>
                                    <div class="form-group tm-form-element tm-form-element-2">
                                        <button type="submit" class="btn btn-primary tm-btn-search">FIND ROOM</button>
                                    </div>
                                  </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tm-section-2">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h2 class="tm-section-title">We are here to help you?</h2>
                        <p class="tm-color-white tm-section-subtitle">Subscribe to get our newsletters</p>
                        <a href="#" class="tm-color-white tm-btn-white-bordered">Subscribe Newletters</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="tm-section tm-position-relative">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none" class="tm-section-down-arrow">
                <polygon fill="#ee5057" points="0,0  100,0  50,60"></polygon>
            </svg>
            <div class="container tm-pt-5 tm-pb-4">
                <div class="row text-center">
                    <article class="col-sm-12 col-md-4 col-lg-4 col-xl-4 tm-article">
                        <i class="fa tm-fa-6x fa-legal tm-color-primary tm-margin-b-20"></i>
                        <h3 class="tm-color-primary tm-article-title-1">Pellentesque accumsan arcu nec dolor tempus</h3>
                        <p>Pellentesque at velit ante. Duis scelerisque metus vel felis porttitor gravida. Donec at felis libero. Mauris odio tortor.</p>
                        <a href="#" class="text-uppercase tm-color-primary tm-font-semibold">Continue reading...</a>
                    </article>
                    <article class="col-sm-12 col-md-4 col-lg-4 col-xl-4 tm-article">
                        <i class="fa tm-fa-6x fa-plane tm-color-primary tm-margin-b-20"></i>
                        <h3 class="tm-color-primary tm-article-title-1">Duis scelerisque metus vel felis porttitor</h3>
                        <p>Pellentesque at velit ante. Duis scelerisque metus vel felis porttitor gravida. Donec at felis libero. Mauris odio tortor.</p>
                        <a href="#" class="text-uppercase tm-color-primary tm-font-semibold">Continue reading...</a>
                    </article>
                    <article class="col-sm-12 col-md-4 col-lg-4 col-xl-4 tm-article">
                        <i class="fa tm-fa-6x fa-life-saver tm-color-primary tm-margin-b-20"></i>
                        <h3 class="tm-color-primary tm-article-title-1">Etiam aliquam arcu at mauris consectetur</h3>
                        <p>Pellentesque at velit ante. Duis scelerisque metus vel felis porttitor gravida. Donec at felis libero. Mauris odio tortor.</p>
                        <a href="#" class="text-uppercase tm-color-primary tm-font-semibold">Continue reading...</a>
                    </article>
                </div>
            </div>
        </div>

        <div class="tm-section tm-section-pad tm-bg-gray" id="tm-section-4">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
                        <div class="tm-article-carousel">
                            <article class="tm-bg-white mr-2 tm-carousel-item">
                                <img src="{{ url("/templateweb/img/img-01.jpg")}}" alt="Image" class="img-fluid">
                                <div class="tm-article-pad">
                                    <header><h3 class="text-uppercase tm-article-title-2">Nunc in felis aliquet metus luctus iaculis</h3></header>
                                    <p>Aliquam ac lacus volutpat, dictum risus at, scelerisque nulla. Nullam sollicitudin at augue venenatis eleifend. Nulla ligula ligula, egestas sit amet viverra id, iaculis sit amet ligula.</p>
                                    <a href="#" class="text-uppercase btn-primary tm-btn-primary">Get More Info.</a>
                                </div>
                            </article>
                            <article class="tm-bg-white mr-2 tm-carousel-item">
                                <img src="{{ url("/templateweb/img/img-02.jpg")}}" alt="Image" class="img-fluid">
                                <div class="tm-article-pad">
                                    <header><h3 class="text-uppercase tm-article-title-2">Sed cursus dictum nunc quis molestie</h3></header>
                                    <p>Pellentesque quis dui sit amet purus scelerisque eleifend sed ut eros. Morbi viverra blandit massa in varius. Sed nec ex eu ex tincidunt iaculis. Curabitur eget turpis gravida.</p>
                                    <a href="#" class="text-uppercase btn-primary tm-btn-primary">View Detail</a>
                                </div>
                            </article>
                            <article class="tm-bg-white mr-2 tm-carousel-item">
                                <img src="{{ url("/templateweb/img/img-03.jpg")}}" alt="Image" class="img-fluid">
                                <div class="tm-article-pad">
                                    <header><h3 class="text-uppercase tm-article-title-2">Eget diam pellentesque interdum ut porta</h3></header>
                                    <p>Aenean finibus tempor nulla, et maximus nibh dapibus ac. Duis consequat sed sapien venenatis consequat. Aliquam ac lacus volutpat, dictum risus at, scelerisque nulla.</p>
                                    <a href="#" class="text-uppercase btn-primary tm-btn-primary">More Info.</a>
                                </div>
                            </article>
                            <article class="tm-bg-white mr-2 tm-carousel-item">
                                <img src="{{ url("/templateweb/img/img-02.jpg")}}" alt="Image" class="img-fluid">
                                <div class="tm-article-pad">
                                    <header><h3 class="text-uppercase tm-article-title-2">Lorem ipsum dolor sit amet, consectetur</h3></header>
                                    <p>Suspendisse molestie sed dui eget faucibus. Duis accumsan sagittis tortor in ultrices. Praesent tortor ante, fringilla ac nibh porttitor, fermentum commodo nulla.</p>
                                    <a href="#" class="text-uppercase btn-primary tm-btn-primary">Detail Info.</a>
                                </div>
                            </article>
                            <article class="tm-bg-white mr-2 tm-carousel-item">
                                <img src="{{ url("/templateweb/img/img-01.jpg")}}" alt="Image" class="img-fluid">
                                <div class="tm-article-pad">
                                    <header><h3 class="text-uppercase tm-article-title-2">Orci varius natoque penatibus et</h3></header>
                                    <p>Pellentesque quis dui sit amet purus scelerisque eleifend sed ut eros. Morbi viverra blandit massa in varius. Sed nec ex eu ex tincidunt iaculis. Curabitur eget turpis gravida.</p>
                                    <a href="#" class="text-uppercase btn-primary tm-btn-primary">Read More</a>
                                </div>
                            </article>
                            <article class="tm-bg-white tm-carousel-item">
                                <img src="{{ url("/templateweb/img/img-02.jpg")}}" alt="Image" class="img-fluid">
                                <div class="tm-article-pad">
                                    <header><h3 class="text-uppercase tm-article-title-2">Nullam sollicitudin at augue venenatis eleifend</h3></header>
                                    <p>Aenean finibus tempor nulla, et maximus nibh dapibus ac. Duis consequat sed sapien venenatis consequat. Aliquam ac lacus volutpat, dictum risus at, scelerisque nulla.</p>
                                    <a href="#" class="text-uppercase btn-primary tm-btn-primary">More Details</a>
                                </div>
                            </article>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 tm-recommended-container">
                        <div class="tm-bg-white">
                            <div class="tm-bg-primary tm-sidebar-pad">
                                <h3 class="tm-color-white tm-sidebar-title">Recommended Places</h3>
                                <p class="tm-color-white tm-margin-b-0 tm-font-light">Enamel pin cliche tilde, kitsch and VHS thundercats</p>
                            </div>
                            <div class="tm-sidebar-pad-2">
                                <a href="#" class="media tm-media tm-recommended-item">
                                    <img src="{{ url("/templateweb/img/tn-img-01.jpg")}}" alt="Image">
                                    <div class="media-body tm-media-body tm-bg-gray">
                                        <h4 class="text-uppercase tm-font-semibold tm-sidebar-item-title">Europe</h4>
                                    </div>
                                </a>
                                <a href="#" class="media tm-media tm-recommended-item">
                                    <img src="{{ url("/templateweb/img/tn-img-02.jpg")}}" alt="Image">
                                    <div class="media-body tm-media-body tm-bg-gray">
                                        <h4 class="text-uppercase tm-font-semibold tm-sidebar-item-title">Asia</h4>
                                    </div>
                                </a>
                                <a href="#" class="media tm-media tm-recommended-item">
                                    <img src="{{ url("/templateweb/img/tn-img-03.jpg")}}" alt="Image">
                                    <div class="media-body tm-media-body tm-bg-gray">
                                        <h4 class="text-uppercase tm-font-semibold tm-sidebar-item-title">Africa</h4>
                                    </div>
                                </a>
                                <a href="#" class="media tm-media tm-recommended-item">
                                    <img src="{{ url("/templateweb/img/tn-img-04.jpg")}}" alt="Image">
                                    <div class="media-body tm-media-body tm-bg-gray">
                                        <h4 class="text-uppercase tm-font-semibold tm-sidebar-item-title">South America</h4>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tm-bg-video">
            <div class="overlay">
                <i class="fa fa-5x fa-play-circle tm-btn-play"></i>
                <i class="fa fa-5x fa-pause-circle tm-btn-pause"></i>
            </div>
            <video controls loop class="tmVideo">
                <source src="{{ url("/templateweb/videos/video.mp4")}}" type="video/mp4">
                <source src="{{ url("/templateweb/videos/video.ogg")}}"  type="video/ogg">
                Your browser does not support the video tag.
            </video>
            <div class="tm-section tm-section-pad tm-bg-img" id="tm-section-5">
                <div class="container ie-h-align-center-fix">
                    <div class="row tm-flex-align-center">
                        <div class="col-xs-12 col-md-12 col-lg-3 col-xl-3 tm-media-title-container">
                            <h2 class="text-uppercase tm-section-title-2">ASIA</h2>
                            <h3 class="tm-color-primary tm-font-semibold tm-section-subtitle-2">Singapore</h3>
                        </div>
                        <div class="col-xs-12 col-md-12 col-lg-9 col-xl-9 mt-0 mt-sm-3">
                            <div class="ml-auto tm-bg-white-shadow tm-pad tm-media-container">
                                <article class="media tm-margin-b-20 tm-media-1">
                                    <img src="{{ url("/templateweb/img/img-03.jpg")}}" alt="Image">
                                    <div class="media-body tm-media-body-1 tm-media-body-v-center">
                                        <h3 class="tm-font-semibold tm-color-primary tm-article-title-3">Suspendisse vel est libero sem phasellus ac laoreet</h3>
                                        <p>Integer libero purus, consectetur vitae posuere quis, maximus id diam. Vivamus eget tellus ornare, sollicitudin quam id, dictum nulla. Phasellus finibus rhoncus justo, tempus eleifend neque dictum ac. Aenean metus leo, consectetur non.
                                        <br><br>
                                        Etiam aliquam arcu at mauris consectetur scelerisque. Integer elementum justo in orci facilisis ultricies. Pellentesque at velit ante. Duis scelerisque metus vel felis porttitor gravida.</p>
                                    </div>
                                </article>
                                <article class="media tm-margin-b-20 tm-media-1">
                                    <img src="{{ url("/templateweb/img/img-04.jpg")}}" alt="Image">
                                    <div class="media-body tm-media-body-1 tm-media-body-v-center">
                                        <h3 class="tm-font-semibold tm-article-title-3">Suspendisse vel est libero sem phasellus ac laoreet</h3>
                                        <p>Duis accumsan sagittis tortor in ultrices. Praesent tortor ante, fringilla ac nibh porttitor, fermentum commodo nulla.</p>
                                        <a href="#" class="text-uppercase tm-color-primary tm-font-semibold">Continue reading...</a>
                                    </div>
                                </article>
                                <article class="media tm-margin-b-20 tm-media-1">
                                    <img src="{{ url("/templateweb/img/img-05.jpg")}}" alt="Image">
                                    <div class="media-body tm-media-body-1 tm-media-body-v-center">
                                        <h3 class="tm-font-semibold tm-article-title-3">Faucibus dolor ligula nisl metus auctor aliquet</h3>
                                        <p>Nunc in felis aliquet metus luctus iaculis vel et nisi. Nulla venenatis nisl orci, laoreet ultricies massa tristique id.</p>
                                        <a href="#" class="text-uppercase tm-color-primary tm-font-semibold">Continue reading...</a>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

            /* Google map
            ------------------------------------------------*/
            var map = '';
            var center;

            function initialize() {
                var mapOptions = {
                    zoom: 16,
                    center: new google.maps.LatLng(13.7567928,100.5653741),
                    scrollwheel: false
                };

                map = new google.maps.Map(document.getElementById('google-map'),  mapOptions);

                google.maps.event.addDomListener(map, 'idle', function() {
                  calculateCenter();
              });

                google.maps.event.addDomListener(window, 'resize', function() {
                  map.setCenter(center);
              });
            }

            function calculateCenter() {
                center = map.getCenter();
            }

            function loadGoogleMap(){
                var script = document.createElement('script');
                script.type = 'text/javascript';
                script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDVWt4rJfibfsEDvcuaChUaZRS5NXey1Cs&v=3.exp&sensor=false&' + 'callback=initialize';
                document.body.appendChild(script);
            }

            function setCarousel() {

                if ($('.tm-article-carousel').hasClass('slick-initialized')) {
                    $('.tm-article-carousel').slick('destroy');
                }

                if($(window).width() < 438){
                    // Slick carousel
                    $('.tm-article-carousel').slick({
                        infinite: false,
                        dots: true,
                        slidesToShow: 1,
                        slidesToScroll: 1
                    });
                }
                else {
                 $('.tm-article-carousel').slick({
                        infinite: false,
                        dots: true,
                        slidesToShow: 2,
                        slidesToScroll: 1
                    });
                }
            }

            function setPageNav(){
            }

            function togglePlayPause() {
                vid = $('.tmVideo').get(0);

                if(vid.paused) {
                    vid.play();
                    $('.tm-btn-play').hide();
                    $('.tm-btn-pause').show();
                }
                else {
                    vid.pause();
                    $('.tm-btn-play').show();
                    $('.tm-btn-pause').hide();
                }
            }

            $(document).ready(function(){

                $(window).on("scroll", function() {
                    if($(window).scrollTop() > 100) {
                        $(".tm-top-bar").addClass("active");
                    } else {
                        //remove the background property so it comes transparent again (defined in your css)
                       $(".tm-top-bar").removeClass("active");
                    }
                });

                // Google Map
                loadGoogleMap();

                // Date Picker
                const pickerCheckIn = datepicker('#inputCheckIn');
                const pickerCheckOut = datepicker('#inputCheckOut');

                // Slick carousel
                setCarousel();
                setPageNav();

                $(window).resize(function() {
                  setCarousel();
                  setPageNav();
                });

                // Close navbar after clicked
                $('.nav-link').click(function(){
                    $('#mainNav').removeClass('show');
                });

                // Control video
                $('.tm-btn-play').click(function() {
                    togglePlayPause();
                });

                $('.tm-btn-pause').click(function() {
                    togglePlayPause();
                });

                // Update the current year in copyright
                $('.tm-current-year').text(new Date().getFullYear());
            });

        </script>
@endsection
