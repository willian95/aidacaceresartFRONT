@extends("layouts.index")

@section("content")
@include('partials.loader')

<section class="container">
    <p class="main_title-general">Who is Aida...</p>

    <div class="row">
        <div class="col-md-6">
            <img src="assets/img/about.jpg" class="galeria-img" alt="galeria aidaart">
        </div>
        <div class="col-md-6">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                laboris
                nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                velit
                esse cillum dolore eu fugiat nulla pariatur.</p>
        </div>
    </div>
</section>
<!----VIDEO----->
<section class="">
    <div class="main_video">
        <video autoplay>
            <source src="ejemplo.webm" type="video/webm">
            <source src="ejemplo.ogg" type="video/ogg">
            <source src="assets/img/nrw6.mp4" type="video/mp4">
        </video>
    </div>
</section>
<!----VIDEO----->

<section>
    <p class="main_title-general"></p>

    <div class="timeline-container" id="timeline-1">
        <div class="timeline-header">
            <h2 class="timeline-header__title">More about Aida - Collaborations</h2>

        </div>
        <div class="timeline">
            <div class="timeline-item" data-text="01/10/2020">
                <div class="timeline__content"><img class="timeline__img" src="http://imgfz.com/i/sLGAmZN.jpeg" />
                    <h2 class="timeline__content-title">Title event</h2>
                    <p class="timeline__content-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                        do eiusmod tempor incididunt ut labore et dolore magna aliqua..</p>
                </div>
            </div>
            <div class="timeline-item" data-text="01/10/2020">
                <div class="timeline__content"><img class="timeline__img" src="http://imgfz.com/i/ywPrSJ8.jpeg" />
                    <h2 class="timeline__content-title">Title event</h2>
                    <p class="timeline__content-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                        do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                        aliqua..</p>
                </div>
            </div>
            <div class="timeline-item" data-text="01/10/2020">
                <div class="timeline__content"><img class="timeline__img" src="http://imgfz.com/i/LXNdayR.jpeg" />
                    <h2 class="timeline__content-title">Title event</h2>
                    <p class="timeline__content-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                        do eiusmod tempor incididunt ut labore et dolore magna aliqua..</p>
                </div>
            </div>
            <div class="timeline-item" data-text="01/10/2020">
                <div class="timeline__content"><img class="timeline__img" src="http://imgfz.com/i/vSkhKCQ.jpeg" />
                    <h2 class="timeline__content-title">Title event</h2>
                    <p class="timeline__content-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                        do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
            <div class="timeline-item" data-text="01/10/2020">
                <div class="timeline__content"><img class="timeline__img" src="http://imgfz.com/i/7Fw3pJi.jpeg" />
                    <h2 class="timeline__content-title">Title event</h2>
                    <p class="timeline__content-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                        do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                        aliqua.</p>
                </div>
            </div>

        </div>
    </div>
</section>



@endsection