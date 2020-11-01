@extends("layouts.index")

@section("content")

  <div >
      <section class="container pt-5 ">
        <div class="main main-details__product">
          <div class="row">
            <div class="col-md-6">
              <div id="demo-test-gallery" class="demo-gallery" data-pswp-uid="1">
                <div class="main-banner_item main-detalle_item">
                  <a href="http://imgfz.com/i/7Fw3pJi.jpeg" data-size="1600x1068" data-author=""
                    data-med="http://imgfz.com/i/7Fw3pJi.jpeg" data-med-size="1024x683">
                    <img src="http://imgfz.com/i/7Fw3pJi.jpeg" alt="">
                  </a>
                </div>
              </div>

              <div class="iconos_detalle text-center">
                <i class="flaticon-eye-variant-with-enlarged-pupil">Scale View</i>
                <i class="flaticon-zoom-in-1">Zoom/Betterm
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
                        <p>{{ $product->name }} </p>
                        <span> by Aida</span>
                      </div>
                      <div class="row">
                        <div class="col-md-6 p-0 flex-center">
                          <div class="main-top__description">
                            <p>{{ $product->description }}</p>
                          </div>
                        </div>
                        <div class="col-md-6 p-per">
                          <div class="form-group">
                            <label for="exampleFormControlSelect1"><strong>Format</strong></label>
                            <select class="form-control" id="exampleFormControlSelect1" @change="selectSizes()" v-model="format">
                              <option v-for="format in formats" :value="format.format_id">@{{ format.format.name }}</option>
                            </select>
                          </div>
                          <div class="main-top__price">
                            <p>$ @{{ price }} </p>
                          </div>
                          <div class="text-center main-top__btn ">
                            <a class="btn-custom mr-4"  @click="addToCart()">
                              Buy <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </a>
                          </div>
                        </div>
                      </div>


                      <p class="dimens-title">Dimensions</p>
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


      
      <section class="container">
        <div class="atention">
          <div class="atention-item">
            <p>Fast Shipping via DHL or FEDEX (Ground and
              International)
            </p>
          </div>
          <div class="atention-item">
            <p>Each item includes an o!cial certificate of
              authenticity, creation of date and a personal </p>
          </div>
          <div class="atention-item">
            <p>There are no returns, for additional information send an email to sales@aidart.co
              and we’ll get back to you in less than 4 hours</p>
          </div>
        </div>
      </section>

      <section class="container">
        <!----GALERIA------>
        <section>
              <p class="main_title-general">Gallery</p>
              <div id="galeria" class="galeria galeria--h container">
                <div class="galeria-brick galeria-brick--h" v-for="product in products">
                      <a :href="'{{ url('/product/') }}'+'/'+product.slug">
                          <div class="galeria_name">
                              <p>@{{ product.name }}</p>
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
                  products:[],
                  formats:[],
                  sizes:[],
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

                    })

                  })

                  

                }


              },
              fetchProducts(){

                axios.get("{{ url('/home/products') }}").then(res => {

                    this.products = res.data.products

                })

              }
                

            },
            mounted(){

                this.fetchFormatSizesByProduct()
                this.fetchProducts()

            }
            

        })

         
    </script>

@endpush