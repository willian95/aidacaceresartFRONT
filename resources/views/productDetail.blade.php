@extends("layouts.index")

@section("content")
@include('partials.loader')
  <div >
      <section class="container pt-5 ">
        <div class="main main-details__product">
          <div class="row">
            <div class="col-md-6">
              <div id="demo-test-gallery" class="demo-gallery" data-pswp-uid="1">
                <div class="main-banner_item main-detalle_item">
                  <a href="{{ $product->image }}" data-size="1600x1068" data-author=""
                    data-med="{{ $product->image }}" data-med-size="1024x683">
                    <img src="{{ $product->image }}" alt="">
                  </a>
                </div>
              </div>

              <div class="iconos_detalle text-center">
                <i class="flaticon-eye-variant-with-enlarged-pupil" id="scaleText">Scale View</i>
                <i class="flaticon-zoom-in-1" id="zoomText">Zoom/Better
                  View</i>
              </div>
            </div>
            <!---col-md-6---->
            <div class="col-md-6" id="product-detail-dev">

              <div class="slider_details--text">
                <div class="">
                  <div class="main-top__item">
                    <div class="main-top__text">
                      <div class="main-top__title">
                        <p v-if="selectedLanguage == 'spanish'">{{ $product->name }} </p>
                        <p v-if="selectedLanguage == 'english'">{{ $product->english_name }} </p>
                        <span v-if="selectedLanguage == 'english'"> by Aida</span>
                        <span v-if="selectedLanguage == 'spanish'"> por Aida</span>
                      </div>
                      <div class="row">
                        <div class="col-md-6 p-0 flex-center">
                          <div class="main-top__description">
                            <p v-if="selectedLanguage == 'spanish'">{{ $product->description }}</p>
                            <p v-if="selectedLanguage == 'english'">{{ $product->english_description }}</p>
                          </div>
                        </div>
                        <div class="col-md-6 p-per">
                          {{--<div class="form-group">
                            <label for="exampleFormControlSelect1" v-if="selectedLanguage == 'spanish'"><strong>Formatos</strong></label>
                            <label for="exampleFormControlSelect1" v-if="selectedLanguage == 'english'"><strong>Formats</strong></label>
                            <select class="form-control" id="exampleFormControlSelect1" @change="selectSizes()" v-model="format">
                              <option v-for="format in formats" :value="format.format_id" v-if="selectedLanguage == 'spanish'">
                               @{{ format.format.name }}
                                
                              </option>
                              <option v-for="format in formats" :value="format.format_id" v-if="selectedLanguage == 'english'">
                               @{{ format.format.english_name }}
                                
                              </option>
                            </select>
                          </div>--}}
                          <div class="main-top__price">
                            <p>$ @{{ number_format(price * exchangeRate, 2, ",", ".") }} </p>
                          </div>
                          <div class="text-center main-top__btn ">
                            <a class="btn-custom mr-4"  @click="addToCart()">
                              <span v-if="selectedLanguage == 'english'">Buy</span> <span v-if="selectedLanguage == 'spanish'">Comprar</span> <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </a>
                          </div>
                        </div>
                      </div>


                      <p class="dimens-title" v-if="selectedLanguage == 'english'">Dimenssions</p>
                      <p class="dimens-title" v-if="selectedLanguage == 'spanish'">Dimensiones</p>
                      <div class="dimens">

                        <!-- radio -->
                        <div class="radio" v-for="size in sizes">
                          <label>
                            <input type="radio" name="o3" :value="size.id" v-model="selectSize" @click="setPrice()">
                            <span class="cr"><i class="cr-icon fa fa-check" aria-hidden="true"></i>
                            </span>
                            @{{ size.width }}cm x @{{ size.height }}cm

                          </label>
                        </div>

                        <!-- radio -->
                        {{--<div class="radio">
                          <label>
                            <input type="radio" name="o3" value="">
                            <span class="cr"><i class="cr-icon fa fa-check" aria-hidden="true"></i>
                            </span>
                            90 x 40
                          </label>
                        </div>

                        <!-- radio -->
                        <div class="radio">
                          <label>
                            <input type="radio" name="o3" value="">
                            <span class="cr"><i class="cr-icon fa fa-check" aria-hidden="true"></i>
                            </span>
                            50 x 70
                          </label>
                        </div>--}}

                      </div>

                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


                        
      <div id="otherInfo">
        <section class="container">
          <div class="atention">
            <div class="atention-item">
              <p v-if="selectedLanguage == 'english'">Fast Shipping via DHL or FEDEX (Ground and
                International)
              </p>
              <p v-if="selectedLanguage == 'spanish'">Envíos rápidos por DHL o FEDex (por tierra o internacionales)
              </p>
            </div>
            <div class="atention-item">
              <p v-if="selectedLanguage == 'english'">Each item includes an oficial certificate of
                authenticity, date of creation and a personal </p>
              <p v-if="selectedLanguage == 'spanish'">Cada artículos incluye un certificado de autenticidad, fecha de creación y un personal </p>
            </div>
            <div class="atention-item">
              <p v-if="selectedLanguage == 'english'">There are no returns, for additional information send an email to sales@aidart.co
                and we’ll get back to you in less than 4 hours</p>
              <p v-if="selectedLanguage == 'spanish'">No hay devoluciones, para información adicional envía un correo a sales@aidart.co y nos contactaremos contigo en menos de 4 horas</p>
            </div>
          </div>
        </section>

        <section class="container">
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
        </section>
      </div>

      
  
  </div>



@endsection

@push('scripts')

    <script>
        
        const home = new Vue({
            el: '#product-detail-dev',
            data() {
                return {
                  formatSizes:[],
                  format:"",
                  selectSize:"",
                  selectedLanguage:"",
                  products:[],
                  formats:[],
                  sizes:[],
                  selectedCurrency:"",
                  exchangeRate:1,
                  price:0
                }
            },
            methods: {

              fetchFormatSizesByProduct(){

                  axios.get("{{ url('/format-sizes/product/'.$product->id) }}").then(res => {

                    var vm = this
                    this.formatSizes = res.data.formatSizes
                    this.formatSizes.forEach((data) => {
                      var exists = false
                      vm.formats.forEach((format) => {

                        if(format == data){
                          exists == true;
                        }

                      })
                     
                      vm.formats.push(data)

                    })

                    this.format = this.formats[0].format_id
                    this.selectSizes()

                  })
                  
              },

              selectSizes(){

                this.price = 0
                this.selectSize = ""
                this.sizes = []
                this.formatSizes.forEach((data) => {
                  
                  console.log("format", this.format)

                  if(data.format_id == this.format){

                    this.sizes.push(data.size)

                  }

                })

              },

              setPrice(){
               
                window.setTimeout(() => {
                  
                this.formatSizes.forEach((data) => {
                  
                  if(data.format_id == this.format && data.size_id == this.selectSize){
                    console.log(this.format, this.selectSize)
                    console.log("price", data.price)
                    this.price = data.price

                  }

                })

                }, 300);

              },
              fetchProducts(){

                axios.get("{{ url('/home/products') }}").then(res => {

                    this.products = res.data.products

                })

              },
              addToCart(){
                
                if(this.price == 0){
                  if(this.selectedLanguage == "spanish"){
                    alertify.error("Debes seleccionar un tamaño")
                  }else{
                    alertify.error("You have to first add a size")
                  }
                }else{
                  var cart = []
                  var formatSizeIndex = null

                  if(window.localStorage.getItem("aida_cart")){

                    cart = JSON.parse(window.localStorage.getItem("aida_cart"))

                  }

                  this.formatSizes.forEach((data, index) => {
                    
                    if(data.size_id == this.selectSize && data.format_id == this.format){
                      formatSizeIndex = index
                    }

                  })

                  cart.push({id: this.formatSizes[formatSizeIndex].id})
                  window.localStorage.setItem("aida_cart", JSON.stringify(cart))

                  if(window.localStorage.getItem("aida_token") && window.localStorage.getItem("aida_user")){

                    axios.post("{{ url('/get-user') }}", {}, {
                      headers: {
                        Authorization: "Bearer "+window.localStorage.getItem('aida_token')
                      }
                    }).then(res =>{

                      axios.post("{{ url('/cart/store') }}", {formatSizeId: this.formatSizes[formatSizeIndex].id}, {
                      headers: {
                        Authorization: "Bearer "+window.localStorage.getItem('aida_token')
                      }
                    }).then(res => {
                        if(this.selectedLanguage == "spanish"){
                          alertify.success("producto agregado al carrito")
                        }else{
                          alertify.success("Product added to cart")
                        }
                      })

                    })

                    

                  }else{

                    if(this.selectedLanguage == "spanish"){
                      alertify.success("producto agregado al carrito")
                    }else{
                      alertify.success("Product added to cart")
                    }

                  }
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

                this.fetchFormatSizesByProduct()

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

    <script>
        
        const other = new Vue({
            el: '#otherInfo',
            data() {
                return {
                  
                  selectedLanguage:"",
                  products:[],
  
                }
            },
            methods: {  

              fetchProducts(){

                axios.get("{{ url('/home/products') }}").then(res => {

                    this.products = res.data.products

                })

              }

            },
            created(){
              this.fetchProducts()

                if(window.localStorage.getItem("aida_language") == null){
                    window.localStorage.setItem("aida_language", "spanish")
                    this.selectedLanguage = "spanish"

                    $("#scaleText").html("Vista a escala")
                    $("#zoomText").html("Zoom/Mejor vista")

                }else{
                    this.selectedLanguage = window.localStorage.getItem("aida_language")

                    if(this.selectedLanguage == "spanish"){
                      $("#scaleText").html("Vista a escala")
                      $("#zoomText").html("Zoom/Mejor vista")

                    }else{
                      $("#scaleText").html("View Scale")
                    $("#zoomText").html("Zoom/Better View")
                    }

                    
                    
                }

            }

        })
      </script>

@endpush