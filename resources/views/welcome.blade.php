@extends("layouts.index")

@section("content")

    <div id="home">
        <!----banner------>
        <section class="main-banner pb-0 pt-0">
            <div id="demo-test-gallery" class="demo-gallery" data-pswp-uid="1">
                <div class=" main-banner__content ">
                    @foreach(App\Product::where("show_on_carousel", 1)->get() as $carousel)
                        <div>
                            <div class="main-banner_item">
                                <a href="{{ $carousel->image }}" data-size="1600x1068" data-author=""
                                    data-med="{{ $carousel->image }}" data-med-size="1024x683">
                                    <img src="{{ $carousel->image }}" alt="">
                                    <i class="flaticon-zoom-in-2
                                        "></i>
                                </a>
                            </div>
                            <div class="main-banner_text">
                                <ul>
                                    <li>
                                        <p class="titulo-banner_cuadro">{{ $carousel->name }}</p>
                                        <a href="">Ver más <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>$ {{ number_format(App\ProductFormatSize::where("product_id", $carousel->id)->orderBy("price", "desc")->first()->price, 2, ",", ".") }}</li>
                                    <li>Available on Canvas & Super HD Print <br> 
                                    $ {{ number_format(App\ProductFormatSize::where("product_id", $carousel->id)->orderBy("price", "asc")->first()->price, 2, ",", ".") }} 
                                    @if(App\ProductFormatSize::where("product_id", $carousel->id)->count() > 1) - 
                                        $ {{ number_format(App\ProductFormatSize::where("product_id", $carousel->id)->orderBy("price", "desc")->first()->price, 2, ",", ".") }}
                                    @endif 
                                     </li>
                                    <li><a class="btn-add " href=""><i class="flaticon-shopping-bag
                                        "><span>+</span></i></a> </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                    {{--<div>
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
                    </div>--}}
                </div>

            </div>

        </section>
        <!----banner------>
        
        @if(App\HomeVideo::where("active", 1)->first())
        <!----VIDEO----->
        <section class="">
            <div class="main_video">
                <video loop autoplay="true" muted="muted">
                    <!--<source src="ejemplo.webm" type="video/webm">
                    <source src="ejemplo.ogg" type="video/ogg">-->
                    <source src="{{ App\HomeVideo::first()->video }}" type="video/mp4">
                </video>
            </div>
        </section>
        <!----VIDEO----->

        @endif

        <!----GALERIA------>
        <section>
            <p class="main_title-general">Gallery</p>
            <div id="galeria" class="galeria galeria--h container">
                <div class="galeria-brick galeria-brick--h" v-for="product in products">
                    <a :href="'{{ url('/product/') }}'+'/'+product.slug">
                        <div class="galeria_name">
                            <p>@{{ product.name }}</p>
                        </div>
                        <div class="galeria_dimension">
                            <p v-for="size in product.product_format_sizes">@{{ size.size.width }}cm x @{{ size.size.height }}cm</p>
                        </div>
                        <img :src="product.image" class="galeria-img" alt="galeria aidaart">
                    
                    </a>
                </div>
                {{--<div class="galeria-brick galeria-brick--h">
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
                
                </div>--}}
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
                    products:[]
                }
            },
            methods: {

                fetchProducts(){

                    axios.get("{{ url('/home/products') }}").then(res => {

                        this.products = res.data.products

                    })
                    
                }

            },
            mounted(){

                this.fetchProducts()

            }
            

        })

         
    </script>

@endpush