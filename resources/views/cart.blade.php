@extends("layouts.index")

@section("content")
@include('partials.loader')

<section class="container mt-5" id="cart-dev">
    <div class="row">
        <div class="col-sm-12 ">
            <div class="carrito">
                <div class="title__general text-justify">
                    <h2 class="title-bold" v-if="selectedLanguage == 'english'">Your cart</h2>
                    <h2 class="title-bold" v-if="selectedLanguage == 'spanish'">Tu carrito</h2>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div id="accordion">
                            <!----------item------------>
                            <div class="">
                              <div  id="headingOne">
                                  <button class="btn btn-link p-0"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <div class="titulo-table">
                                        <p v-if="selectedLanguage == 'english'">Items</p>
                                        <p v-if="selectedLanguage == 'spanish'">Artículos</p>
                                    </div>
                                  </button>
                              </div>
                          
                              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="">
                                    <table class="items-content">
                           

                                        <!-------producto-------->
                                        <div class="main-producto">
                                            <div class="producto-item" v-for="product in products">
                                                <div class="row">
                                                    <div class="col-md-6 item_product">
                                                        <div class="item_img">
                                                            <img :src="product.product.image" alt="">
                                                        </div>
                                                        <div class="item_texto">
                                                            <p  class="title-bold" v-if="selectedLanguage == 'spanish'">@{{ product.name }}</p>
                                                            <p  class="title-bold" v-if="selectedLanguage == 'english'">@{{ product.english_name }}</p>
                                                            <span>@{{ product.size.width }}cm x @{{ product.size.height }}cm</span>
                                                            <span v-if="selectedLanguage == 'spanish'">Formato: @{{ product.format.name }}</span>
                                                            <span v-if="selectedLanguage == 'english'">Format: @{{ product.format.english_name }}</span>
                                                        </div>
            
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="space"><span>$ @{{ number_format(product.price * exchangeRate, 2, ",", ".") }}</span> </p>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            {{--<div class="producto-item">
                                                <div class="row">
                                                    <div class="col-md-6 item_product">
                                                        <div class="item_img">
                                                            <img src="http://imgfz.com/i/ywPrSJ8.jpeg" alt="">
                                                        </div>
                                                        <div class="item_texto">
                                                            <p  class="title-bold">lorem opsum asmet</p>
                                                            <span>130cm x 130cm</span>
                                                            <span>Formato: Canvas</span>
                                                        </div>
            
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="space"><span>$ 79.000</span> </p>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                            <div class="producto-item">
                                                <div class="row">
                                                    <div class="col-md-6 item_product">
                                                        <div class="item_img">
                                                            <img src="http://imgfz.com/i/S3XdEeA.jpeg" alt="">
                                                        </div>
                                                        <div class="item_texto">
                                                            <p  class="title-bold">lorem opsum asmet</p>
                                                            <span>130cm x 130cm</span>
                                                            <span>Formato: Canvas</span>
                                                        </div>
            
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p class="space"><span>$ 79.000</span> </p>
                                                    </div>
                                                </div>
                                               
                                            </div>--}}
            
                                        </div>
                                        <div class="text-center mt-3 mb-3">
                                            <a href=""><button class="btn-custom btn-custom2"><span v-if="selectedLanguage == 'english'">Continue</span> <span v-if="selectedLanguage == 'spanish'">Continuar</span> <i class="fa fa-angle-right" aria-hidden="true"></i></button></a>
                                        </div>
                                    </table>
                                </div>
                              </div>
                            </div>
                            <!----------item------------>
                            <div class="">
                              <div  id="headingTwo">
                                <h5 class="mb-0">
                                  <button class="btn btn-link collapsed p-0" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                   
                                    <div class="titulo-table">
                                        <p v-if="selectedLanguage == 'english'">      Shipping & Billing</p>
                                        <p v-if="selectedLanguage == 'spanish'">      Envío y Facturación</p>
                                    </div>
                              
                                  </button>
                                </h5>
                              </div>
                              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name"><i class="fa fa-user icon_form"></i></i></label>
                                                <input placeholder=" Nombre" type="text" class="form-control" v-model="name" id="name" :readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                        
                                            <div class="form-group">
                                                <label for="email"><i class="fa fa-envelope icon_form"></i></label>
                                                <input placeholder="Email" type="text" class="form-control" v-model="email" id="email" :readonly="readonly">
                                            </div>
                        
                                        </div>
                                    </div>
                                    <div class="">
                        
                                        <div class="form-group">
                                            <label for="dirección"><i class="fa fa-globe icon_form"></i></label>
                                            <input placeholder="Dirección" type="text" class="form-control" v-model="address" id="dirección">
                                        </div>
                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                        
                                            <div class="form-group">
                                                <label for="phone"><i class="fa fa-phone icon_form"></i></label>
                                                <input placeholder="Teléfono" type="text" class="form-control" v-model="phone" id="phone" @keypress="isNumber($event)">
                                            </div>
                        
                                        </div>
                                        <div class="col-md-6">
                        
                                            <div class="form-group">
                                                <label for="identification"><i class="fa fa-id-card icon_form"></i></label>
                                                <input placeholder="Cédula" type="text" class="form-control" v-model="identification" id="identification"
                                                    @keypress="isNumber($event)">
                                            </div>
                        
                                        </div>
                                    </div>


                            
                                </div>
                              </div>
                            </div>
                      
                          </div>
                      

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
        
        const home = new Vue({
            el: '#cart-dev',
            data() {
                return {
                    total:0,
                    products:[],
                    selectedLanguage:"",
                    selectedCurrency:"",
                    exchangeRate:1,
                }
            },
            methods: {

                fetch(){

                    axios.get("{{ url('/cart/fetch') }}",{ headers: {
                        Authorization: "Bearer "+window.localStorage.getItem('aida_token')
                    }}).then(res =>{

                        this.products = res.data.items

                        this.products.forEach(data => {
                            this.total = this.total + data.price
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

                    var cart = JSON.parse(window.localStorage.getItem('aida_cart'))
                    
                    axios.post("{{ url('/cart/guest-fetch') }}", {item: cart},{ headers: {
                        Authorization: "Bearer "+window.localStorage.getItem('aida_token')
                    }}).then(res =>{

                       this.products = res.data.items

                       this.products.forEach(data => {
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