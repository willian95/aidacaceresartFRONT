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
    
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/Flaticon.woff') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/detalle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
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
                                    USD
                                </a>
                                <div aria-labelledby='dropdownMenuButton' class='dropdown-menu' id="currencyMenu">
                                    <div class='content-drop'>
                                        <a class='dropdown-item' href='#'>
                                            <p> HKD</p>
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
                                <a class='nav-link nav-link-black ' href='galeria.html'><span v-if="selectedLanguage == 'english'">Gallery</span> <span v-if="selectedLanguage == 'spanish'">Gallería</span></a>
                            </li>
                            <li class='nav-item'>
                                <a class='brand' href='#'>
                                    <img alt='' src='{{ asset('assets/img/logo.png') }}'>
                                </a>
                            </li>

                            <li class='nav-item ml-5'>
                                <a class='nav-link ' href="aboutme.html"> <span v-if="selectedLanguage == 'english'">About me</span> <span v-if="selectedLanguage == 'spanish'">Acerca de mí</span></a>
                            </li>
                        </div>
                        <div class="flex-content ">
                            <li class='nav-item active'>
                                <a  href="{{ url('/cart') }}">
                                    <i class="flaticon-shopping-bag"></i>

                                </a>
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
                                        <a class='dropdown-item' href='#'>
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
                                                  <div class="col-md-12 form-group">
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
        <script>
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
                        errors:"",
                        errorsLogin:"",
                        emailLogin: "",
                        passwordLogin: "",
                        products: [],
                        selectedLanguage:"",
                        guesProducts: [],  
                        selectedLanguage:"",            
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
                    register() {

                        axios.post("{{ url('/register') }}", {
                            name: this.name,
                            email: this.email,
                            password: this.password,
                            password_confirmation: this.password_confirmation,
                            phone: this.phone,
                            dni: this.dni,
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
                                this.dni = ""
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
                    

                }
              

            })

          
        </script>

        <script>

            const navbar = new Vue({
                el: '#navbarNav',
                data() {
                    return {
                        user:"",
                        authCheck:false,
                    }
                },
                methods: {

                    logout(){
                        window.localStorage.removeItem("aida_user")
                        window.localStorage.removeItem("aida_token")
                        window.localStorage.removeItem("aida_cart")
                        this.authCheck = false
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
                            $("#languageMenu").addClass("show")
                        }

                    },
                    toggleCurrencyMenu(){

                        if($("#currencyMenu").hasClass("show")){
                            $("#currencyMenu").removeClass("show")
                        }else{
                            $("#currencyMenu").addClass("show")
                        }

                    },
                    setLanguage(language){
            
                        this.selectedLanguage = language
                        window.localStorage.setItem("aida_language", language)
                        window.location.reload()
                    }

                },
                created(){

                    if(!this.authCheck){

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

                }
            })
            
        </script>

        @stack("scripts")

</body>

</html>