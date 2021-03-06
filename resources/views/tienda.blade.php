@extends("layouts.index")

@section("content")
@include('partials.loader')
   <!----VIDEO----->
   @if(App\HomeVideo::where("active", 1)->first())
        <!----VIDEO----->
        <section class="">
            <div class="main_video">
                <video id="video"  class=" d-sm-block video" autoplay muted loop  preload playsinline   src="{{ App\HomeVideo::first()->video }}"></video>

             
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
        <p class="main_title-general" v-if="selectedLanguage == 'spanish'">Galería</p>
        <p class="main_title-general" v-if="selectedLanguage == 'english'">Gallery</p>
        <div id="galeria" class="galeria galeria--h container galeria-page">
            <div class="galeria-brick galeria-brick--h" v-for="product in products">
                <a :href="'{{ url('/product/') }}'+'/'+product.slug">
                    <div class="galeria_name">
                        <p v-if="selectedLanguage == 'spanish'">@{{ product.name }} </p>
                        <p v-if="selectedLanguage == 'english'">@{{ product.english_name }}</p>
                    </div>
                    <div class="galeria_dimension">
                        <p v-for="size in product.product_format_sizes"  v-if="selectedLanguage == 'spanish'">@{{ size.size.width }}cm x @{{ size.size.height }}cm - <span v-if="selectedCurrency == 'USD'">US$ @{{ number_format(size.price * exchangeRate, 2, ",", ".") }}</span><span v-else>COP @{{ number_format(size.price * exchangeRate, 2, ".", ",") }}</span></p>
                        <p v-for="size in product.product_format_sizes" v-if="selectedLanguage == 'english'">@{{ (size.size.width/2.54).toFixed(2) }}in x @{{ (size.size.height/2.54).toFixed(2) }}in <span v-if="selectedCurrency == 'USD'">US$ @{{ number_format(size.price * exchangeRate, 2, ",", ".") }}</span><span v-else>COP @{{ number_format(size.price * exchangeRate, 2, ".", ",") }}</span></p>
                    </div>
                     <div class="overflow-hidden position-relative">
                        <img :src="product.image" class="galeria-img" alt="galeria aidaart">
                        <div class="cinta" v-if="selectedLanguage == 'english' && product.is_sold == 1">Sold <i class="fa fa-tag" aria-hidden="true"></i></div>
                        <div class="cinta" v-if="selectedLanguage == 'spanish' && product.is_sold == 1">Vendido <i class="fa fa-tag" aria-hidden="true"></i></div>
                     </div>
                
                </a>
            </div>
            
        </div>
    </section>
    <!----GALERIA------>
    <!----GALERIA------>

    <!----PAGO SEGURP----->
         <!----PAGO SEGURP----->
         <section>
            <div class="main_pagos">
                <ul>
                    
                    <li v-if="selectedLanguage == 'spanish'"  @mouseover="modalpago()"> Pagos seguros y garantizados  </li>
                    <li v-if="selectedLanguage == 'english'">Secure payments by</li>
                    <li>
                        <img class="img-pago" src="https://assets.stickpng.com/thumbs/580b57fcd9996e24bc43c530.png" alt=""> 
                        <img class="img-pago img-pago2"  src="http://imgfz.com/i/mufyBjh.png" alt="">
                    </li>
                   
                    <li class="w-200" v-if="selectedLanguage == 'spanish'" @mouseover="modaldhl()"> Envíos nacionales e internacionales por DHL! </li>
                    <li class="w-200" v-if="selectedLanguage == 'english'">National & International Shipping</li>
                    <img class="img-pago img-pago2 img-non"  src="http://imgfz.com/i/mufyBjh.png" alt="">
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
                    

                },
                number_format(number, decimals, dec_point, thousands_point) {

                    if (number == null || !isFinite(number)) {
                        throw new TypeError("number is not valid");
                    }

                    if (!decimals) {
                        var len = number.toString().split('.').length;
                        decimals = len > 1 ? len : 0;
                    }

                    if (!dec_point) {
                        dec_point = '.';
                    }

                    if (!thousands_point) {
                        thousands_point = ',';
                    }

                    if(this.selectedCurrency == "COP"){
                    decimals = 0
                    }

                    number = parseFloat(number).toFixed(decimals);

                    number = number.replace(".", dec_point);

                    var splitNum = number.split(dec_point);
                    splitNum[0] = splitNum[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousands_point);
                    number = splitNum.join(dec_point);

                    return number;
                },

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