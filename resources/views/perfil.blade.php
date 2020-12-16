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
                            <option value="" v-if="selectedLanguage == 'spanish'">País</option>
                            <option value="" v-if="selectedLanguage == 'spanish'">Country</option>
                            <option :value="country.id" v-for="country in countries">@{{ country.name }}</option>
                        </select>
                        <small v-if="errors.hasOwnProperty('address')">@{{ errors['country'][0] }}</small>
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
                  errors:[]
                }
            },
            methods: {

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

            }
            

        })

         
    </script>

@endpush