@extends("layouts.index")

@section("content")
@include('partials.loader')
   <!----VIDEO----->
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
<!----VIDEO----->
{{--<div class="categorians-name">
    <p> LATEST ART WORK!</p>
    <p>WOMEN INSPIRATION</p>
    <p>BLUES </p>
    <p> BLACK & WHITE</p>
</div>--}}
<div id="gallery-dev">
    <!----GALERIA------>
    <!----GALERIA------>
    <section>
        <p class="main_title-general" v-if="selectedLanguage == 'spanish'">Gallería</p>
        <p class="main_title-general" v-if="selectedLanguage == 'english'">Gallery</p>
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
            el: '#gallery-dev',
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

                    axios.get("{{ url('/gallery/fetch') }}").then(res => {

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

            }
            

        })

         
    </script>

@endpush