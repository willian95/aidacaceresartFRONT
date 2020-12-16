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
                            <div id="accordion">
                                <!---2----->
                                <div class="">
                                  <div  id="headingTwo">
                                    <h5 class="mb-0">
                                      <button class="btn btn-link collapsed p-0" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    
                                          <!---2--->

                                    <div class="titulo-table ">
                                        <p v-if="selectedLanguage == 'english'">      Shipping & Billing</p>
                                        <p v-if="selectedLanguage == 'spanish'">      Envío y Facturación</p>
                                    </div>

                                      </button>
                                    </h5>
                                  </div>
                                  <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="card-body">
                                    <div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name"><i class="fa fa-user icon_form"></i></i> </label>
                                                    <input type="text" v-if="selectedLanguage == 'spanish'" placeholder="Nombre" class="form-control" v-model="guestName" id="name" :readonly="isAuth.length > 0">
                                                    <input type="text" v-if="selectedLanguage == 'english'" placeholder="Name" class="form-control" v-model="guestName" id="name" :readonly="isAuth.length > 0">
                                                    <small v-if="errors.hasOwnProperty('name')">@{{ errors['name'][0] }}</small>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                            
                                                <div class="form-group">
                                                    <label for="email"><i class="fa fa-envelope icon_form"></i></label>
                                                    <input type="text" placeholder="Email" class="form-control" v-model="guestEmail" id="email" :readonly="isAuth.length > 0">
                                                    <small v-if="errors.hasOwnProperty('email')">@{{ errors['email'][0] }}</small>
                                                </div>
                            
                                            </div>
                                        </div>
                                        <div class="row">
                            
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="dirección"><i class="fa fa-globe icon_form"></i></label>
                                                    <input type="text" v-if="selectedLanguage == 'spanish'" placeholder="Dirección" class="form-control" v-model="guestAddress" id="dirección" :readonly="isAuth.length > 0">
                                                    <input type="text" v-if="selectedLanguage == 'english'" placeholder="Address" class="form-control" v-model="guestAddress" id="dirección" :readonly="isAuth.length > 0">
                                                    <small v-if="errors.hasOwnProperty('address')">@{{ errors['address'][0] }}</small>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="dirección"><i class="fa fa-globe icon_form"></i></label>
                                                    <select class="form-control" v-model="guestCountry" :disabled="isAuth.length > 0">
                                                        <option value="" v-if="selectedLanguage == 'spanish'">País</option>
                                                        <option value="" v-if="selectedLanguage == 'english'">Country</option>
                                                        <option :value="country.id" v-for="country in countries">@{{ country.name }}</option>
                                                    </select>
                                                    <small v-if="errors.hasOwnProperty('country')">@{{ errors['country'][0] }}</small>
                                                </div>
                                            </div>
                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                            
                                                <div class="form-group">
                                                    <label for="phone"><i class="fa fa-phone icon_form"></i></label>
                                                    <input type="text" v-if="selectedLanguage == 'spanish'" placeholder="Teléfono" class="form-control" v-model="guestPhone" id="phone" @keypress="isNumber($event)" :readonly="isAuth.length > 0">
                                                    <input type="text" v-if="selectedLanguage == 'english'" placeholder="Phone" class="form-control" v-model="guestPhone" id="phone" @keypress="isNumber($event)" :readonly="isAuth.length > 0">
                                                    <small v-if="errors.hasOwnProperty('phone')">@{{ errors['phone'][0] }}</small>
                                                </div>
                            
                                            </div>
                                            {{--<div class="col-md-6">
                            
                                                <div class="form-group">
                                                    <label for="identification"><i class="fa fa-id-card icon_form"></i></label>
                                                    <input type="text" placeholder="Cédula" class="form-control" v-model="identification" id="identification"
                                                        @keypress="isNumber($event)">
                                                </div>
                            
                                            </div>--}}
                                        </div>
                                    </div>
                                    </div>
                                  </div>
                                </div>
                              <!---1----->
                                <div class="">
                                    <div  id="headingOne">
                                        <h5 class="mb-0">
                                        <button class="btn btn-link p-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <div class="titulo-table">
                                                <p v-if="selectedLanguage == 'english'">Items</p>
                                                <p v-if="selectedLanguage == 'spanish'">Artículos</p>
                                            </div>
                                        </button>
                                        </h5>
                                    </div>
                              
                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
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
                                                                <span v-if="selectedLanguage == 'spanish'">@{{ product.product_format_size.size.width }}cm x @{{ product.product_format_size.size.height }}cm</span>
                                                                <span v-if="selectedLanguage == 'english'">@{{ (product.product_format_size.size.width / 2.54).toFixed(2) }}in x @{{ (product.product_format_size.size.height/2.54).toFixed(2) }}in</span>
                                                                {{--<span v-if="selectedLanguage == 'spanish'">Formato: @{{ product.product_format_size.format.name }}</span>
                                                                <span v-if="selectedLanguage == 'english'">Format: @{{ product.product_format_size.format.english_name }}</span>--}}
                                                                
                                                            </div>

                                                        </div>
                                                        <div class="col-md-4 center-group">
                                                            <p class="space"><span>$ @{{ number_format(product.product_format_size.price * exchangeRate, 2, ",", ".") }}</span> </p>
                                                        </div>
                                                        <div class="col-md-2 center-group">
                                                            <button class="btn" @click="removeFromCart(product.id)"><i class="fa fa-times"></i></button>
                                                        </div>
                                                    
                                                    </div>
                                                
                                                </div>

                                                <div class="producto-item" v-for="(product, index) in productsGuest">
                                                    <div class="row">
                                                        <div class="col-md-6 item_product">
                                                            <div class="item_img">
                                                                <img :src="product.product.image" alt="">
                                                            </div>
                                                            <div class="item_texto">
                                                                <p  class="title-bold" v-if="selectedLanguage == 'spanish'">@{{ product.product.name }}</p>
                                                                <p  class="title-bold" v-if="selectedLanguage == 'english'">@{{ product.product.english_name }}</p>
                                                                <span v-if="selectedLanguage == 'spanish'">@{{ product.size.width }}cm x @{{ product.size.height }}cm</span>
                                                                <span v-if="selectedLanguage == 'english'">@{{ (product.size.width/2.54).toFixed(2) }}in x @{{ (product.size.height/2.54).toFixed(2) }}in</span>
                                                                <span v-if="selectedLanguage == 'spanish'">Formato: @{{ product.format.name }}</span>
                                                                <span v-if="selectedLanguage == 'english'">Format: @{{ product.format.english_name }}</span>
                                                            
                                                            </div>

                                                        </div>
                                                        <div class="col-md-4 center-group">
                                                            <p class="space "><span>$ @{{ number_format(product.price * exchangeRate, 2, ",", ".") }}</span> </p>
                                                        </div>
                                                        <div class="col-md-2 center-group">
                                                    
                                                            <button class="btn" @click="removeFromCart(product.id)"><i class="fa fa-times"></i></button>
                                                        </div>
                                                    
                                                    </div>
                                                
                                                </div>
                                                

                                            </div>
                                            <div class="text-center mt-3">
                                                <a href="#" @click="checkout()"><button class="btn-custom btn-custom2"><span v-if="selectedLanguage == 'english'">Continue</span> <span v-if="selectedLanguage == 'spanish'">Continuar</span> <i class="fa fa-angle-right" aria-hidden="true"></i></button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                              
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
                    isAuth:"",
                    total:0,
                    products:[],
                    selectedLanguage:"",
                    selectedCurrency:"",
                    productsGuest:[],
                    exchangeRate:1,
                    intervalID:null,
                    guestCountry:"",
                    countries:[],
                    guestName:"",
                    guestEmail:"",
                    guestAddress:"",
                    guestPhone:"",
                    errors:[]
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
                    
                    if(cart){
                        axios.post("{{ url('cart/guest-fetch') }}", {item: cart},{ headers: {
                            Authorization: "Bearer "+window.localStorage.getItem('aida_token')
                        }}).then(res =>{
                        this.productsGuest = res.data.items
                        this.productsGuest.forEach(data => {
                            this.total = this.total + data.price
                        })
                        })
                    }
                    
            
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
                            
                            if(data.id == productId){
                                cart.splice(index, 1)
                            }
                        })
                       
                        window.localStorage.setItem("aida_cart", JSON.stringify(cart))
                        
                        this.guestFetch()

                    }
                    
                },
                openChildWindow(price, currency, userId, isGuest = 0) {
                    childWin = window.open("{{ url('paypal/pay') }}"+"?price="+price+"&currency="+currency+"&userId="+userId+"&guest="+isGuest, 'print_popup', 'width=600,height=600');
                    $("#cover").css("display", "block")
                    this.intervalID = window.setInterval(this.checkWindow, 500);
                },
                checkout(){
                    if(this.total == 0){
                        if(this.selectedLanguage == "english"){
                            alertify.error("You first have to add products to your cart")
                        }else{
                            alertify.error("Debes agregar productos al carrito para continuar")
                        }
                        
                    }else{

                        axios.post("{{ url('/checkout/encrypt-price-currency') }}", {price: this.total, currency: this.selectedCurrency}).then(res =>{
                            var price = res.data.price
                            var currency = res.data.currency
                            if(window.localStorage.getItem('aida_token') !=null){
                                
                                if(this.guestCountry == ""){

                                    if(this.selectedLanguage == "english"){
                                        alertify.error("You have to select a country in your profile")
                                    }else{
                                        alertify.error("Debes seleccionar un país en tu perfil")
                                    }

                                }else if(this.guestTelephone == ""){

                                    if(this.selectedLanguage == "english"){
                                        alertify.error("You have to set a telephone number in your profile")
                                    }else{
                                        alertify.error("Debes agregar un número de teléfono en tu perfil")
                                    }

                                }else if(this.guestAddress == ""){

                                    if(this.selectedLanguage == "english"){
                                        alertify.error("You have to set an address in your profile")
                                    }else{
                                        alertify.error("Debes agregar una dirección en tu perfil")
                                    }

                                }else{

                                    axios.get("{{ url('/checkout/encrypt-user') }}", { headers: {
                                        Authorization: "Bearer "+window.localStorage.getItem('aida_token')
                                    }}).then(res => {
                                        var userId = res.data.userId
                                        this.openChildWindow(price, currency, userId)
                                    })

                                }

                                
                            }else{

                                axios.post("{{ url('/guest/store') }}", {"name": this.guestName, "email": this.guestEmail, "phone": this.guestPhone, "address": this.guestAddress, "country": this.guestCountry}).then(res => {

                                    axios.post("{{ url('/checkout/encrypt-guest-user') }}", {"user_id": res.data.guest.id}).then(res => {

                                        var userId = res.data.user
                                        
                                        this.openChildWindow(price, currency, userId, 1)

                                    })

                                })
                                .catch(err => {

                                    if(this.selectedLanguage == "english"){
                                        alertify.error("You have some fields that you should check")
                                    }else{
                                        alertify.error("Tienes unos campos que deberías verificar")
                                    }

                                    this.errors = err.response.data.errors
                                })

                            }
                        })
                    }
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
                },
                fetchCountries(){

                    axios.get("{{ url('/countries/fetch') }}").then(res => {

                        this.countries = res.data.countries
                        if(this.isAuth.length > 0){
                            let user = JSON.parse(window.localStorage.getItem("aida_user"))
                            if(user.hasOwnProperty('country_id')){
                                this.guestCountry = user.country_id
                            }else{
                                this.guestCountry = ""
                            }
                            
                        }
                        
                    })

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
                this.fetchCountries()
                this.isAuth = window.localStorage.getItem("aida_token")

                if(this.isAuth == null){
                    this.isAuth = ""
                }

                if(this.isAuth.length > 0){
                    let user = JSON.parse(window.localStorage.getItem("aida_user"))
                
                    this.guestName = user.name
                    this.guestEmail = user.email
                    this.guestAddress = user.address
                    //this.guestCountry = user.country_id
                    this.guestPhone = user.telephone
            
                }
                this.getFetchExchangeRate()
                
            },
            
            
        })
         
    </script>

@endpush