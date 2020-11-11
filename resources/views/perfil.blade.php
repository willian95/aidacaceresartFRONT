@extends("layouts.index")

@section("content")
@include('partials.loader')

<section class="container mt-5 mb-5 perfil">
    <div class="car">
        <div class="card-body">
            <div class="title__general title__general2 fadeInUp wow animated title__general_flex">
                <p class="main_title-general">Perfil</p>

                <div class=" form-group  text-center">
                    <button class="btn btn-primary btn-custom "">Editar</button>
             
               </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Nombre y apellido</label>
                        <input placeholder="pedro perez" type="text" autocomplete="off" class="form-control"
                            id="email" aria-describedby="emailHelp" v-model="name">
                        <i class="fa fa-user icon_form"></i>
                        <small v-if="errors.hasOwnProperty('name')">@{{ errors['name'][0] }}</small>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <input placeholder="pedroperez@gmail.com" type="email" autocomplete="off"
                            class="form-control" id="email" aria-describedby="emailHelp" v-model="email">
                        <i class="fa fa-envelope icon_form"></i>
                        <small v-if="errors.hasOwnProperty('email')">@{{ errors['email'][0] }}</small>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password">Dirección</label>

                        <input placeholder="Dirección" type="text" class="form-control  " id="password" v-model="address">
                        <i class="fa fa-globe icon_form"></i>
                        <small v-if="errors.hasOwnProperty('address')">@{{ errors['address'][0] }}</small>
                    </div>
                    <div class="form-group">
                        <label for="password">Telefono</label>

                        <input placeholder="+1234567" type="text" class="form-control  " id="password" v-model="phone">
                        <i class="fa fa-phone icon_form"></i>
                        <small v-if="errors.hasOwnProperty('phone')">@{{ errors['phone'][0] }}</small>
                    </div>
                </div>
                <div class="col-md-12">
                    <p class="text-center">
                        <button class="btn btn-success" @click="update()">Actualizar</button>
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
                  name:"",
                  email:"",
                  address:"",
                  phone:"",
                  errors:[]
                }
            },
            methods: {

                update(){

                    axios.post("{{ url('/profile/update') }}", {name: this.name, email: this.email, address: this.address, phone: this.phone}, headers: {
                        Authorization: "Bearer "+window.localStorage.getItem('aida_token')
                    }).then(res =>{

                        if(res.data.success == true){

                            swal({
                                title: "Excelente!",
                                text: res.data.msg,
                                icon: "success"
                            })

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

                }
                

            },
            mounted(){

                let user = JSON.parse(window.localStorage.getItem("aida_user"))
                this.name = user.name
                this.email = user.email
                this.address = user.address
                this.phone = user.phone

            }
            

        })

         
    </script>

@endpush