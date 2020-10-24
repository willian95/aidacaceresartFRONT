@extends("layouts.index")

@section("content")

    <div id="home">
        <!----banner------>
        {{--<section class="main-banner pb-0 pt-0">
            <div id="demo-test-gallery" class="demo-gallery" data-pswp-uid="1">
                <div class=" main-banner__content ">
                    <div>
                        <div class="main-banner_item">
                            <a href="http://imgfz.com/i/7Fw3pJi.jpeg" data-size="1600x1068" data-author=""
                                data-med="http://imgfz.com/i/7Fw3pJi.jpeg" data-med-size="1024x683">
                                <img src="http://imgfz.com/i/7Fw3pJi.jpeg" alt="">
                                <i class="flaticon-zoom-in-2
                                    "></i>
                            </a>
                        </div>
                        <div class="main-banner_text">
                            <ul>
                                <li>
                                    <p class="titulo-banner_cuadro">Title Cuadro XYZ</p>
                                    <a href="">Ver más <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>$ 1,000.000</li>
                                <li>Available on Canvas & Super HD Print <br> $ 80.000 - $ 95.000 </li>
                                <li><a class="btn-add " href=""><i class="flaticon-shopping-bag
                                    "><span>+</span></i></a> </li>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <div class="main-banner_item">
                            <a href="http://imgfz.com/i/ywPrSJ8.jpeg" data-size="1600x1067"
                                data-med="http://imgfz.com/i/ywPrSJ8.jpeg" data-med-size="1024x683"
                                data-author="Michael Hull">
                                <img src="http://imgfz.com/i/ywPrSJ8.jpeg" alt="">
                                <i class="flaticon-zoom-in-2
                                "></i>
                                <figure>Dummy caption. It's Greek to you. Unless, of course, you're Greek, in which case, it
                                    really
                                    makes no sense.</figure>
                            </a>
                        </div>
                        <div class="main-banner_text">
                            <ul>
                                <li>
                                    <p class="titulo-banner_cuadro">Title Cuadro XYZ</p>
                                    <a href="">Ver más <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>$ 1,000.000</li>
                                <li>Available on Canvas & Super HD Print <br> $ 80.000 - $ 95.000 </li>
                                <li><a class="btn-add " href=""><i class="flaticon-shopping-bag
                                    "><span>+</span></i></a> </li>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <div class="main-banner_item">
                            <a href="http://imgfz.com/i/S3XdEeA.jpeg" data-size="1600x1068" data-author=""
                                data-med="http://imgfz.com/i/S3XdEeA.jpeg" data-med-size="1024x683">
                                <img src="http://imgfz.com/i/S3XdEeA.jpeg" alt="">
                                <figure>This is dummy caption. It has been placed here solely to demonstrate the look and
                                    feel
                                    of
                                    finished, typeset text.</figure>
                            </a>
                        </div>
                        <div class="main-banner_text">
                            <ul>
                                <li>
                                    <p class="titulo-banner_cuadro">Title Cuadro XYZ</p>
                                    <a href="">Ver más</a>
                                </li>
                                <li>$ 1,000.000</li>
                                <li>Available on Canvas & Super HD Print <br> $ 80.000 - $ 95.000 </li>
                                <li><a href="">Add to cart</a> </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

        </section>--}}
        <!----banner------>
        <section class="main-banner pb-0 pt-0 main-banner__content">
            <slick ref="slick" :options="slickOptions" class="demo-gallery">
                
                <div v-for="slide in slides">
                    <div class="main-banner_item">
                        <a>
                            <img :src="slide.image" alt="">
                            
                            <i class="flaticon-zoom-in-2">
                            
                            </i>
                            
                        </a>
                    </div>
                    <div class="main-banner_text">
                        <ul>
                            <li>
                                <p class="titulo-banner_cuadro">@{{ slide.title }}</p>
                                <a href="">Ver más <i class="fa fa-angle-right" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li>$ @{{ slide.price }}</li>
                            <li>@{{ slide.description }} <br> $ @{{ slide.minPrice }} - $ @{{ slide.maxPrice }} </li>
                            <li><a class="btn-add " href=""><i class="flaticon-shopping-bag
                                "><span>+</span></i></a> </li>
                        </ul>
                    </div>
                </div>

            </slick>
        </section>


        <div>
            <!--<div class="paragraph">
                <h3>PhotoSwipe</h3>
                <div>
                    <img style="width: 20%;" @click="showPhotoSwipe(0)" src="https://farm4.staticflickr.com/3894/15008518202_c265dfa55f_h.jpg" alt="">
                    <img style="width: 20%;" @click="showPhotoSwipe(1)" src="https://farm4.staticflickr.com/3902/14985871946_24f47d4b53_h.jpg" alt="">
                </div>
            </div>-->
            <div class="paragraph">
                <h3>PhotoSwipe Gallery</h3>
                <div>
                    <v-photoswipe-gallery :isOpen="isOpenGallery" :options="optionsGallery" :items="items">
                    <img slot-scope="props" :src="props.item.src" alt="picture" style="width: 20%;"/>
                    </v-photoswipe-gallery>
                </div>
            </div>
            <v-photoswipe :isOpen="isOpen" :items="items" :options="options" @close="hidePhotoSwipe">
            </v-photoswipe>
        </div>

        

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

        <!----GALERIA------>
        <section>
            <p class="main_title-general">Gallery</p>
            <div id="galeria" class="galeria galeria--h container">
                <div class="galeria-brick galeria-brick--h">
                <a href="detalle.html">
                    <div class="galeria_name">
                        <p>Name</p>
                    </div>
                    <div class="galeria_dimension">
                        <p>2 x 4
                        </p>
                    </div>
                    <img src="http://imgfz.com/i/8nCzm5i.jpeg" class="galeria-img" alt="galeria aidaart">
                
                </a>
                </div>
                <div class="galeria-brick galeria-brick--h">
                <a href="detalle.html">
                    <div class="galeria_name">
                        <p>Lorem ipsum asmet</p>
                    </div>
                    <div class="galeria_dimension">
                        <p>2 x 4
                        </p>
                    </div>
                    <img src="http://imgfz.com/i/ywPrSJ8.jpeg" class="galeria-img" alt="galeria idaart">
                
                </a>
                </div>
                <div class="galeria-brick galeria-brick--h">
                <a href="detalle.html">
                    <div class="galeria_name">
                        <p>Name</p>
                    </div>
                    <div class="galeria_dimension">
                        <p>2 x 4
                        </p>
                    </div>
                    <img src="http://imgfz.com/i/sLGAmZN.jpeg" class="galeria-img" alt="galeria idaart">
                
                </a>
                </div>
                <div class="galeria-brick galeria-brick--h">
                <a href="detalle.html">
                    <div class="galeria_name">
                        <p>Name</p>
                    </div>
                    <div class="galeria_dimension">
                        <p>2 x 4
                        </p>
                    </div>
                    <img src="http://imgfz.com/i/LXNdayR.jpeg" class="galeria-img" alt="galeria idaart">
                
                </a>
                </div>
                <div class="galeria-brick galeria-brick--h">
                <a href="">
                    <div class="galeria_name">
                        <p>Name</p>
                    </div>
                    <div class="galeria_dimension">
                        <p>2 x 4
                        </p>
                    </div>
                    <img src="http://imgfz.com/i/vSkhKCQ.jpeg" class="galeria-img" alt="galeria idaart">
                
                </a>
                </div>
                <div class="galeria-brick galeria-brick--h">
                    <div class="galeria_name">
                        <p>Name</p>
                    </div>
                    <div class="galeria_dimension">
                        <p>2 x 4
                        </p>
                    </div>
                    <img src="http://imgfz.com/i/7Fw3pJi.jpeg" class="galeria-img" alt="galeria idaart">
                
                </div>
            </div>
        </section>
        <!----GALERIA------>

        <!----PAGO SEGURP----->
        <section>
            <div class="main_pagos">
                <ul>
                    <li>Pago Seguros! Via </li>
                    <li class=" mr-5"><img src="assets/img/iconos/stripe.png" alt=""> <img
                            src="assets/img/iconos/enviado.svg" alt=""></li>
                    <li class="w-200"> Envios Nacionales e
                        Internacionales Rápidos! </li>
                </ul>
            </div>
        </section>
        <!----PAGO SEGURP----->
    </div>


@endsection

@push('scripts')

    <script>
        
        const home = new Vue({
            el: '#home',
            data() {
                return {
                    slides:[
                        {
                            "image": "http://imgfz.com/i/7Fw3pJi.jpeg",
                            "title": "Title Cuadro XYZ",
                            "price": "1,000.000",
                            "description": "Available on Canvas & Super HD Print",
                            "minPrice": "80.000",
                            "maxPrice": "95.000"
                        },
                        {
                            "image": "http://imgfz.com/i/ywPrSJ8.jpeg",
                            "title": "Title Cuadro XYZ",
                            "price": "1,000.000",
                            "description": "Available on Canvas & Super HD Print",
                            "minPrice": "80.000",
                            "maxPrice": "95.000"
                        }
                    ],
                    slickOptions: {
                        slidesToShow: 1,
                        // Any other options that can be got from plugin documentation
                    },
                    isOpen: false,
                    isOpenGallery: false,
                    options: {
                        index: 0,
                        modal:true
                    },
                    optionsGallery: {
                        modal:true
                    },
                    items: [
                        {
                        src: 'https://farm4.staticflickr.com/3894/15008518202_c265dfa55f_h.jpg',
                        w: 1600,
                        h: 1600,
                        title: 'This is dummy caption.'
                        }, {
                        src: 'https://farm4.staticflickr.com/3902/14985871946_24f47d4b53_h.jpg',
                        w: 1600,
                        h: 1066,
                        title: 'This is dummy caption. It has been placed here solely to demonstrate the look and feel of finished, typeset text.'
                        }
                    ]
                }
            },
            methods: {

                showPhotoSwipe (index) {
                   
                    this.isOpen = true
                    this.$set(this.options, 'index', index)
                },
                hidePhotoSwipe () {
                    this.isOpen = false
                }

            },
            mounted(){

                

            }
            

        })

         
    </script>

@endpush