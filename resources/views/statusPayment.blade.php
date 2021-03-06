@extends("layouts.payment")

@section("content")

    <div id="status-payment-dev">
        <a class='brand-xs text-center m-0 pb-5' >
            <img alt='' src='{{ asset('assets/img/logo.png') }}'>
        </a>
        <h3 class="text-center pb-3 pt-4">{{ $msg }}</h3>

        <!-------producto-------->
        <div class="main-producto">
            <div class="producto-item mb-3" v-for="product in products">
                <div class="center-group">
                    <div class="col-md-6 item_product">
                        <div class="item_img" style="margin-top: 3rem;">
                            <img :src="product.product_format_size.product.image" alt="">
                        </div>
                        <div class="item_texto">
                            <p  class="title-bold mb-0" v-if="selectedLanguage == 'spanish'">@{{ product.product_format_size.product.name }}</p>
                            <p  class="title-bold mb-0"  v-if="selectedLanguage == 'english'">@{{ product.product_format_size.product.english_name }}</p>
                            <span v-if="selectedLanguage == 'spanish'">@{{ product.product_format_size.size.width }}cm x @{{ product.product_format_size.size.height }}cm</span>
                            <span v-if="selectedLanguage == 'english'">@{{ (product.product_format_size.size.width/2.54).toFixed(2) }}cm x @{{ (product.product_format_size.size.height/2.54).toFixed(2) }}cm</span>
                          
                        </div>

                    </div>
                    <div class="col-md-6">
                        <p class="space" v-if="selectedLanguage == 'spanish'"><span><span><span v-if="selectedCurrency == 'USD'">US$ @{{ number_format(product.product_format_size.price * exchangeRate, 2, ".", ",") }}</span><span v-else>COP @{{ number_format(product.product_format_size.price * exchangeRate, 0, ",", ".") }}</span></span> </p>
                        <p class="space" v-if="selectedLanguage == 'english'"><span><span><span v-if="selectedCurrency == 'USD'">US$ @{{ number_format(product.product_format_size.price * exchangeRate, 2, ".", ",") }}</span><span v-else>COP @{{ number_format(product.product_format_size.price * exchangeRate, 0, ",", ".") }}</span></span> </p>
                    </div>
                </div>
                
            </div>

            <div class="producto-item" v-for="product in productsGuest">
                <div class="center-group">
                    <div class="col-md-6 item_product">
                        <div class="item_img">
                            <img :src="product.product.image" alt="">
                        </div>
                        <div class="item_texto">
                            <p  class="title-bold mb-0" v-if="selectedLanguage == 'spanish'">@{{ product.product.name }}</p>
                            <p  class="title-bold mb-0" v-if="selectedLanguage == 'english'">@{{ product.product.english_name }}</p>
                            <span v-if="selectedLanguage == 'spanish'">@{{ product.size.width }}cm x @{{ product.size.height }}cm</span>
                            <span v-if="selectedLanguage == 'english'">@{{ (product.size.width/2.54).toFixed(2) }}in x @{{ (product.size.height/2.54).toFixed(2) }}in</span>
                            
                        </div>

                    </div>
                    <div class="col-md-6">
                        <p class="space" v-if="selectedLanguage == 'spanish'"><span><span><span v-if="selectedCurrency == 'USD'">US$ @{{ number_format(product.product_format_size.price * exchangeRate, 2, ".", ",") }}</span><span v-else>COP @{{ number_format(product.product_format_size.price * exchangeRate, 0, ",", ".") }}</span></span> </p>
                        <p class="space" v-if="selectedLanguage == 'english'"><span><span><span v-if="selectedCurrency == 'USD'">US$ @{{ number_format(product.product_format_size.price * exchangeRate, 2, ".", ",") }}</span><span v-else>COP @{{ number_format(product.product_format_size.price * exchangeRate, 0, ",", ".") }}</span></span> </p>
                    </div>
                </div>
                
            </div>
            

        </div>

        <p class="text-center">
            <button class="btn btn-primary btn-custom" @click="accept()">
                Aceptar
            </button>
        </p>

    </div>


@endsection

@push("scripts")

    <script>
    const home = new Vue({
            el: '#status-payment-dev',
            data() {
                return {
                    paymentId:"{{ $paymentId }}",
                    total:0,
                    status:"{{ $status }}",
                    selectedLanguage:"",
                    selectedCurrency:"",
                    exchangeRate:1,
                    products:[],
                    productsGuest:[],
                    guest:"{{ $guest }}"
                }
            },
            methods: {

                accept(){

                        window.close()

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
                deleteCart(){

                  
                    axios.post("{{ url('checkout/process') }}", {"paymentId": this.paymentId, "language": this.selectedLanguage}, 
                    { headers: {
                        Authorization: "Bearer "+window.localStorage.getItem('aida_token')
                    }}
                    ).then(res => {



                    })

                },
                deleteGuestCart(){

                    $cart = JSON.parse(window.localStorage.getItem("aida_cart"))
        
                    axios.post("{{ url('checkout/guest-process') }}", {"paymentId": this.paymentId, "cart": this.productsGuest, "language": this.selectedLanguage}).then(res => {



                    })

                }
                

            },
            mounted(){

                if(this.status == "approved"){
                    window.localStorage.setItem("paymentStatusAida", "aprobado")
                }else{
                    window.localStorage.setItem("paymentStatusAida", "rechazado")
                }

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

                if(window.localStorage.getItem("aida_token") != null){

                    axios.get("{{ url('/cart/fetch') }}",{ headers: {
                        Authorization: "Bearer "+window.localStorage.getItem('aida_token')
                    }}).then(res =>{

                        this.products = res.data.items

                        this.products.forEach(data => {
                            this.total = this.total + data.product_format_size.price
                        })

                        this.deleteCart()


                    })
                    .catch(err => {
                        this.errors = err.response.data.errors
                    }) 

                }else{

                    this.total = 0
                    var cart = JSON.parse(window.localStorage.getItem('aida_cart'))

                    axios.post("{{ url('/cart/guest-fetch') }}", {item: cart},{ headers: {
                        Authorization: "Bearer "+window.localStorage.getItem('aida_token')
                    }}).then(res =>{

                        this.productsGuest = res.data.items

                        this.productsGuest.forEach(data => {
                            this.total = this.total + data.price
                        })

                        this.deleteGuestCart()

                        window.localStorage.removeItem("aida_cart")
                    })

                    

                }

            }
            

        })
    </script>

@endpush