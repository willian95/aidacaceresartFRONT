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
                  
                    <div id="img-zoomer-box">
                      <img class="img-height" src="{{ $product->image }}" alt="" id="img1" >
                      <div id="img2" style="  background: url('{{ $product->image }}') no-repeat #FFF;"></div>
                    </div>
                      
                  </a>
                </div>
              </div>

              <div class="iconos_detalle text-center">
                <i class="flaticon-eye-variant-with-enlarged-pupil" id="scaleText" data-toggle="modal" data-target="#escala">Scale View</i>
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
                        <span v-if="selectedLanguage == 'english'"> By Aida</span>
                        <span v-if="selectedLanguage == 'spanish'"> Por Aida</span>
                      </div>
                      <div class="row">
                        <div class="col-md-6 p-0 ">
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
                            <span v-if="selectedLanguage == 'spanish'">@{{ size.width }}cm x @{{ size.height }}cm</span>
                            <span v-if="selectedLanguage == 'english'">@{{ (size.width / 2.54).toFixed(2) }}in x @{{ (size.height/2.54).toFixed(2) }}in</span>

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
                        <div class="text-center main-top__btn ml-auto mr-4">
                          <a class="btn-custom mr-4"  @click="addToCart()">
                            <span v-if="selectedLanguage == 'english'">Buy</span> <span v-if="selectedLanguage == 'spanish'">Comprar</span> <i class="fa fa-angle-right" aria-hidden="true"></i>
                          </a>
                        </div>
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

      <div class="modal fade" id="shippingInfo" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <!--- <div class="triangle"></div>--->
              <div class="modal-dialog modal-dialog-centered new-w" role="document">
                  <div class="modal-content ">
          
                      <div class="modal-bod">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeNewsletter">
                              <span aria-hidden="true">×</span>
                          </button>
                          <div class="row">
                            <div class="col-md-12">
                                <div class="news">

                                    <p v-if="selectedLanguage == 'spanish'">
                                      Cada obra es cuidadosamente empacada por la artista, garantizando que cada cuadro llegue intacto a su destino. El trabajo se confía a un proveedor de servicios especializado reconocido y dé alcance internacional. Se organizará un tiempo de entrega entre usted y el operador logístico, el trabajo se entregará a la dirección indicada en el momento del pedido. Actualmente, la artista paga los costos de embalaje y entrega del trabajo. Los costos de envío solo se facturarán si el cliente solicitó expresamente que se enmarque la obra (debido a un peso adicional), o si el destino de la entrega no está cubierto por nuestro aliado de envío y el uso de un proveedor diferente, no preferencial las tasas son obligatorias. Si el trabajo llegara roto o dañado, la artista pagará los costes de devolución y gestionará cualquier compensación entre la artista y el comprador. Si el trabajo no puede ser reparado o restaurado, el cliente será reembolsado inmediatamente.
                                    </p>
                                    <p v-if="selectedLanguage == 'english'">
                                      Each artwork is carefully packed by the artist, she guarantees that each painting will be delivered in perfect condition to its destination. The art work will be shipped through a reputable international shipping company. The company will be reaching out to you to set up a time of delivery convenient for you. The artist will cover the cost of shipping and handling. Framing is available upon request; additional charges will apply depending on frame size and weight. If the painting is broken or damaged returns will be covered. An effort will be made to fix the painting but if unable to do so a full reimbursement will be made.
                                    </p>
                                
                                </div>
                            </div>
                          </div>
                      </div>
          
                  
          
                  </div>
              </div>
        </div>
        

        <div class="modal fade" id="returnInfo" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="triangle"></div>
              <div class="modal-dialog modal-dialog-centered new-w" role="document">
                  <div class="modal-content ">
          
                      <div class="modal-bod">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeNewsletter">
                              <span aria-hidden="true">×</span>
                          </button>
                          <div class="row">
                            <div class="col-md-12">
                                <div class="news">

                                    <p v-if="selectedLanguage == 'spanish'">
                                      La artista tiene un período de devolución de 14 días, a partir del día en que recibe el trabajo. Si la pintura se devuelve en perfectas condiciones, el artista cubrirá el envío y le dará un reembolso completo.
                                    </p>
                                    <p v-if="selectedLanguage == 'spanish'">
                                      ¡Contáctenos para más información!
                                    </p>
                                    <p v-if="selectedLanguage == 'english'">
                                    The Artist will accept returns in a 14 days period starting the day you received the painting. If the painting is returned in perfect condition the artist will cover shipping and give you a full refund
                                    </p>
                                    <p v-if="selectedLanguage == 'english'">
                                    Contact us for additional information.
                                    </p>

                                    <a href="mailto:aida@aidacaceresart.com">aida@aidacaceresart.com</a>
                                
                                </div>
                            </div>
                          </div>
                      </div>
          
                  
          
                  </div>
              </div>
        </div>
        

        <section class="container">
          <div class="atention">
            <div class="atention-item" @mouseover="showShippingInfo()">
              <p v-if="selectedLanguage == 'english'">
              
                <img class="img-pago"  src="http://imgfz.com/i/mufyBjh.png" alt=""><br>
                All national and international shipping will be handled by DHL, time varies depending on destination.
              </p>
              <p v-if="selectedLanguage == 'spanish'">
                <img class="img-pago"  src="http://imgfz.com/i/mufyBjh.png" alt=""> <br>
                Envíos dentro y fuera de Colombia se envían mediante mensajería DHL. Los tiempos de entrega varían según el destino.
              </p>
            </div>
            <div class="atention-item">
              <p v-if="selectedLanguage == 'english'">Each artwork is original and unique. All paintings will be sent with a certification of authenticity.</p>
              <p v-if="selectedLanguage == 'spanish'">
                <img class="img-pago" style="object-fit: contain;"  src="http://imgfz.com/i/EOhGH12.png" alt=""> <br>
                Cada obra desarrollada por la artista es original y pieza única. Cualquiera que sea el medio, el trabajo se envía al comprador con un certificado de autenticidad. </p>
            </div>
            <div class="atention-item" @mouseover="showReturnInfo()">
              <p v-if="selectedLanguage == 'english'">
                <img class="img-pago" src="http://imgfz.com/i/9dtPeXp.png" alt=""> <br>
                Returns?</p>
              <p v-if="selectedLanguage == 'spanish'">
                <img class="img-pago" style="    height: 68px;
                object-fit: contain;" src="http://imgfz.com/i/9dtPeXp.png" alt=""> <br>
                Devoluciones?</p>
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
        </section>
      </div>

      
  <!-- Modal -->
<div class="modal fade" id="escala" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
       <!-- fondo 1 -->
      <div class="modal-bodys position-relative">
        

        

        @php
            
          $sizeId = App\ProductFormatSize::where("product_id", $product->id)->first()->size_id;
          $size = App\Size::where("id", $sizeId)->first();

        @endphp

        @if($size->width > 80 || $size->height > 80)
        <img class="img-escala" src="{{ $product->image }}" alt="" style="width: 50px;
    margin-top: -35px;
    margin-left: 15%;">
        <img alt='' src='{{ asset('assets/img/fondos/fondo-grande.png') }}'>
        @elseif($size->width > 36 && $size->height > 40)
        <img class="img-escala" src="{{ $product->image }}" alt="" style="width: 50px;
    margin-top: -35px;
    margin-left: 15%;">
        <img alt='' src='{{ asset('assets/img/fondos/fondo-mediano.png') }}'>
        @else
        <img class="img-escala" src="{{ $product->image }}" alt="" style="width: 50px;
    margin-top: -35px;
    margin-left: 15%;">
        <img alt='' src='{{ asset('assets/img/fondos/fondo-pequeno.png') }}'>
        @endif
      </div>
      <!-- fondo 1 -->
     
    </div>
  </div>
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
              showShippingInfo(){
                $("#shippingInfo").modal("show");
              },
              showReturnInfo(){
                $("#returnInfo").modal("show");
              },
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