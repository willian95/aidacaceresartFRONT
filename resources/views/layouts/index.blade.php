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

    @laravelPWA
    
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/Flaticon.woff') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/detalle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
   
    <link href="{{ asset('alertify/css/alertify.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('alertify/css/themes/bootstrap.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <style>
        .swal-overlay{
            z-index: 100000000 !important;
        }
    </style>

    <title>Aidaart</title>
    </head>

<body>
  
    <header>
        <nav class='navbar navbar-expand-md navbar-fixed-js'>
            <div class='container flex-content'>
                <div class="d-flex w-100 logoxs">
                    <a class='brand-xs' href='#'>
                        <img alt='' src='{{ asset('assets/img/logo.png') }}'>
                    </a>
                     <a  href="{{ url('/cart') }}">
                       <i class="flaticon-shopping-bag"></i>
                    </a>
                    <button class='navbar-toggler p-2 border-0 hamburger hamburger--elastic d-none-lg'
                        data-toggle='offcanvas' type='button'>
                        <span class='hamburger-box'>
                            <span class='hamburger-inner'></span>
                        </span>
                    </button>
                   </div>
                <div class='offcanvas-collapse fil' id='navbarNav'>

                    <ul class='navbar-nav'>
                        <div class="flex-content">
                            <li class='nav-item dropdown dowms'>


                                <a href='#' aria-expanded='false' aria-haspopup='true'
                                    class='nav-link dropdown-toggle nav-link-black ' data-toggle='dropdown' @click="toggleCurrencyMenu()">
                                    <span v-if="selectedCurrency == 'USD'">
                                        USD
                                    </span>
                                    <span v-else>
                                        COP
                                    </span>
                                </a>
                                <div aria-labelledby='dropdownMenuButton' class='dropdown-menu' id="currencyMenu">
                                    <div class='content-drop'>
                                        <a class='dropdown-item' href='#' v-if="selectedCurrency == 'COP'" @click="setCurrency('USD')">
                                            <p> USD</p>
                                        </a>

                                        <a class='dropdown-item' href='#' v-else @click="setCurrency('COP')">
                                            <p> COP</p>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class='nav-item dropdown dowms' >
                                <a href='#' aria-expanded='false' aria-haspopup='true'
                                    class='nav-link dropdown-toggle nav-link-black ' data-toggle='dropdown' @click="toggleLanguageMenu()">
                                    <span v-if="selectedLanguage == 'spanish'">
                                        ES
                                    </span>
                                    <span v-else>
                                        EN
                                    </span>
                                    
                                    <!---<i class="flaticon-translation"></i>--->

                                </a>
                                <div aria-labelledby='dropdownMenuButton' class='dropdown-menu' id="languageMenu">
                                    <div class='content-drop'>
                                        <a class='dropdown-item' href='#' v-if="selectedLanguage == 'spanish'" @click="setLanguage('english')">
                                            <p> EN</p>
                                        </a>

                                        <a class='dropdown-item' href='#' v-else @click="setLanguage('spanish')">
                                            <p> ES</p>
                                        </a>

                                        
                                    </div>
                                </div>
                            </li>

                        </div>
                        <div class="flex-content m-155">
                            <li class='nav-item mr-5'>
                                <a class='nav-link nav-link-black ' href="{{url('gallery') }}"><span v-if="selectedLanguage == 'english'">Gallery</span> <span v-if="selectedLanguage == 'spanish'">Galería</span></a>
                            </li>
                            <li class='nav-item'>
                                <a class='brand' href="{{ url('/') }}">
                                    <img alt='' src='{{ asset('assets/img/logo.png') }}'>
                                </a>
                            </li>

                            <li class='nav-item ml-5'>
                                <a class='nav-link ' href="{{ url('about') }}"> <span v-if="selectedLanguage == 'english'">About me</span> <span v-if="selectedLanguage == 'spanish'">Acerca de mí</span></a>
                            </li>
                        </div>
                        <div class="icon-redes mr-4">
                            <a target="_blank" href="https://www.instagram.com/aidacaceresart/?igshid=1b5fy53tvwzc5" class="mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 512 512" viewBox="0 0 512 512"><path fill="none" d="M401.7 101.9c-7.8 0-14.1 6.3-14.1 14.1s6.3 14.1 14.1 14.1 14.1-6.3 14.1-14.1S409.5 101.9 401.7 101.9zM256 153c-56.8 0-103 46.2-103 103s46.2 103 103 103 103-46.2 103-103S312.8 153 256 153z"/><path fill="none" d="M399.5,29.5h-287C64.8,29.5,26,68.3,26,116v280c0,47.7,38.8,86.5,86.5,86.5h287c47.7,0,86.5-38.8,86.5-86.5
                                    V116C486,68.3,447.2,29.5,399.5,29.5z M256,379c-67.8,0-123-55.2-123-123s55.2-123,123-123s123,55.2,123,123S323.8,379,256,379z
                                     M401.7,150.1c-18.8,0-34.1-15.3-34.1-34.1s15.3-34.1,34.1-34.1s34.1,15.3,34.1,34.1S420.5,150.1,401.7,150.1z"/><path fill="#231f20" d="M399.5,9.5h-287C53.8,9.5,6,57.3,6,116v280c0,58.7,47.8,106.5,106.5,106.5h287c58.7,0,106.5-47.8,106.5-106.5
                                    V116C506,57.3,458.2,9.5,399.5,9.5z M486,396c0,47.7-38.8,86.5-86.5,86.5h-287C64.8,482.5,26,443.7,26,396V116
                                    c0-47.7,38.8-86.5,86.5-86.5h287c47.7,0,86.5,38.8,86.5,86.5V396z"/><path fill="#231f20" d="M256 133c-67.8 0-123 55.2-123 123s55.2 123 123 123 123-55.2 123-123S323.8 133 256 133zM256 359c-56.8 0-103-46.2-103-103s46.2-103 103-103 103 46.2 103 103S312.8 359 256 359zM401.7 81.9c-18.8 0-34.1 15.3-34.1 34.1s15.3 34.1 34.1 34.1 34.1-15.3 34.1-34.1S420.5 81.9 401.7 81.9zM401.7 130.1c-7.8 0-14.1-6.3-14.1-14.1s6.3-14.1 14.1-14.1 14.1 6.3 14.1 14.1S409.5 130.1 401.7 130.1z"/></svg>
                            </a>
                            <a target="_blank" href="https://www.facebook.com/aidacaceresart">
                                <?xml version="1.0" encoding="UTF-8"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="60px" height="60px" viewBox="0 0 60 60" xml:space="preserve"><path d="M37 11.9h6.5c.4 0 .8-.3.8-.8V1c0-.4-.3-.8-.8-.8h-8.9c-4.4 0-7.7 1.1-10 3.4-2.1 2.1-3.1 4.9-3.1 8.6v7.2h-5.1c-.4 0-.8.3-.8.8V30c0 .4.3.8.8.8h5.1V59c0 .4.3.8.8.8h12c.4 0 .8-.3.8-.8V30.7h7.3c.4 0 .7-.3.7-.6 0 0 .8-4.8 1.1-9.9 0-.2-.1-.4-.2-.6-.1-.2-.3-.2-.5-.2h-8.4v-5.9c0-.6 1-1.6 1.9-1.6zm-2.6 9h8.3c-.3 3.6-.8 7-1 8.3h-7.4c-.4 0-.8.3-.8.8v28.3H23.1V30c0-.4-.3-.8-.8-.8h-5.1V21h5.1c.4 0 .8-.3.8-.8v-8-.1c0-3.2.9-5.6 2.6-7.4 2-2 5-3 8.9-3h8.2v8.7H37c-1.6 0-3.4 1.6-3.4 3.1v6.7c0 .4.4.7.8.7z"/><metadata><rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#" xmlns:dc="http://purl.org/dc/elements/1.1/"><rdf:Description about="https://iconscout.com/legal#licenses" dc:title="facebook" dc:description="facebook" dc:publisher="Iconscout" dc:date="2018-06-18" dc:format="image/svg+xml" dc:language="en"><dc:creator><rdf:Bag><rdf:li>Roundicons.com</rdf:li></rdf:Bag></dc:creator></rdf:Description></rdf:RDF></metadata></svg>
                            </a>
                        </div>
                        <div class="flex-content ">
                            <li class='nav-item active'>
                            
                                <div class="dropdown" id="cartPreview">
                                    <i class="flaticon-shopping-bag"></i>
                                    <button style="    display: none!important;" class="btn btn-default dropdown-toggle d-flex p-0 " type="button" data-toggle="dropdown" data-hover="dropdown">
                                        <span class="add_btn" id="cart-notification"></span>
                                        <a class="nav-link" href="{{ url('/cart') }}"><i class="flaticon-shopping-cart"></i></a>
                                    </button>
                                    <ul class="dropdown-menu carrito-nav">
        
                                        {{--<li v-for="product in products">
                                            <div>
                                                <img :src="'{{ env('CMS_URL') }}'+'/images/products/'+product.product_type_size.product.image" alt="">
                                            </div>
        
                                            <div>
                                                <p>@{{ product.product_type_size.product.name }}</p>
                                                <p>@{{ product.amount }} x
                                                    <span v-if="product.product_type_size.discount_percentage == 0">$@{{ parseInt(product.product_type_size.price).toString().replace(/\B(?=(\d{3})+\b)/g, ".") }}</span>
                                                    <span v-else>$@{{ parseInt(product.product_type_size.price - (product.product_type_size.price * (product.product_type_size.discount_percentage/100))).toString().replace(/\B(?=(\d{3})+\b)/g, ".") }}</span>
                                                </p>
                                            </div>
                                        </li>
                                        <li v-for="product in guestProducts">
                                            <div>
                                                <img :src="'{{ env('CMS_URL') }}'+'/images/products/'+product.product.product.image" alt="">
                                            </div>
        
                                            <div>
                                                <p>@{{ product.product.product.name }}</p>
                                                <p>@{{ product.amount }} x
                                                    <span v-if="product.product.discount_percentage == 0">$@{{ parseInt(product.product.price).toString().replace(/\B(?=(\d{3})+\b)/g, ".") }}</span>
                                                    <span v-else>$@{{ parseInt(product.product.price - (product.product.price * (product.product.discount_percentage/100))).toString().replace(/\B(?=(\d{3})+\b)/g, ".") }}</span>
                                                </p>
                                            </div>
                                        </li>--}}
                                        <div class="sub">
                                            <span>Total:$ @{{ number_format(total * exchangeRate, 2, ",", ".") }}</span>
                                            <p v-if="selectedLanguage == 'spanish'">
                                                <span>Pinturas:@{{ amount }}</span>
                                            </p>
                                            <p v-if="selectedLanguage == 'english'">
                                                <span>Items:@{{ amount }}</span>
                                            </p>        
                                            <ul>
                                                <li><a class="btn-custom sub-h" href="{{ url('/cart') }}" v-if="selectedLanguage == 'spanish'">Ver carrito</a><a class="btn-custom sub-h" href="{{ url('/cart') }}" v-if="selectedLanguage == 'english'">See cart</a></li>
                                            </ul>
                                        </div>
                                    </ul>
        
        
                                </div>
                              <!--  <a  href="{{ url('/cart') }}">
                                    <i class="flaticon-shopping-bag"></i>

                                </a>-->
                            </li>

                           
                            <li class='nav-item'>
                                <a id="openLoginModal" class='nav-link' href='#tienda' data-toggle="modal" data-target="#loginModal" v-if="authCheck == false">
                                    <i class="flaticon-user"></i>
                                </a>                
                            </li>
                            <li class='nav-item dropdown dowms' v-if="authCheck == true">
                                <a href='#' aria-expanded='false' aria-haspopup='true'
                                    class='nav-link dropdown-toggle nav-link-black d-flex' data-toggle='dropdown' @click="toggleUserMenu()">                               
                                    @{{ user.name }} 
                                </a>
                                <div aria-labelledby='dropdownMenuButton' class='dropdown-menu' id="userMenu">
                                    <div class='content-drop'>
                                        <a class='dropdown-item' href="{{ url('/profile') }}">
                                            <p v-if="selectedLanguage == 'english'">Profile</p>
                                            <p v-if="selectedLanguage == 'spanish'">Perfil</p>
                                        </a>
                                        <a class='dropdown-item' href='#' @click="logout()"> 
                                            <p v-if="selectedLanguage == 'english'">Logout</p>
                                            <p v-if="selectedLanguage == 'spanish'">Salir</p>
                                        </a>
                                    </div>
                                </div>
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
                                        <p class="m-0 title-login" v-if="selectedLanguage == 'spanish'">Registro</p>
                                        <p class="m-0 title-login" v-if="selectedLanguage == 'english'">Register</p>
                                        <form action="">
                                            <div class="form-group">                           
                                                <input placeholder="Nombre y apellido" type="text" autocomplete="off" class="form-control"
                                               aria-describedby="emailHelp" v-model="name"  v-if="selectedLanguage == 'spanish'">
                                               <input placeholder="Name and Lastname" type="text" autocomplete="off" class="form-control"
                                               aria-describedby="emailHelp" v-model="name"  v-if="selectedLanguage == 'english'">
                                                <i class="fa fa-user icon_form"></i>
                                                <small v-if="errors.hasOwnProperty('name')">@{{ errors['name'][0] }}</small>
                                              </div>
                      
                                              <div class="form-group">
                                                <input placeholder="Correo electrónico" type="email" autocomplete="off" class="form-control"
                                               aria-describedby="emailHelp" v-model="email" v-if="selectedLanguage == 'spanish'">
                                               <input placeholder="Email" type="text" autocomplete="off" class="form-control"
                                               aria-describedby="emailHelp" v-model="email"  v-if="selectedLanguage == 'english'">
                                                <i class="fa fa-envelope icon_form"></i>
                                                <small v-if="errors.hasOwnProperty('email')">@{{ errors['email'][0] }}</small>
                                              </div>
        
                                              <div class="row">
                                                  <div class="col-md-6 form-group">
                                                    <input placeholder="Cédula" type="text" class="form-control" v-model="dni" v-if="selectedLanguage == 'spanish'">
                                                    <input placeholder="DNI" type="text" class="form-control" v-model="dni" v-if="selectedLanguage == 'english'">  
                                                    <i class="fa fa-id-card icon_form"></i> 
                                                    <small v-if="errors.hasOwnProperty('dni')">@{{ errors['dni'][0] }}</small>                                    
                                                  </div>
                                                  <div class="col-md-6 form-group">
                                                    <input placeholder="Télefono" type="telephone" class="form-control" v-model="phone" v-if="selectedLanguage == 'spanish'">
                                                    <input placeholder="Phone" type="telephone" class="form-control" v-model="phone" v-if="selectedLanguage == 'english'">
                                                    <i class="fa fa-phone icon_form"></i>
                                                    <small v-if="errors.hasOwnProperty('phone')">@{{ errors['phone'][0] }}</small>
                                                </div>
                                              </div>
                                              <div class="row">
                                                <div class="col-md-4 form-group">
                                                    <select class="form-control" v-model="country">
                                                        <option value="" v-if="selectedLanguage == 'spanish'">País</option>
                                                        <option value="" v-if="selectedLanguage == 'english'">Country</option>
                                                        <option :value="country.id" v-for="country in countries">@{{ country.name }}</option>
                                                    </select>
                                                    <small v-if="errors.hasOwnProperty('country')">@{{ errors['country'][0] }}</small>
                                                </div>
                                                  <div class="col-md-8 form-group">
                                                    <input placeholder="Dirección" type="text" class="form-control" v-model="address" v-if="selectedLanguage == 'spanish'">
                                                    <input placeholder="Address" type="text" class="form-control" v-model="address" v-if="selectedLanguage == 'english'">
                                                    <i class="fa fa-globe icon_form"></i>
                                                    <small v-if="errors.hasOwnProperty('address')">@{{ errors['address'][0] }}</small>
                                                  </div>
                                              </div>
        
                                              <div class="form-group">
                                                <input placeholder="Contraseña" type="password" class="form-control"  v-model="password" v-if="selectedLanguage == 'spanish'">
                                                <input placeholder="Password" type="password" class="form-control"  v-model="password" v-if="selectedLanguage == 'english'">
                                                <i class="fa fa-lock icon_form"></i>
                                                <small v-if="errors.hasOwnProperty('password')">@{{ errors['password'][0] }}</small>
                                              </div>
                                              <div class="form-group">
                                                <input placeholder="Confirmar contraseña" type="password" class="form-control  "id="password" v-model="password_confirmation" v-if="selectedLanguage == 'spanish'">
                                                <input placeholder="Password confirmation" type="password" class="form-control  "id="password" v-model="password_confirmation" v-if="selectedLanguage == 'english'">
                                                <i class="fa fa-lock icon_form"></i>
                                              </div>
                                       
                                            <div class=" form-group mt-4 text-center">
                                                <button type="button" class="btn btn-primary btn-custom" @click="register()"><span v-if="selectedLanguage == 'spanish'">Registrarme</span><span v-if="selectedLanguage == 'english'">Sign Up</span><i class=" fa
                                                    fa-angle-right" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                            <div class=" mb-5 text-center">
                                                <p class="inicia"  v-if="selectedLanguage == 'spanish'">ó registrate fácil con</p>
                                                <p class="inicia"  v-if="selectedLanguage == 'english'">or sign up easy with</p>
                                                <a class="btn-login  mr-2" href="{{ url('facebook/redirect') }}"> <i class="fa fa-facebook"></i> Facebook</a>
                                                <a class="btn-login btn-login2"href="{{ url('google/redirect') }}"> <i class="fa fa-google"></i>
                                                    Google</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div class=" col-md-5 gray flex-center">
                                        <div class=" text-center registrar_facil">
                                            <a class="txt" href="#" data-toggle="modal" data-target="#loginModal" data-dismiss="modal"><span v-if="selectedLanguage == 'spanish'">¡Inicia sesión!</span> <span v-if="selectedLanguage == 'english'">¡Login!</span> <i class=" fa
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
                                        <p class="m-0 title-login" v-if="selectedLanguage == 'spanish'">Inicio de sesión</p>
                                        <p class="m-0 title-login" v-if="selectedLanguage == 'english'">Log In</p>
                                        <form action="">
                                            <div class="form-group">
                                                <!---  <label for="email">Correo electrónico</label>-->
                                                <input placeholder="Correo electrónico" type="email" autocomplete="off"
                                                    class="form-control" id="email" aria-describedby="emailHelp" v-model="emailLogin" v-if="selectedLanguage == 'spanish'">
                                                <input placeholder="Email" type="email" autocomplete="off" class="form-control" id="email" aria-describedby="emailHelp" v-model="emailLogin" v-if="selectedLanguage == 'english'">
                                                <i class="fa fa-envelope icon_form"></i>
                                                <small v-if="errorsLogin.hasOwnProperty('email')">@{{ errorsLogin['email'][0] }}</small>
                                            </div>
                                            <div class="form-group">
                                                <!--<label for="password">Contraseña</label>-->
        
                                                <input placeholder="Contraseña" type="password" class="form-control" v-model="passwordLogin" v-if="selectedLanguage == 'spanish'">
                                                <input placeholder="Password" type="password" class="form-control" v-model="passwordLogin" v-if="selectedLanguage == 'english'">
                                                <i class="fa fa-lock icon_form"></i>
                                                <small v-if="errorsLogin.hasOwnProperty('password')">@{{ errorsLogin['password'][0] }}</small>
                                            </div>
                                            <div class="form-group  text-lg-right">
                                                <a href="{{ route('forgot.password') }}" class="texto"><span v-if="selectedLanguage == 'spanish'">¿Has olvidado tu contraseña?</span><span v-if="selectedLanguage == 'english'">¿Have you forggoten your password?</span></a>
                                            </div>
                                            <div class=" form-group mt-4 text-center">
                                                <button type="button" @click="login()" class="btn btn-primary btn-custom"><span v-if="selectedLanguage == 'spanish'">Ingresar</span><span v-if="selectedLanguage == 'english'">Login</span> <i class=" fa
                                                    fa-angle-right" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                            <div class=" mb-5 text-center">
                                                <p class="inicia" v-if="selectedLanguage == 'spanish'">ó inicia sesión con</p>
                                                <p class="inicia" v-if="selectedLanguage == 'english'">or log in easily with</p>
                                                <a class="btn-login  mr-2" href="{{ url('facebook/redirect') }}"> <i class="fa fa-facebook"></i>  Facebook</a>
                                                <a class="btn-login btn-login2" href="{{ url('google/redirect') }}"><i class="fa fa-google"></i>
                                                    Google</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div class=" col-md-6 gray flex-center">
                                        <div class=" text-center registrar_facil">
                                            <a class="txt" href="#" data-toggle="modal" data-target="#registerModal" data-dismiss="modal"><span v-if="selectedLanguage == 'spanish'">¡Registrate facíl! </span><span v-if="selectedLanguage == 'english'">¡Sign Up! </span><i class=" fa
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



    <!-- Photoswipe 4.0 html code for javascript interface -->
    <!-- Root element of PhotoSwipe. Must have class pswp. -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <!-- Background of PhotoSwipe. 
     It's a separate element as animating opacity is faster than rgba(). -->
        <div class="pswp__bg"></div>
        <!-- Slides wrapper with overflow:hidden. -->
        <div class="pswp__scroll-wrap">
            <!-- Container that holds slides. 
        PhotoSwipe keeps only 3 of them in the DOM to save memory.
        Don't modify these 3 pswp__item elements, data is added later on. -->
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>
            <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <!--  Controls are self-explanatory. Order can be changed. -->
                    <div class="pswp__counter"></div>

                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                    <!--- <button class="pswp__button pswp__button--share" title="Share"></button>--->
                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                    <div class="eye" data-toggle="modal" data-target="#banner_expande"> <i class="flaticon-eye-variant-with-enlarged-pupil"></i>
                    </div>
                    
          <div>
            <img class="firma" alt='' src='assets/img/logo.png'>
          </div>



                    <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
                    <!-- element will get class pswp__preloader--active when preloader is running -->
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>

                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                </button>

                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                </button>

                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>

            </div>

        </div>

    </div>
        <footer>
            <div class="footer container mt-5">
                <a class="mr-5" href="" data-toggle="modal" data-target="#terminos">Términos & Condiciones </a>
                <p>All Rights Reserved @ 2020</p>
            </div>
        </footer>

     
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.0/photoswipe.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.0/photoswipe-ui-default.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        
        <script src="{{ asset('assets/js/slick.min.js') }}"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>
        <script src="{{ asset('alertify/alertify.min.js') }}"></script>
        
        <!-- Modal -->
<div class="modal fade" id="terminos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        
        <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>

                <br>
                <strong>TÉRMINOS Y CONDICIONES - POLÍTICA DE PRIVACIDAD. </strong>
                <br><br>

                La presente Política de Privacidad establece los términos en que Aida Cáceres Art y Bulgar S.A.S. usan y protegen la información que es proporcionada por sus usuarios al momento de utilizar su sitio web. Estamos comprometidos con la seguridad de los datos de sus usuarios. Cuando le pedimos llenar los campos de información personal con la cual usted pueda ser identificado, lo hacemos asegurando que sólo se empleará de acuerdo con los términos de este documento. Sin embargo esta Política de Privacidad puede cambiar con el tiempo o ser actualizada por lo que le recomendamos y enfatizamos revisar continuamente esta página para asegurarse que está de acuerdo con dichos cambios.
                <br><br>

                <strong>Información que es recogida </strong>
                <br><br>
                Nuestro sitio web podrá recoger información personal por ejemplo: Nombre, información de contacto como su dirección de correo electrónica e información demográfica. Así mismo cuando sea necesario podrá ser requerida información específica para procesar algún pedido o realizar una entrega o facturación.
                <br><br>
                <strong>Uso de la información recogida </strong>
                <br><br>
                Nuestro sitio web emplea la información con el fin de proporcionar el mejor servicio posible, particularmente para mantener un registro de usuarios, de pedidos en caso que aplique, y mejorar nuestros productos y servicios. Es posible que sean enviados correos electrónicos periódicamente a través de nuestro sitio con ofertas especiales, nuevos productos y otra información publicitaria que consideremos relevante para usted o que pueda brindarle algún beneficio, estos correos electrónicosserán enviados a la dirección que usted proporcione y podrán ser cancelados en cualquier momento. Aida Cáceres Art - Bulgar S.A.S. están altamente comprometidos para cumplir con el compromiso de mantener su información segura. Usamos los sistemas más avanzados y los actualizamos constantemente para asegurarnos que no exista ningún acceso no autorizado.
                <br><br>
                <strong>Cookies (solo si aplica)</strong> Una cookie se refiere a un fichero que es enviado con la finalidad de solicitar permiso para almacenarse en su ordenador, al aceptar dicho fichero se crea y la cookie sirve entonces para tener información respecto al tráfico web, y también facilita las futuras recurrente. Otra función que tienen las cookies es que con ellas las web pueden reconocerte individualmente y por tanto brindarte el mejor servicio personalizado de su web. Nuestro sitio web emplea las cookies para poder identificar las páginas que son visitadas y su frecuencia. Esta información es empleada únicamente para análisis estadístico y después la información se elimina de forma permanente. Usted puede eliminar las cookies en cualquier momento desde su ordenador. Sin embargo las cookies ayudan a proporcionar un mejor servicio de los sitios web, estás no dan acceso a información de su ordenador ni de usted, a menos de que usted así lo quiera y la proporcione directamente. Usted puede aceptar o negar el uso de cookies, sin embargo la mayoría de navegadores aceptan cookies automáticamente pues sirve para tener un mejor servicio web. También usted puede cambiar la configuración de su ordenador para declinar las cookies. Si se declinan es posible que no pueda utilizar algunos de nuestros servicios.
                <br><br>
                <strong>Enlaces a Terceros</strong>
                <br><br>
                Este sitio web pudiera contener en laces a otros sitios que pudieran ser de su interés. Una vez que usted de clic en estos enlaces y abandone nuestra página, ya no tenemos control sobre al sitio al que es redirigido y por lo tanto no somos responsables de los términos o privacidad ni de la protección de sus datos en esos otros sitios terceros. Dichos sitios están sujetos a sus propias políticas de privacidad por lo cual es recomendable que los consulte para confirmar que usted está de acuerdo con estas. En este caso, los terceros como DHL y PAYPAL tienen sus propias políticas y garantizan todo lo relacionado a servicios de shipping y pagos seguros.
                <br><br>
<strong>Control de su información personal</strong>
<br><br>

En cualquier momento usted puede restringir la recopilación o el uso de la información personal que es proporcionada a nuestro sitio web. Cada vez que se le solicite rellenar un formulario, como el de alta de usuario, puede marcar o desmarcar la opción de recibir información por correo electrónico. En caso de que haya marcado la opción de recibir nuestro boletín o publicidad usted puede cancelarla en cualquier momento. Para hacer efectivo estos cambios, por favor envíenos un email a aida@aidacaceresart.com No venderemos, cederemos, ni distribuiremos la información personal que es recopilada sin su consentimiento, salvo que sea requerido por un juez con un orden judicial. 

<strong>Aida Cáceres Art - Bulgar S.A.S.</strong> Se reservan el derecho de cambiar los términos y demás puntos del presente documento en cualquier momento.
<br><br>
<strong>PROMOCIONES DE OBRAS</strong>

Las promociones que se ofrezcan en nuestro sitio web NO son necesariamente las mismas que se ofrezcan en venta telefónica u otros, a menos que se señale expresamente en este sitio o en la publicidad de cada promoción. Además de los Términos y Condiciones generales, cuando Aida Cáceres Art – Bulgar S.A.S. realice promociones en vallas publicitarias, redes sociales u otros medios publicitarios, aplican adicionalmente los siguientes Términos y Condiciones específicos:
• Cuando se ofrezcan descuentos, se señalará en la publicidad, el porcentaje o valor del descuento, el canal de venta por el cual se puede obtener, así como la suma mínima de compra para adquirir ese descuento y y las fechas válidas.
• Las promociones no son acumulables
• La promoción sólo podrá ser usado una vez por cada cliente.
• Al hacer una compra durante una promoción vigente, se entiende que el consumidor ha aceptado íntegramente los Términos y Condiciones generales y específicos de Aida Cáceres Art – Bulgar S.A.S. 
<br><br>
<strong>DESPACHO DE LOS PRODUCTOS</strong>
<br><br>
Los productos adquiridos a través de nuestro sitio web serán despachados y entregados de acuerdo a las opciones elegidas por el usuario. DHL es la plataforma de envíos integrada con la cual trabajamos conjuntamente para ofrecer el mejor servicio. Sin embargo, para la recolección y entrega de los envíos se aplicarán estrictamente los términos y condiciones de servicios de las agencias de mensajería y paquetería (transportistas) que el usuario haya elegido durante el proceso de compra. De modo que Aida Cáceres Art – Bulgar S.A.S. queda exento de cualquier anomalía presentada en los servicios del transportista. La información del lugar de envío es de exclusiva responsabilidad del usuario. Los plazos elegidos para el despacho y entrega, se cuentan desde que se haya validado la orden de compra y el medio de pago utilizado, y se consideraran días hábiles para el cumplimiento de dicho plazo. El usuario antes de finalizar su compra podrá hacer seguimiento a la entrega estimada de su producto.

Aida Cáceres Art – Bulgar S.A.S. comunicará por e-mail a los usuarios los datos para que se pueda realizar el seguimiento del estado del envío por Internet. Si el usuario o la persona autorizada para recibir, se encontrara ausente cuando se le visita y se le notifica vía telefónica para dejar el pedido y nadie lo recibe en el lugar de residencia, con previo aviso de nuestra plataforma de envíos, se efectuará la entrega en la puerta del domicilio o en su caso en la agencia de paquetería más cercana al domicilio del destino con su respectiva notificación. Con el fin de facilitar el seguimiento de los pedidos realizados por los usuarios en nuestro sitio web, Aida Cáceres Art – Bulgar S.A.S. podrá enviar información vía mensajes de texto (SMS y/o MMS) o vía «WhatsApp» acerca de la entrega y estado de los pedidos realizados en el sitio web.
<br><br>
<strong>POLÍTICA DE CAMBIOS, DEVOLUCIONES Y GARANTÍA DE CUADROS.</strong>
<br><br>
Cada obra es cuidadosamente empaquetada por la artista, garantizando que cada cuadro llegue intacto a su destino. El trabajo se confía a un proveedor de servicios especializado reconocido y dé alcance internacional. Se organizará un tiempo de entrega entre usted y el operador logístico, el trabajo se entregará a la dirección indicada en el momento del pedido. Actualmente, la artista paga los costos de embalaje y entrega del trabajo. Los costos de envío solo se facturarán si el cliente solicitó expresamente que se enmarque la obra (debido a un peso adicional), o si el destino de la entrega no está cubierto por nuestro aliado de envío y el uso de un proveedor diferente, no preferencial las tasas son obligatorias. Si el trabajo llegara roto o dañado, la artista pagará los costes de devolución y gestionará cualquier compensación entre la artista y el comprador. Si el trabajo no puede ser reparado o restaurado, el cliente será reembolsado inmediatamente.

-	Los pedidos dentro y fuera de Colombia se envían mediante mensajería DHL.

-	Los tiempos de entrega varían según el destino.
<br><br>
<strong>Garantía. </strong>
<br><br>
Cada obra desarrollada por la artista es original y pieza única. Cualquiera que sea el medio, el trabajo se envía al comprador con un certificado de autenticidad.
<br><br>
<strong>Devolución. </strong>
<br><br>
En aplicación del artículo 47 de la ley 1480 de 2011, los consumidores que adquieran cualquier producto a través de nuestra página web https://aidacaceresart.com tienen derecho al retracto, dentro de los CINCO (5) días hábiles siguientes a la fecha de recibo del producto. Para ejercer el derecho de retracto, el cliente podrá solicitar en el término previamente indicado, su solicitud de devolución del dinero, mediante envío por correo electrónico a la dirección aida@aidacaceresart.com, un escrito con el asunto “DERECHO DE RETRACTO” identificando en el cuerpo del correo, sus datos, el producto adquirido, la fecha de su recepción. El dinero será reembolsado en un plazo no mayor a TREINTA (30) días calendario desde la fecha en que se presentó la solicitud. La devolución del dinero se realizará de la siguiente manera: En caso de compras realizadas con tarjeta de crédito o en caso de pagos por medio de PSE se realizará el reembolso a la misma tarjeta de crédito o débito con la que se realizó la compra. El cliente deberá devolver a Aida Cáceres Art – Bulgar S.A.S. el cuadro adquirido el cual debe estar en las mismas condiciones en que lo recibió, en perfecto estado, con su empaque completo con todos sus sellos y en estado original.








        </div>
       
      </div>
    </div>
  </div>
        <script>
            alertify.set('notifier', 'position', 'top-right');
            (function () {
    
                var initPhotoSwipeFromDOM = function (gallerySelector) {
    
                    var parseThumbnailElements = function (el) {
                        var thumbElements = el.childNodes,
                            numNodes = thumbElements.length,
                            items = [],
                            el,
                            childElements,
                            thumbnailEl,
                            size,
                            item;
    
                        for (var i = 0; i < numNodes; i++) {
                            el = thumbElements[i];
    
                            // include only element nodes 
                            if (el.nodeType !== 1) {
                                continue;
                            }
    
                            childElements = el.children;
    
                            size = el.getAttribute('data-size').split('x');
    
                            // create slide object
                            item = {
                                src: el.getAttribute('href'),
                                w: parseInt(size[0], 10),
                                h: parseInt(size[1], 10),
                                author: el.getAttribute('data-author'),
                                title: el.getAttribute('data-title')
                            };
    
                            item.el = el; // save link to element for getThumbBoundsFn
    
                            if (childElements.length > 0) {
                                item.msrc = childElements[0].getAttribute('src'); // thumbnail url
                                if (childElements.length > 1) {
                                    item.title = childElements[1]
                                        .innerHTML; // caption (contents of figure)
                                }
                            }
    
    
                            var mediumSrc = el.getAttribute('data-med');
                            if (mediumSrc) {
                                size = el.getAttribute('data-med-size').split('x');
                                // "medium-sized" image
                                item.m = {
                                    src: mediumSrc,
                                    w: parseInt(size[0], 10),
                                    h: parseInt(size[1], 10)
                                };
                            }
                            // original image
                            item.o = {
                                src: item.src,
                                w: item.w,
                                h: item.h
                            };
    
                            items.push(item);
                        }
    
                        return items;
                    };
    
                    // find nearest parent element
                    var closest = function closest(el, fn) {
                        return el && (fn(el) ? el : closest(el.parentNode, fn));
                    };
    
                    var onThumbnailsClick = function (e) {
                        e = e || window.event;
                        e.preventDefault ? e.preventDefault() : e.returnValue = false;
    
                        var eTarget = e.target || e.srcElement;
    
                        var clickedListItem = closest(eTarget, function (el) {
                            return el.tagName === 'A';
                        });
    
                        if (!clickedListItem) {
                            return;
                        }
    
                        var clickedGallery = clickedListItem.parentNode;
    
                        var childNodes = clickedListItem.parentNode.childNodes,
                            numChildNodes = childNodes.length,
                            nodeIndex = 0,
                            index;
    
                        for (var i = 0; i < numChildNodes; i++) {
                            if (childNodes[i].nodeType !== 1) {
                                continue;
                            }
    
                            if (childNodes[i] === clickedListItem) {
                                index = nodeIndex;
                                break;
                            }
                            nodeIndex++;
                        }
    
                        if (index >= 0) {
                            openPhotoSwipe(index, clickedGallery);
                        }
                        return false;
                    };
    
                    var photoswipeParseHash = function () {
                        var hash = window.location.hash.substring(1),
                            params = {};
    
                        if (hash.length < 5) { // pid=1
                            return params;
                        }
    
                        var vars = hash.split('&');
                        for (var i = 0; i < vars.length; i++) {
                            if (!vars[i]) {
                                continue;
                            }
                            var pair = vars[i].split('=');
                            if (pair.length < 2) {
                                continue;
                            }
                            params[pair[0]] = pair[1];
                        }
    
                        if (params.gid) {
                            params.gid = parseInt(params.gid, 10);
                        }
    
                        return params;
                    };
    
                    var openPhotoSwipe = function (index, galleryElement, disableAnimation, fromURL) {
                        var pswpElement = document.querySelectorAll('.pswp')[0],
                            gallery,
                            options,
                            items;
    
                        items = parseThumbnailElements(galleryElement);
    
                        // define options (if needed)
                        options = {
    
                            galleryUID: galleryElement.getAttribute('data-pswp-uid'),
    
                            getThumbBoundsFn: function (index) {
                                // See Options->getThumbBoundsFn section of docs for more info
                                var thumbnail = items[index].el.children[0],
                                    pageYScroll = window.pageYOffset || document.documentElement
                                    .scrollTop,
                                    rect = thumbnail.getBoundingClientRect();
    
                                return {
                                    x: rect.left,
                                    y: rect.top + pageYScroll,
                                    w: rect.width
                                };
                            },
    
                            addCaptionHTMLFn: function (item, captionEl, isFake) {
                                if (!item.title) {
                                    captionEl.children[0].innerText = '';
                                    return false;
                                }
                                captionEl.children[0].innerHTML = item.title +
                                    '<br/><small>Photo: ' +
                                    item.author + '</small>';
                                return true;
                            }
    
                        };
    
    
                        if (fromURL) {
                            if (options.galleryPIDs) {
                                // parse real index when custom PIDs are used 
                                // http://photoswipe.com/documentation/faq.html#custom-pid-in-url
                                for (var j = 0; j < items.length; j++) {
                                    if (items[j].pid == index) {
                                        options.index = j;
                                        break;
                                    }
                                }
                            } else {
                                options.index = parseInt(index, 10) - 1;
                            }
                        } else {
                            options.index = parseInt(index, 10);
                        }
    
                        // exit if index not found
                        if (isNaN(options.index)) {
                            return;
                        }
    
    
    
                        var radios = document.getElementsByName('gallery-style');
                        for (var i = 0, length = radios.length; i < length; i++) {
                            if (radios[i].checked) {
                                if (radios[i].id == 'radio-all-controls') {
    
                                } else if (radios[i].id == 'radio-minimal-black') {
                                    options.mainClass = 'pswp--minimal--dark';
                                    options.barsSize = {
                                        top: 0,
                                        bottom: 0
                                    };
                                    options.captionEl = false;
                                    options.fullscreenEl = false;
                                    options.shareEl = false;
                                    options.bgOpacity = 0.85;
                                    options.tapToClose = true;
                                    options.tapToToggleControls = false;
                                }
                                break;
                            }
                        }
    
                        if (disableAnimation) {
                            options.showAnimationDuration = 0;
                        }
    
                        // Pass data to PhotoSwipe and initialize it
                        gallery = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, items, options);
    
                        // see: http://photoswipe.com/documentation/responsive-images.html
                        var realViewportWidth,
                            useLargeImages = false,
                            firstResize = true,
                            imageSrcWillChange;
    
                        gallery.listen('beforeResize', function () {
    
                            var dpiRatio = window.devicePixelRatio ? window.devicePixelRatio :
                                1;
                            dpiRatio = Math.min(dpiRatio, 2.5);
                            realViewportWidth = gallery.viewportSize.x * dpiRatio;
    
    
                            if (realViewportWidth >= 1200 || (!gallery.likelyTouchDevice &&
                                    realViewportWidth > 800) || screen.width > 1200) {
                                if (!useLargeImages) {
                                    useLargeImages = true;
                                    imageSrcWillChange = true;
                                }
    
                            } else {
                                if (useLargeImages) {
                                    useLargeImages = false;
                                    imageSrcWillChange = true;
                                }
                            }
    
                            if (imageSrcWillChange && !firstResize) {
                                gallery.invalidateCurrItems();
                            }
    
                            if (firstResize) {
                                firstResize = false;
                            }
    
                            imageSrcWillChange = false;
    
                        });
    
                        gallery.listen('gettingData', function (index, item) {
                            if (useLargeImages) {
                                item.src = item.o.src;
                                item.w = item.o.w;
                                item.h = item.o.h;
                            } else {
                                item.src = item.m.src;
                                item.w = item.m.w;
                                item.h = item.m.h;
                            }
                        });
    
                        gallery.init();
                    };
    
                    // select all gallery elements
                    var galleryElements = document.querySelectorAll(gallerySelector);
                    for (var i = 0, l = galleryElements.length; i < l; i++) {
                        galleryElements[i].setAttribute('data-pswp-uid', i + 1);
                        galleryElements[i].onclick = onThumbnailsClick;
                    }
    
                    // Parse URL and open gallery if it contains #&pid=3&gid=1
                    var hashData = photoswipeParseHash();
                    if (hashData.pid && hashData.gid) {
                        openPhotoSwipe(hashData.pid, galleryElements[hashData.gid - 1], true, true);
                    }
                };
    
                initPhotoSwipeFromDOM('.demo-gallery');
    
            })();
        </script>


        <script src="{{ asset('/js/app.js') }}"></script>

        <script>
           
            const authModal = new Vue({
                el: '#authModal',
                data() {
                    return {
                        userId:"@if(isset($user_id)) {{ $user_id }} @endif",
                        name: "",
                        email: "",
                        password: "",
                        password_confirmation: "",
                        phone: "",
                        dni: "",
                        address: "",
                        countries:[],
                        country:"",
                        errors:"",
                        errorsLogin:"",
                        emailLogin: "",
                        passwordLogin: "",
                        products: [],
                        selectedLanguage:"",
                        selectedCurrency:"",
                        guesProducts: [],

                        url:"{{ url('/') }}",
                        auth:""
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
                    fetchCountries(){

                        axios.get("{{ url('/countries/fetch') }}").then(res => {

                            this.countries = res.data.countries

                        })

                    },
                    register() {

                        axios.post("{{ url('/register') }}", {
                            name: this.name,
                            email: this.email,
                            password: this.password,
                            password_confirmation: this.password_confirmation,
                            phone: this.phone,
                            dni: this.dni,
                            address: this.address,
                            country: this.country,
                            language: this.selectedLanguage
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
                                this.dni = ""
                                this.country = ""
                                this.address = ""

                                $("#registerModalClose").click();
                                $('body').removeClass('modal-open');
                                $('body').css('padding-right', '0px');
                                $('.modal-backdrop').remove();

                            } else {
                                swal({
                                    title: "Lo sentimos!",
                                    text: res.data.msg,
                                    icon: "error"
                                });
                            }

                        })
                        .catch(err => {
                            this.errors = err.response.data.errors
                        })

                    },
                    login() {

                        axios.post("{{ url('/login') }}", {
                                email: this.emailLogin,
                                password: this.passwordLogin
                            })
                            .then(res => {
                                
                                if (res.data.success == true) {

                                    //this.cartInfo()
                                    this.auth = res.data.user
                                    window.localStorage.setItem("aida_token", res.data.token)
                                    window.localStorage.setItem("aida_user", JSON.stringify(res.data.user))
                                    
                                    var cart = JSON.parse(window.localStorage.getItem("aida_cart"))
                                    if(cart){
                                        cart.forEach((data) => {

                                            axios.post("{{ url('/cart/store') }}", {formatSizeId: data.id}, {
                                                headers: {
                                                Authorization: "Bearer "+window.localStorage.getItem('aida_token')
                                                }
                                            }).then(res => {})

                                        })
                                    }
                                    

                                    this.emailLogin = ""
                                    this.passwrodLogin = ""

                                    $("#loginModalClose").click();
                                    $('body').removeClass('modal-open');
                                    $('body').css('padding-right', '0px');
                                    $('.modal-backdrop').remove();

                                    swal({
                                        title: "Excelente!",
                                        text: res.data.msg,
                                        icon: "success"
                                    }).then(res => {
                                        window.location.reload()
                                    })

                                } else {
                                    swal({
                                        title: "Lo sentimos!",
                                        text: res.data.msg,
                                        icon: "error"
                                    })
                                    //alertify.error(res.data.msg)
                                }
                            })
                            .catch(err => {
                                this.errorsLogin = err.response.data.errors
                            })


                    },
                 

                },
                mounted(){

                    this.auth = JSON.parse(window.localStorage.getItem("aida_user"))

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

        <script>

            const navbar = new Vue({
                el: '#navbarNav',
                data() {
                    return {
                        total:0,
                        user:"",
                        token:"{{ Session::get('token') }}",
                        exchangeRate:1,
                        authCheck:false,
                        productsGuest:[],
                        amount:0,
                        products:[]
                    }
                },
                methods: {

                    fetch(){
                        this.total = 0
                        axios.get("{{ url('/cart/fetch') }}",{ headers: {
                            Authorization: "Bearer "+window.localStorage.getItem('aida_token')
                        }}).then(res =>{
                            this.products = res.data.items
                            this.amount = this.products.length
                            this.products.forEach(data => {
                                this.total = this.total + data.product_format_size.price
                            })
                        })
                        .catch(err => {
                            this.errors = err.response.data.errors
                        })
                    },
                    guestFetch(){
                        this.total = 0
                        var cart = JSON.parse(window.localStorage.getItem('aida_cart'))
                        
                        if(cart){
                            axios.post("{{ url('cart/guest-fetch') }}", {item: cart},{ headers: {
                                Authorization: "Bearer "+window.localStorage.getItem('aida_token')
                            }}).then(res =>{
                            this.productsGuest = res.data.items
                            this.amount = this.productsGuest.length
                            this.productsGuest.forEach(data => {
                                this.total = this.total + data.price
                            })
                            })
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
                    logout(){
                        window.localStorage.removeItem("aida_user")
                        window.localStorage.removeItem("aida_token")
                        window.localStorage.removeItem("aida_cart")
                        this.authCheck = false
                        window.location.reload()
                    },
                    toggleUserMenu(){

                        if($("#userMenu").hasClass("show")){
                            $("#userMenu").removeClass("show")
                        }else{
                            $("#userMenu").addClass("show")
                        }

                    },
                    toggleLanguageMenu(){

                        if($("#languageMenu").hasClass("show")){
                            $("#languageMenu").removeClass("show")
                           
                        }else{
                            $("#currencyMenu").removeClass("show")
                            $("#languageMenu").addClass("show")
                        }

                    },
                    toggleCurrencyMenu(){

                        if($("#currencyMenu").hasClass("show")){
                            $("#currencyMenu").removeClass("show")
                            
                        }else{
                            $("#languageMenu").removeClass("show")
                            $("#currencyMenu").addClass("show")
                        }

                    },
                    setLanguage(language){
            
                        this.selectedLanguage = language
                        window.localStorage.setItem("aida_language", language)
                        window.location.reload()
                    },
                    setCurrency(currency){
            
                        this.selectedCurrency = currency
                        window.localStorage.setItem("aida_currency", currency)
                        window.location.reload()
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

                },
                created(){

                    if(window.localStorage.getItem("aida_user") && window.localStorage.getItem("aida_token")){
                        this.fetch()
                    }else{
                        this.guestFetch()
                    }

                    window.setInterval(() => {

                        if(window.localStorage.getItem("updateCart") == "1"){
                            if(window.localStorage.getItem("aida_user") && window.localStorage.getItem("aida_token")){
                                this.fetch()
                            }else{
                                this.guestFetch()
                            }
                            window.localStorage.removeItem("updateCart")
                        }

                    }, 1000)

                    if(!this.authCheck){

                        if(this.token != ""){

                            axios.post("{{ url('get-user') }}", {
                                token: this.token
                            }).then(res => {
                                this.user = res.data.user
                                window.localStorage.setItem("aida_user", JSON.stringify(res.data.user))
                                window.localStorage.setItem("aida_token", this.token)
                                window.location.reload()
                            })

                        }else{

                            var interval = window.setInterval(() => {
                            
                                if(window.localStorage.getItem("aida_user")){
                                    this.authCheck = true
                                    this.user = JSON.parse(window.localStorage.getItem("aida_user"))
                                    window.clearInterval(interval)
                                }

                            }, 1000)

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

        @stack("scripts")

</body>

</html>