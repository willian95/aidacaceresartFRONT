@extends("layouts.index")

@section("content")
@include('partials.loader')

<section class="container mt-5" id="cart-dev">
    <div style="position: fixed; top: 0; bottom: 0; left:0; right: 0; width: 100%; background: rgba(0, 0, 0, 0.6); z-index: 999999; display:none;"
        id="cover">

    </div>
    <div class="row">
        <div class="col-sm-12 ">
            <div class="carrito">
                <div class="title__general text-justify">
                    <h2 class="title-bold" v-if="selectedLanguage == 'english'">Your cart</h2>
                    <h2 class="title-bold" v-if="selectedLanguage == 'spanish'">Tu carrito</h2>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <table class="items-content">
                            <div class="titulo-table">
                                <p v-if="selectedLanguage == 'english'">Items</p>
                                <p v-if="selectedLanguage == 'spanish'">Artículos</p>
                            </div>

                            <!-------producto-------->
                            <div class="main-producto">
                                <div class="producto-item" v-for="product in products">
                                    <div class="row">
                                        <div class="col-md-6 item_product">
                                            <div class="item_img">
                                                <img :src="product.product_format_size.product.image" alt="">
                                            </div>
                                            <div class="item_texto">
                                                <p  class="title-bold" v-if="selectedLanguage == 'spanish'">@{{ product.product_format_size.product.name }}</p>
                                                <p  class="title-bold" v-if="selectedLanguage == 'english'">@{{ product.product_format_size.product.english_name }}</p>
                                                <span>@{{ product.product_format_size.size.width }}cm x @{{ product.product_format_size.size.height }}cm</span>
                                                <span v-if="selectedLanguage == 'spanish'">Formato: @{{ product.product_format_size.format.name }}</span>
                                                <span v-if="selectedLanguage == 'english'">Format: @{{ product.product_format_size.format.english_name }}</span>
                                                <button class="btn btn-secondary" @click="removeFromCart(product.id)">X</button>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <p class="space"><span>$ @{{ number_format(product.product_format_size.price * exchangeRate, 2, ",", ".") }}</span> </p>
                                        </div>
                                    </div>
                                   
                                </div>

                                <div class="producto-item" v-for="product in productsGuest">
                                    <div class="row">
                                        <div class="col-md-6 item_product">
                                            <div class="item_img">
                                                <img :src="product.product.image" alt="">
                                            </div>
                                            <div class="item_texto">
                                                <p  class="title-bold" v-if="selectedLanguage == 'spanish'">@{{ product.product.name }}</p>
                                                <p  class="title-bold" v-if="selectedLanguage == 'english'">@{{ product.product.english_name }}</p>
                                                <span>@{{ product.size.width }}cm x @{{ product.size.height }}cm</span>
                                                <span v-if="selectedLanguage == 'spanish'">Formato: @{{ product.format.name }}</span>
                                                <span v-if="selectedLanguage == 'english'">Format: @{{ product.format.english_name }}</span>
                                                <button class="btn btn-secondary" @click="removeFromCart(product.id)">X</button>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <p class="space"><span>$ @{{ number_format(product.price * exchangeRate, 2, ",", ".") }}</span> </p>
                                        </div>
                                    </div>
                                   
                                </div>
                                

                            </div>
                            <div class="text-center mt-3">
                                <a href="#" @click="checkout()"><button class="btn-custom btn-custom2"><span v-if="selectedLanguage == 'english'">Continue</span> <span v-if="selectedLanguage == 'spanish'">Continuar</span> <i class="fa fa-angle-right" aria-hidden="true"></i></button></a>
                            </div>

                            <div class="titulo-table mt-5">
                                <p v-if="selectedLanguage == 'english'">      Shipping & Billing</p>
                                <p v-if="selectedLanguage == 'spanish'">      Envío y Facturación</p>
                            </div>

                        </table>

                    </div>
                    <div class="col-md-4">
                        <div class="pedido pt-0">

                            <p class="title-bold" style="    font-size: 21px;" v-if="selectedLanguage == 'english'">Order sumary</p>
                            <p class="title-bold" style="    font-size: 21px;" v-if="selectedLanguage == 'spanish'">Total de la orden </p>

                            <p class="space_total">Total: <span>$ @{{ number_format(total * exchangeRate, 2, ",", ".") }}</span> </p>
                            <p class="space_total">Subtotal: <span>$ @{{ number_format(total * exchangeRate, 2, ",", ".") }}</span> </p>

                            <!---<div class="text-center">
                                <a href=""><button class="btn-custom">Finalizar compra ></button></a>
                            </div>-->

                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
</section>


@endsection

@push('scripts')

    <script>
        var childWind
        const home = new Vue({
            el: '#cart-dev',
            data() {
                return {
                    total:0,
                    products:[],
                    selectedLanguage:"",
                    selectedCurrency:"",
                    productsGuest:[],
                    exchangeRate:1,
                    intervalID:null
                }
            },
            methods: {
                fetch(){
                    this.total = 0
                    axios.get("{{ url('/cart/fetch') }}",{ headers: {
                        Authorization: "Bearer "+window.localStorage.getItem('aida_token')
                    }}).then(res =>{
                        this.products = res.data.items
                        this.products.forEach(data => {
                            this.total = this.total + data.product_format_size.price
                        })
                    })
                    .catch(err => {
                        this.errors = err.response.data.errors
                    })
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
                guestFetch(){
                    this.total = 0
                    var cart = JSON.parse(window.localStorage.getItem('aida_cart'))
                    
                    axios.post("{{ url('/checkout/process') }}", {item: cart},{ headers: {
                        Authorization: "Bearer "+window.localStorage.getItem('aida_token')
                    }}).then(res =>{
                       this.productsGuest = res.data.items
                       this.productsGuest.forEach(data => {
                           this.total = this.total + data.price
                       })
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
                removeFromCart(productId){
                    if(window.localStorage.getItem('aida_token') !=null){
                        axios.post("{{ url('/cart/delete') }}",{id: productId},{ headers: {
                            Authorization: "Bearer "+window.localStorage.getItem('aida_token')
                        }}).then(res =>{
                            if(res.data.success == true){
                                alertify.success(res.data.msg)
                                this.fetch()
                            }else{
                                alertify.error(res.data.msg)
                            }
                        })
                        .catch(err => {
                            alertify.error(res.data.msg)
                        })
                        
                    }else{
                        var cart = JSON.parse(window.localStorage.getItem('aida_cart'))
                        cart.forEach((data, index) => {
                            if(data.product.id == productId){
                                cart.splice(index, 1)
                            }
                        })
                        window.localStorage.setItem("aida_cart", JSON.stringify(cart))
                    
                        axios.post("{{ url('/cart/guest-fetch') }}", {item: cart},{ headers: {
                            Authorization: "Bearer "+window.localStorage.getItem('aida_token')
                        }}).then(res =>{
                            this.products = res.data.items
                            this.products.forEach(data => {
                                this.total = this.total + data.product_format_size.price
                            })
                        })
                    }
                    
                },
                openChildWindow(price, currency, userId) {
                    childWin = window.open("{{ url('paypal/pay') }}"+"?price="+price+"&currency="+currency+"&userId="+userId, 'print_popup', 'width=600,height=600');
                    $("#cover").css("display", "block")
                    this.intervalID = window.setInterval(this.checkWindow, 500);
                },
                checkout(){
                    axios.post("{{ url('/checkout/encrypt-price-currency') }}", {price: this.total, currency: this.selectedCurrency}).then(res =>{
                        var price = res.data.price
                        var currency = res.data.currency
                        if(window.localStorage.getItem('aida_token') !=null){
                            
                            axios.get("{{ url('/checkout/encrypt-user') }}", { headers: {
                                Authorization: "Bearer "+window.localStorage.getItem('aida_token')
                            }}).then(res => {
                                var userId = res.data.userId
                                this.openChildWindow(price, currency, userId)
                            })
                        }else{
                            
                        }
                    })
                },
                checkWindow() {
                    if (childWin && childWin.closed) {
                        window.clearInterval(this.intervalID);
                        $("#cover").css("display", "none")
                        if (localStorage.getItem("paymentStatusAida") == 'aprobado') {
                            localStorage.removeItem("paymentStatusAida")
                            window.location.href = "{{ url('/') }}"
                        } else if (localStorage.getItem("paymentStatusAida") == 'rechazado') {
                            window.location.reload()
                        }
                    }
                }
                
            },
            mounted(){
                if(window.localStorage.getItem("aida_user") && window.localStorage.getItem("aida_token")){
                    this.fetch()
                }else{
                    this.guestFetch()
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
            }
            
        })
         
    </script>

@endpush