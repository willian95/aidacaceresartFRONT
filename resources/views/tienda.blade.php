@extends("layouts.index")

@section("content")

   <!----VIDEO----->
   <section class="">
    <div class="main_video">
        <video autoplay>
            <source src="ejemplo.webm" type="video/webm">
            <source src="ejemplo.ogg" type="video/ogg">
            <source src="assets/img/nrw6.mp4" type="video/mp4">
        </video>
    </div>
</section>
<!----VIDEO----->
<div class="categorians-name">
    <p> LATEST ART WORK!</p>
    <p>WOMEN INSPIRATION</p>
    <p>BLUES </p>
    <p> BLACK & WHITE</p>
</div>
<!----GALERIA------>
<!----GALERIA------>
<section>
    <p class="main_title-general">Gallery</p>
    <div id="galeria" class="galeria galeria--h container">
        <div class="galeria-brick galeria-brick--h">
           <a href="detalle.html">
            <div class="galeria_name">
                <p>Name</p>
            </div>
            <div class="galeria_dimension">
                <p>2 x 4
                </p>
            </div>
            <img src="http://imgfz.com/i/8nCzm5i.jpeg" class="galeria-img" alt="galeria aidaart">
          
           </a>
        </div>
        <div class="galeria-brick galeria-brick--h">
          <a href="detalle.html">
            <div class="galeria_name">
                <p>Lorem ipsum asmet</p>
            </div>
            <div class="galeria_dimension">
                <p>2 x 4
                </p>
            </div>
            <img src="http://imgfz.com/i/ywPrSJ8.jpeg" class="galeria-img" alt="galeria idaart">
         
          </a>
        </div>
        <div class="galeria-brick galeria-brick--h">
          <a href="detalle.html">
            <div class="galeria_name">
                <p>Name</p>
            </div>
            <div class="galeria_dimension">
                <p>2 x 4
                </p>
            </div>
            <img src="http://imgfz.com/i/sLGAmZN.jpeg" class="galeria-img" alt="galeria idaart">
          
          </a>
        </div>
        <div class="galeria-brick galeria-brick--h">
         <a href="detalle.html">
            <div class="galeria_name">
                <p>Name</p>
            </div>
            <div class="galeria_dimension">
                <p>2 x 4
                </p>
            </div>
            <img src="http://imgfz.com/i/LXNdayR.jpeg" class="galeria-img" alt="galeria idaart">
          
         </a>
        </div>
        <div class="galeria-brick galeria-brick--h">
         <a href="">
            <div class="galeria_name">
                <p>Name</p>
            </div>
            <div class="galeria_dimension">
                <p>2 x 4
                </p>
            </div>
            <img src="http://imgfz.com/i/vSkhKCQ.jpeg" class="galeria-img" alt="galeria idaart">
        
         </a>
        </div>
        <div class="galeria-brick galeria-brick--h">
            <div class="galeria_name">
                <p>Name</p>
            </div>
            <div class="galeria_dimension">
                <p>2 x 4
                </p>
            </div>
            <img src="http://imgfz.com/i/7Fw3pJi.jpeg" class="galeria-img" alt="galeria idaart">
         
        </div>
    </div>
</section>
<!----GALERIA------>
<!----GALERIA------>

<!----PAGO SEGURP----->
<section>
    <div class="main_pagos">
        <ul>
            <li>Pago Seguros! Via </li>
            <li class=" mr-5"><img src="assets/img/iconos/stripe.png" alt=""> <img
                    src="assets/img/iconos/enviado.svg" alt=""></li>
            <li class="w-200"> Envios Nacionales e
                Internacionales Rápidos! </li>
        </ul>
    </div>
</section>
<!----PAGO SEGURP----->


@endsection