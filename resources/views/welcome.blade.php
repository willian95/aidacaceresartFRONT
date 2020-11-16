@extends("layouts.index")

@section("content")
@include('partials.loader_video')
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
                                    <li class="aida-style">
                                        <p class="titulo-banner_cuadro show-spanish">{{ $carousel->name }}</p>
                                        <p class="titulo-banner_cuadro show-english">{{ $carousel->english_name }}</p>
                                        <a class="show-spanish" href="{{ url('/product/'.$carousel->slug) }}">Ver más <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        </a>
                                        <a class="show-english" href="{{ url('/product/'.$carousel->slug) }}">See more <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="show-usd">
                                        $ {{ number_format(App\ProductFormatSize::where("product_id", $carousel->id)->orderBy("price", "desc")->first()->price, 2, ",", ".") }}
                                    </li>
                                    <li class="show-cop">
                                        $ {{ number_format(App\ProductFormatSize::where("product_id", $carousel->id)->orderBy("price", "desc")->first()->price * App\DolarPrice::first()->rate, 2, ",", ".") }}
                                    </li>
                                    {{--<li>Available on Canvas & Super HD Print <br> --}}
                                    <li class="show-usd">$ {{ number_format(App\ProductFormatSize::where("product_id", $carousel->id)->orderBy("price", "asc")->first()->price, 2, ",", ".") }} 
                                        @if(App\ProductFormatSize::where("product_id", $carousel->id)->count() > 1) - 
                                            $ {{ number_format(App\ProductFormatSize::where("product_id", $carousel->id)->orderBy("price", "desc")->first()->price, 2, ",", ".") }}
                                        @endif 
                                     </li>
                                     <li class="show-cop">$ {{ number_format(App\ProductFormatSize::where("product_id", $carousel->id)->orderBy("price", "asc")->first()->price * App\DolarPrice::first()->rate, 2, ",", ".") }} 
                                        @if(App\ProductFormatSize::where("product_id", $carousel->id)->count() > 1) - 
                                            $ {{ number_format(App\ProductFormatSize::where("product_id", $carousel->id)->orderBy("price", "desc")->first()->price * App\DolarPrice::first()->rate, 2, ",", ".") }}
                                        @endif 
                                     </li>
                                    <li><a class="btn-add " href=""><i class="flaticon-shopping-bag
                                        "><span>+</span></i></a> </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
        
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
        
    <div id="home">
        <!----GALERIA------>
        <section>
            <p class="main_title-general" v-if="selectedLanguage == 'english'">Gallery</p>
            <p class="main_title-general" v-if="selectedLanguage == 'spanish'">Galería</p>
            <div id="galeria" class="galeria galeria--h container">
                <div class="galeria-brick galeria-brick--h" v-for="product in products">
                    <a :href="'{{ url('/product/') }}'+'/'+product.slug">
                        <div class="galeria_name">
                            <p v-if="selectedLanguage == 'spanish'">@{{ product.name }}</p>
                            <p v-if="selectedLanguage == 'english'">@{{ product.english_name }}</p>
                        </div>
                        <div class="galeria_dimension">
                            <p v-for="size in product.product_format_sizes">@{{ size.size.width }}cm x @{{ size.size.height }}cm</p>
                        </div>
                        <img :src="product.image" class="galeria-img" alt="galeria aidaart">
                    
                    </a>
                </div>
                
            </div>
        </section>
        <!----GALERIA------>

        <!----PAGO SEGURP----->
        <section>
            <div class="main_pagos">
                <ul>
                    <li v-if="selectedLanguage == 'spanish'">Pago Seguros! Via </li>
                    <li v-if="selectedLanguage == 'english'">Safety payments by!</li>
                    <li class=" mr-5"><img src="assets/img/iconos/stripe.png" alt=""> <img
                            src="assets/img/iconos/enviado.svg" alt=""></li>
                    <li class="w-200" v-if="selectedLanguage == 'spanish'"> Envios Nacionales e
                        Internacionales Rápidos! </li>
                    <li class="w-200" v-if="selectedLanguage == 'english'">Fast National & International Shippings!</li>
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
                    products:[],
                    selectedLanguage:"",
                    selectedCurrency:"",
                    exchangeRate:1,
                }
            },
            methods: {

                fetchProducts(){

                    axios.get("{{ url('/home/products') }}").then(res => {

                        this.products = res.data.products

                    })
                    
                },
                getFetchExchangeRate(){

                    if(this.selectedCurrency == "COP"){
                        axios.get("{{ url('dolar-price') }}").then(res => {

                            this.exchangeRate = res.data.dolar

                        })
                    }else{
                        this.exchageRate = 1
                    }
                    

                }

            },
            mounted(){

                this.fetchProducts()

                if(window.localStorage.getItem("aida_language") == null){
                    window.localStorage.setItem("aida_language", "spanish")
                    this.selectedLanguage = "spanish"
                }else{
                    this.selectedLanguage = window.localStorage.getItem("aida_language")
                }

                if(window.localStorage.getItem("aida_currency") == null){
                    window.localStorage.setItem("aida_currency", "USD")
                    this.selectedCurrency = "USD"
                }else{
                    this.selectedCurrency = window.localStorage.getItem("aida_currency")
                }

                this.getFetchExchangeRate()

                if(this.selectedCurrency == "COP"){
                    $(".show-usd").css("display", "none")
                    $(".show-cop").css("display", "block")
                }else{
                    $(".show-usd").css("display", "block")
                    $(".show-cop").css("display", "none")
                }

                if(this.selectedLanguage == "spanish"){
                    $(".show-spanish").css("display", "block")
                    $(".show-english").css("display", "none")
                }else{
                    $(".show-spanish").css("display", "none")
                    $(".show-english").css("display", "block")
                }

            }
            

        })

         
    </script>

@endpush