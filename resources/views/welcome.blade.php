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
                            <p v-for="size in product.product_format_sizes">
                                <span v-if="selectedLanguage == 'spanish'">@{{ size.size.width }}cm x @{{ size.size.height }}cm</span>
                                <span v-if="selectedLanguage == 'english'">@{{ (size.size.width/2.54).toFixed(2) }}in x @{{ (size.size.height/2.54).toFixed(2) }}in</span>
                            </p>
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

        {{--<div class="modal fade" id="mostrarmodal"  style="padding-right: 8px; display: block;" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="triangle"></div>
                <div class="modal-dialog modal-dialog-centered new-w" role="document">
                    <div class="modal-content ">
            
                        <div class="modal-bod">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <div class="row">
                                <div class="col-md-6 p-0">
                                    <img class="img-new" src="https://images.unsplash.com/photo-1522878308970-972ec5eedc0d?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=375&amp;q=80" alt="">
                                </div>
                                <div class="col-md-6">
                                    <div class="news">
                                
                                        <p>Hi! Become an Art Collector or just get a  notified about my new art work</p>
                
                                        <div class="form-group">
                                            <!--<label for="password">Contraseña</label>-->
                                            <input placeholder="Email" type="text" class="form-control  ">
                                            <i style="    top: 14%!important;" class="fa fa-envelope  icon_form"></i>
                
                                            <a href="" class="btn btn-custom mt-4">Subscribe!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
            
                    
                        </div>
            
                    </div>
                </div>
            </div>--}}

            <div class="modal fade" id="mostrarModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="triangle"></div>
                <div class="modal-dialog modal-dialog-centered new-w" role="document">
                    <div class="modal-content ">
            
                        <div class="modal-bod">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeNewsletter">
                                <span aria-hidden="true">×</span>
                            </button>
                            <div class="row">
                                <div class="col-md-6 p-0">
                                    <img class="img-new" src="https://images.unsplash.com/photo-1522878308970-972ec5eedc0d?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=375&amp;q=80" alt="">
                                </div>
                                <div class="col-md-6">
                                    <div class="news">
                                
                                        <p v-if="selectedLanguage == 'english'">Hi! Become an Art Collector or just get a  notified about my new art work</p>
                                        <p v-if="selectedLanguage == 'spanish'">Hola! Convierte en un Coleccionista de Arte o simplemente  mantente informado de mis nuevos trabajos</p>
                
                                        <div class="form-group">
                                            <!--<label for="password">Contraseña</label>-->
                                            <input placeholder="Email" type="text" class="form-control  " v-model="newsletterEmail">
                                            <i  class="fa fa-envelope  icon_form"></i>
                                            
                
                                            <button type="button" href="#" class="btn btn-custom mt-4" @click="subscribe()">
                                                <span v-if="selectedLanguage == 'english'">Subscribe!</span>
                                                <span v-if="selectedLanguage == 'spanish'">Suscribete!</span>
                                            </button>

                                            <p class="text-center">
                                                <small style="color:red" v-if="errors.hasOwnProperty('newsletterEmail')">@{{ errors['newsletterEmail'][0] }}</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
            
                    
                        </div>
            
                    </div>
                </div>
            </div>
        

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
                    errors:[],
                    newsletterEmail:""
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
                    

                },
                subscribe(){

                    axios.post("{{ url('newsletter-subscribe') }}", {newsletterEmail: this.newsletterEmail}).then(res => {

                        swal({
                            title:"Genial",
                            text:"Te has suscrito",
                            icon: "success"
                        }).then(res => {
                            $("#closeNewsletter").click();
                            $('body').removeClass('modal-open');
                            $('body').css('padding-right', '0px');
                            $('.modal-backdrop').remove();
                        })

                    })
                    .catch(err => {
                        this.loading = false
                        this.errors = err.response.data.errors
                    })

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