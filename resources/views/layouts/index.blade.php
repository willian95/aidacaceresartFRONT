<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="{{ url('/assets/img/iso.PNG') }}" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.0/photoswipe.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.0/default-skin/default-skin.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Pathway+Gothic+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/galeria.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/Flaticon.woff') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/detalle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <title>Document</title>

    </head>

<body>
    <header>
        <nav class='navbar navbar-expand-md navbar-fixed-js'>
            <div class='container flex-content'>
                <button class='navbar-toggler p-2 border-0 hamburger hamburger--elastic d-none-lg'
                    data-toggle='offcanvas' type='button'>
                    <span class='hamburger-box'>
                        <span class='hamburger-inner'></span>
                    </span>
                </button>
                <div class='offcanvas-collapse fil' id='navbarNav'>

                    <ul class='navbar-nav'>
                        <div class="flex-content">
                            <li class='nav-item dropdown dowms'>


                                <a href='#' aria-expanded='false' aria-haspopup='true'
                                    class='nav-link dropdown-toggle nav-link-black ' data-toggle='dropdown'>
                                    USD
                                </a>
                                <div aria-labelledby='dropdownMenuButton' class='dropdown-menu'>
                                    <div class='content-drop'>
                                        <a class='dropdown-item' href='#'>
                                            <p> HKD</p>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class='nav-item dropdown dowms'>
                                <a href='#' aria-expanded='false' aria-haspopup='true'
                                    class='nav-link dropdown-toggle nav-link-black ' data-toggle='dropdown'>
                                    EN
                                    <!---<i class="flaticon-translation"></i>--->

                                </a>
                                <div aria-labelledby='dropdownMenuButton' class='dropdown-menu'>
                                    <div class='content-drop'>
                                        <a class='dropdown-item' href='#'>
                                            <p> ES</p>
                                        </a>
                                    </div>
                                </div>
                            </li>

                        </div>
                        <div class="flex-content m-155">
                            <li class='nav-item mr-5'>
                                <a class='nav-link nav-link-black ' href='galeria.html'>Gallery</a>
                            </li>
                            <li class='nav-item'>
                                <a class='brand' href='#'>
                                    <img alt='' src='assets/img/logo-blue.png'>
                                </a>
                            </li>

                            <li class='nav-item ml-5'>
                                <a class='nav-link ' href="aboutme.html">About me</a>
                            </li>
                        </div>
                        <div class="flex-content ">
                            <li class='nav-item active'>
                                <a  id="openRegisterModal"  class='nav-link active' data-toggle="modal" data-target="#registerModal">
                                    <i class="flaticon-shopping-bag"></i>

                                </a>
                            </li>
                            <li class='nav-item'>
                                <a id="openLoginModal" class='nav-link' href='#tienda' data-toggle="modal" data-target="#loginModal"><i
                                        class="flaticon-user"></i>

                                </a>
                            </li>
       
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

       

        @yield("content")


        <!-- Modal -->
        <div id="authModal">
            <div class="modal fade login_main" id="registerModal" id="registro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg modal_w">
                    <div class="modal-content ">
                        <div class="modal-body">
                            <button id="registerModalClose" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-7 p-50">
                                        <p class="m-0 title-login">Registro</p>
                                        <form action="">
                                            <div class="form-group">                           
                                                <input placeholder="Nombre y apellido" type="email" autocomplete="off" class="form-control"
                                                  id="email" aria-describedby="emailHelp">
                                                <i class="fa fa-user icon_form"></i>
                                              </div>
                      
                                              <div class="form-group">
                                                <input placeholder="Correo electrónico" type="email" autocomplete="off" class="form-control"
                                                  id="email" aria-describedby="emailHelp">
                                                <i class="fa fa-envelope icon_form"></i>
                                              </div>
        
                                              <div class="row">
                                                  <div class="col-md-6 form-group">
                                                    <input placeholder="Cèdula" type="email" class="form-control">                                       
                                                  </div>
                                                  <div class="col-md-6 form-group">
                                                    <input placeholder="Télefono" type="email" class="form-control">
                                                </div>
                                              </div>
                                              <div class="row">
                                                  <div class="col-md-12 form-group">
                                                    <input placeholder="Dirección" type="password" class="form-control  " >
                                            
                                                  </div>
                                              </div>
        
                                              <div class="form-group">
                                                <input placeholder="Contraseña" type="password" class="form-control  " id="password">
                                                <i class="fa fa-lock icon_form"></i>
                                              </div>
                                              <div class="form-group">
                                                <input placeholder="Confirmar contraseña" type="password" class="form-control  " id="password">
                                                <i class="fa fa-lock icon_form"></i>
                                              </div>
                                       
                                            <div class=" form-group mt-4 text-center">
                                                <button class="btn btn-primary btn-custom "">Registrarme<i class=" fa
                                                    fa-angle-right" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                            <div class=" mb-5 text-center">
                                                <p class="inicia">ó registrate facil</p>
                                                <a class="btn-login  mr-2" href=""> <img class=img_social
                                                        src="assets/img/facebook.png" alt=""> Facebook</a>
                                                <a class="btn-login btn-login2" href=""> <img class="img_social"
                                                        src="assets/img/google.png" alt="">
                                                    Google</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div class=" col-md-5 gray flex-center">
                                        <div class=" text-center registrar_facil">
                                            <a class="txt" href="">¡Inicia sesión! <i class=" fa
                                              fa-angle-right" aria-hidden="true"></i></a>
                                            <p>¿Ya tienes cuenta?</p>
        
                                        </div>
        
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>



            <!-- modal login -->
            <div class="modal fade login_main" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content ">
                        <div class="modal-body">
                            <button id="loginModalClose" type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 p-50">
                                        <p class="m-0 title-login">Inicio de sesión</p>
                                        <form action="">
                                            <div class="form-group">
                                                <!---  <label for="email">Correo electrónico</label>-->
                                                <input placeholder="Correo electrónico" type="email" autocomplete="off"
                                                    class="form-control" id="email" aria-describedby="emailHelp">
                                                <i class="fa fa-envelope icon_form"></i>
                                            </div>
                                            <div class="form-group">
                                                <!--<label for="password">Contraseña</label>-->
        
                                                <input placeholder="Contraseña" type="password" class="form-control  "
                                                    id="password">
                                                <i class="fa fa-lock icon_form"></i>
                                            </div>
                                            <div class="form-group  text-lg-right">
                                                <a href="" class="texto">¿Has olvidado tu contraseña?</a>
                                            </div>
                                            <div class=" form-group mt-4 text-center">
                                                <button class="btn btn-primary btn-custom "">Ingresar <i class=" fa
                                                    fa-angle-right" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                            <div class=" mb-5 text-center">
                                                <p class="inicia">ó inicia sesión con</p>
                                                <a class="btn-login  mr-2" href=""> <img class=img_social
                                                        src="assets/img/facebook.png" alt=""> Facebook</a>
                                                <a class="btn-login btn-login2" href=""> <img class="img_social"
                                                        src="assets/img/google.png" alt="">
                                                    Google</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div class=" col-md-6 gray flex-center">
                                        <div class=" text-center registrar_facil">
                                            <a class="txt" href="" data-toggle="modal" data-target="#register-modal">¡Registrate facíl! <i class=" fa
                                                fa-angle-right" aria-hidden="true"></i></a>
                                            <p>¿Aún no tienes cuenta?</p>
        
                                        </div>
        
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>


     
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.0/photoswipe.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.0/photoswipe-ui-default.min.js"></script>
        
        <script src="{{ asset('assets/js/slick.min.js') }}"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>
        
        
        

        <script>
           
            const navbar = new Vue({
                el: '#authModal',
                data() {
                    return {
                        name: "",
                        email: "",
                        password: "",
                        password_confirmation: "",
                        phone: "",
                        identification: "",
                        address: "",
                        emailLogin: "",
                        passwordLogin: "",
                        products: [],
                        guesProducts: [],
                        authCheck: "{{ Auth::check() }}",                
                        url:"{{ url('/') }}"
                    }
                },
                methods: {

                    isNumber: function(evt) {
                        evt = (evt) ? evt : window.event;
                        var charCode = (evt.which) ? evt.which : evt.keyCode;
                        if ((charCode > 31 && (charCode < 48 || charCode > 57))) {
                            evt.preventDefault();;
                        } else {
                            return true;
                        }
                    },
                    register() {

                        axios.post("{{ url('/register') }}", {
                                name: this.name,
                                email: this.email,
                                password: this.password,
                                password_confirmation: this.password_confirmation,
                                phone: this.phone,
                                identification: this.identification,
                                address: this.address
                            }).then(res => {

                                if (res.data.success == true) {
                                    swal({
                                        title: "Excelente!",
                                        text: res.data.msg,
                                        icon: "success"
                                    });
                                    this.name = ""
                                    this.email = ""
                                    this.password = ""
                                    this.password_confirmation = ""
                                    this.phone = ""
                                    this.identification = ""
                                    this.address = ""
                                } else {
                                    alertify.error(res.data.msg)
                                }

                            })
                            .catch(err => {
                                $.each(err.response.data.errors, function(key, value) {
                                    alertify.error(value[0])
                                    //alertify.error(value);
                                    //alertify.alert('Basic: true').set('basic', true); 
                                });
                            })

                    },
                    openRegisterModal() {

                        $("#loginModalClose").click();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '0px');
                        $('.modal-backdrop').remove();

                        $("#openRegisterModal").click()

                    },
                    openLoginModal() {

                        $("#registerModalClose").click();
                        $('body').removeClass('modal-open');
                        $('body').css('padding-right', '0px');
                        $('.modal-backdrop').remove();

                        $("#openLoginModal").click()

                    },
                    login() {

                        axios.post("{{ url('/login') }}", {
                                email: this.emailLogin,
                                password: this.passwordLogin
                            })
                            .then(res => {

                                if (res.data.success == true) {

                                    swal({
                                        title: "Excelente!",
                                        text: res.data.msg,
                                        icon: "success"
                                    }).then(() => {
                                        window.location.href = "{{ url('/') }}"
                                    });
                                    this.cartInfo()


                                } else {
                                    alertify.error(res.data.msg)
                                }
                            })


                    },
                 

                },
              

            })

          
        </script>

        @stack("scripts")

</body>

</html>