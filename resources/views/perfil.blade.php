@extends("layouts.index")

@section("content")
@include('partials.loader')

<section class="container mt-5 mb-5 perfil" id="profile-dev">
    <div class="car">
        <div class="card-body">
            <div class="title__general title__general2 fadeInUp wow animated title__general_flex">
                <p v-if="selectedLanguage == 'spanish'" class="main_title-general">Perfil</p>
                <p v-if="selectedLanguage == 'english'" class="main_title-general">Profile</p>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name" v-if="selectedLanguage == 'spanish'">Nombre y apellido</label>
                        <label for="name" v-if="selectedLanguage == 'english'">Name and lastname</label>
                        <input placeholder="pedro perez" type="text" autocomplete="off" class="form-control"
                            id="name" aria-describedby="emailHelp" v-model="name">
                        <i class="fa fa-user icon_form"></i>
                        <small v-if="errors.hasOwnProperty('name')">@{{ errors['name'][0] }}</small>
                    </div>
                    <div class="form-group">
                        <label for="email" v-if="selectedLanguage == 'spanish'">Correo electrónico</label>
                        <label for="email" v-if="selectedLanguage == 'english'">Email</label>
                        <input placeholder="pedroperez@gmail.com" type="email" autocomplete="off"
                            class="form-control" id="email" aria-describedby="emailHelp" v-model="email">
                        <i class="fa fa-envelope icon_form"></i>
                        <small v-if="errors.hasOwnProperty('email')">@{{ errors['email'][0] }}</small>
                    </div>

                    <div class="form-group">
                        <label for="country" v-if="selectedLanguage == 'spanish'">País</label>
                        <label for="country" v-if="selectedLanguage == 'english'">Country</label>

                        <select class="form-control" v-model="country">
                        
                            <option :value="country.id" v-for="country in countries">@{{ country.name }}</option>
                        </select>
                        <small v-if="errors.hasOwnProperty('country')">@{{ errors['country'][0] }}</small>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="address" v-if="selectedLanguage == 'spanish'">Dirección</label>
                        <label for="address" v-if="selectedLanguage == 'english'">Address</label>

                        <input placeholder="Dirección" type="text" class="form-control  " id="address" v-model="address">
                        <i class="fa fa-globe icon_form"></i>
                        <small v-if="errors.hasOwnProperty('address')">@{{ errors['address'][0] }}</small>
                    </div>

                    <div class="form-group">
                        <label for="phone" v-if="selectedLanguage == 'spanish'">Teléfono</label>
                        <label for="phone" v-if="selectedLanguage == 'english'">Phone</label>

                        <input placeholder="+1234567" type="text" class="form-control  " id="phone" v-model="phone">
                        <i class="fa fa-phone icon_form"></i>
                        <small v-if="errors.hasOwnProperty('phone')">@{{ errors['phone'][0] }}</small>
                    </div>
                </div>
                <div class="col-md-12">
                    <p class="text-center">
                        <button class="btn btn-primary btn-custom " @click="update()"><span v-if="selectedLanguage == 'spanish'">Actualizar</span><span v-if="selectedLanguage == 'english'">Update</span></button>
                    </p>
                </div>

                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr >
                                <th class="datatable-cell datatable-cell-sort">
                                    <span >#</span>
                                </th>

                                <th class="datatable-cell datatable-cell-sort">
                                    <span >Status</span>
                                </th>

                                <th class="datatable-cell datatable-cell-sort">
                                    <span >Total</span>
                                </th>
                                <th class="datatable-cell datatable-cell-sort">
                                    <span v-if="selectedLanguage == 'spanish'">Fecha</span>
                                    <span v-if="selectedLanguage == 'english'">Date</span>
                                </th>
                                <th class="datatable-cell datatable-cell-sort">
                                    <span v-if="selectedLanguage == 'spanish'">Acciones</span>
                                    <span v-if="selectedLanguage == 'english'">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(shopping, index) in shoppings">
                                <th>@{{ shopping.order_id }}</th>
                                <td style="text-transform: capitalize;">@{{ shopping.status }}</td>
                                <td>$ @{{  currencyFormatDE(shopping.total) }}</td>
                                <td>@{{ dateFormatter(shopping.created_at.toString().substring(0, 10)) }}</td>
                                <td>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#shoppingModal" @click="show(shopping)"><i class="fa fa-eye"></i></button>
                                    
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

            <!-- Modal-->
        <div class="modal fade" id="shoppingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" v-if="selectedLanguage == 'spanish'">Información</h5>
                        <h5 class="modal-title" id="exampleModalLabel" v-if="selectedLanguage == 'english'">Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body" v-if="shopping != ''">
                        <div class="row">
                            <div class="col-md-6">
                                <label v-if="selectedLanguage == 'spanish'"><strong>Cliente</strong></label>
                                <label v-if="selectedLanguage == 'english'"><strong>Client</strong></label>
                                <p v-if="shopping.user">@{{ shopping.user.name }}</p>
                                <p v-if="shopping.guest_user">@{{ shopping.guest_user.name }}</p>
                            </div>
                            <div class="col-md-6">
                                <label><strong>Email</strong></label>
                                <p v-if="shopping.user">@{{ shopping.user.email }}</p>
                                <p v-if="shopping.guest_user">@{{ shopping.guest_user.email }}</p>
                            </div>
                            <div class="col-md-6">
                                <label v-if="selectedLanguage == 'spanish'"><strong>Teléfono</strong></label>
                                <label v-if="selectedLanguage == 'english'"><strong>Phone</strong></label>
                                <p v-if="shopping.user">@{{ shopping.user.phone }}</p>
                                <p v-if="shopping.guest_user">@{{ shopping.guest_user.phone }}</p>
                            </div>
                            <div class="col-md-6">
                                <label v-if="selectedLanguage == 'spanish'"><strong>Dirección</strong></label>
                                <label v-if="selectedLanguage == 'english'"><strong>Address</strong></label>
                                <p v-if="shopping.user">@{{ shopping.user.address }}</p>
                                <p v-if="shopping.guest_user">@{{ shopping.guest_user.address }}</p>
                            </div>
                            <div class="col-md-6">
                                <label v-if="selectedLanguage == 'spanish'"><strong>País</strong></label>
                                <label v-if="selectedLanguage == 'english'"><strong>Country</strong></label>
                                <p v-if="shopping.user">@{{ shopping.user.country.name }}</p>
                                <p v-if="shopping.guest_user">@{{ shopping.guest_user.country.name }}</p>
                            </div>
                            <div class="col-md-6">
                                <label v-if="selectedLanguage == 'spanish'"><strong>Costo productos</strong></label>
                                <label v-if="selectedLanguage == 'english'"><strong>Products cost</strong></label>
                                <p>$ @{{ currencyFormatDE(shopping.total_products) }}</p>
                            </div>
                            
                            <div class="col-md-6">
                                <label><strong>Total</strong></label>
                                <p>$ @{{ currencyFormatDE(shopping.total) }}</p>
                            </div>
                            <div class="col-md-6" v-if="shopping.tracking != 0">
                                <label><strong>Tracking</strong></label>
                                <p>
                                <a :href="shopping.tracking_url">@{{ shopping.tracking }}</a>
                                </p>
                            </div>
                            <!--<div class="col-md-6">
                                <label>Status tracing</label>
                                <p>@{{ shopping.status_shipping }}</p>
                            </div>-->
                            
                            <div class="col-md-12">
                                <h3 class="text-center" v-if="selectedLanguage == 'spanish'">Productos</h3>
                                <h3 class="text-center" v-if="selectedLanguage == 'english'">Products</h3>
                            </div>
                            <div class="col-md-12">
                                <table class="table table-bordered table-checkable">
                                    <thead>
                                        <tr>
                                            <th v-if="selectedLanguage == 'spanish'">Producto</th>
                                            <th v-if="selectedLanguage == 'english'">Product</th>
                                            <th v-if="selectedLanguage == 'spanish'">Precio</th>
                                            <th v-if="selectedLanguage == 'english'">Price</th>
                                        
                                            <th v-if="selectedLanguage == 'spanish'">Tamaño</th>
                                            <th v-if="selectedLanguage == 'english'">Size</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(shoppingPurchase, index) in shopping.product_purchases">
                                            <td v-if="selectedLanguage == 'spanish'">@{{ shoppingPurchase.product_format_size.product.name }}</td>
                                            <td v-if="selectedLanguage == 'english'">@{{ shoppingPurchase.product_format_size.product.english_name }}</td>
                                            <td>$ @{{ currencyFormatDE(shoppingPurchase.price) }}</td>
                                            <td v-if="selectedLanguage == 'spanish'">@{{ shoppingPurchase.product_format_size.size.width }}cm * @{{ shoppingPurchase.product_format_size.size.height }}cm</td>
                                            <td v-if="selectedLanguage == 'english'">@{{ (shoppingPurchase.product_format_size.size.width/2.54).toFixed(2) }}in * @{{ (shoppingPurchase.product_format_size.size.height / 2.54).toFixed(2) }}cm</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal" v-if="selectedLanguage == 'spanish'">Cerrar</button>
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal" v-if="selectedLanguage == 'english'">Close</button>
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
            el: '#profile-dev',
            data() {
                return {
                    selectedLanguage:"",
                  name:"",
                  email:"",
                  country:"",
                  dni:"",
                  countries:[],
                  address:"",
                  phone:"",
                  role_id:"",
                  errors:[],
                  shopping:"",
                    shoppings:[],
                }
            },
            methods: {

                show(shopping){

                    this.shopping = shopping
                    console.log(this.shopping)

                },
                update(){

                    axios.post("{{ url('/profile/update') }}", {name: this.name, email: this.email, address: this.address, phone: this.phone, country: this.country}, {
                        headers: {
                            Authorization: "Bearer "+window.localStorage.getItem('aida_token')
                        }
                    }).then(res =>{

                        if(res.data.success == true){

                            swal({
                                title: "Excelente!",
                                text: res.data.msg,
                                icon: "success"
                            })


                            window.localStorage.setItem("aida_user", JSON.stringify({name: this.name, email: this.email, address: this.address, telephone: this.phone, country_id: this.country, dni: this.dni, role_id: this.role_id}))

                        }else{

                            swal({
                                title: "Lo sentimos!",
                                text: res.data.msg,
                                icon: "error"
                            })

                        }

                    })
                    .catch(err => {
                        this.errors = err.response.data.errors
                    })

                },
                fetchCountries(){

                    axios.get("{{ url('/countries/fetch') }}").then(res => {

                        this.countries = res.data.countries

                    })

                },
                fetch(page = 1){

                    this.loading= true

                    axios.get("{{ url('/sales/fetch/') }}"+"/"+page, {headers: {
                            Authorization: "Bearer "+window.localStorage.getItem('aida_token')
                        }})
                    .then(res => {

                        this.loading= false
                        this.shoppings = res.data.sales

                    })
                    .catch(err => {
                        this.loading = false
                        $.each(err.response.data.errors, function(key, value){
                            alert(value)
                        });
                    })

                },
                dateFormatter(date){
                    
                    let year = date.substring(0, 4)
                    let month = date.substring(5, 7)
                    let day = date.substring(8, 10)
                    return day+"-"+month+"-"+year
                },
                currencyFormatDE(num) {
                    return (
                        num
                        .toFixed(2) // always two decimal digits
                        .replace('.', ',') // replace decimal point character with ,
                        .replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
                    ) // use . as a separator
                },
                

            },
            mounted(){

                let user = JSON.parse(window.localStorage.getItem("aida_user"))
                this.name = user.name
                this.email = user.email
                this.address = user.address
                this.country = user.country_id
                this.phone = user.telephone
                this.dni = user.dni
                this.role_id = user.role_id

                if(window.localStorage.getItem("aida_language") == null){
                    window.localStorage.setItem("aida_language", "spanish")
                    this.selectedLanguage = "spanish"
                }else{
                    this.selectedLanguage = window.localStorage.getItem("aida_language")
                }

                this.fetchCountries()
                this.fetch()

            }
            

        })

         
    </script>

@endpush