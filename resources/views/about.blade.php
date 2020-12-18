@extends("layouts.index")

@section("content")
@include('partials.loader')

<div id="about-dev">

    <section class="container" v-if="selectedLanguage == 'spanish'">
        <p class="main_title-general">¿Quién es Aida?</p>

        <div class="row">
            <div class="col-md-6">
                <img src="assets/img/about.jpg" class="galeria-img" alt="galeria aidaart">
            </div>
            <div class="col-md-6">
                <p>Soy Aida Marina Caceres, nací en el sur de Colombia en el año 1957, crecí observando a mi madre pintar y gracias a ella desarrolle una gran admiración por la pintura clásica y otras formas de arte.</p>

                <p>Quede huérfana de niña, pero herede la gran pasión de mi madre, la pintura y hasta hoy es y sera por siempre mi gran conexión a ella.</p>

                <p>Mi Desarrollo artístico ha sido autodidacta, en mis 20’s decidí que el arte sería mi camino y viaje a Europa a visitar museos y a aprender historia del arte, desde entonces me he dedicado a pintar y a aprender. Gracias ha este recorrido he desarrollado técnicas propias y he ido encontrado mi propia identidad como artista.</p>

                <p>Estoy convencida que el arte no debe tener límites y debe estar en continua evolución, en mi opinión la mejor obra de arte es el ser humano y su capacidad de crear y relacionarse con el entorno.</p>

                <p>Para crear prefiero estar rodeada de naturaleza, he creado la mayoría de mis obras en el campo, cada creación despliega un proceso de entrega que busca plasmar experiencias y emociones, propias o ajenas.</p>

                <p>En este espacio quiero compartir con ustedes mi trabajo, una visión del mundo propia a través de mi imaginación y mi alma.</p>

                <p>Gracias por visitar mi galería.</p>
            </div>
        </div>
    </section>

    <section class="container" v-else>
        <p class="main_title-general">Who is Aida?</p>

        <div class="row">
            <div class="col-md-6">
                <img src="assets/img/about.jpg" class="galeria-img" alt="galeria aidaart">
            </div>
            <div class="col-md-6">
                <p>I am Aida Marina Caceres and I was born in Southern Colombia in 1957. I grew up observing my mother painting, she instilled in me a great admiration for classic paintings as well as other forms of art.</p>

                <p>I became orphaned at a young age, but I held on to the great passion of my mother, painting. This is and will always be my greatest connection to her.</p>

                <p>My artistic development has been self-taught and while in my 20’s I decided that art would be my path and I traveled to Europe. I visited museums to learn art history, since then I have dedicated my life to painting and learning. This path I chose to take and at times was rough, has helped me develop my own technique and find my identity as an artist.</p>

                <p>I am convinced that Art should be limitless and continuously evolving. In my opinion the best form of art is the human being and his capacity to create and connect with his environment.</p>

                <p>When creating I prefer to be surrounded by nature and have completed the vast majority of my work in the countryside. With every piece a process of a selfless search into experiences and emotions, my own or others, was born.</p>

                <p>Now I would like to share with you my work, my unique vision of the world through my imagination and soul.</p>

                <p>Thank you for visiting my gallery.</p>
            </div>
        </div>
    </section>
</div>
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

    <section>
        <p class="main_title-general"></p>

        <div class="timeline-container" id="timeline-1">
            <div class="timeline-header">
                <h2 class="timeline-header__title">More about Aida - Collaborations</h2>

            </div>
            <div class="timeline">
                <div class="timeline-item" data-text="01/10/2020">
                    <div class="timeline__content"><img class="timeline__img" src="http://imgfz.com/i/sLGAmZN.jpeg" />
                        <h2 class="timeline__content-title">Title event</h2>
                        <p class="timeline__content-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                            do eiusmod tempor incididunt ut labore et dolore magna aliqua..</p>
                    </div>
                </div>
                <div class="timeline-item" data-text="01/10/2020">
                    <div class="timeline__content"><img class="timeline__img" src="http://imgfz.com/i/ywPrSJ8.jpeg" />
                        <h2 class="timeline__content-title">Title event</h2>
                        <p class="timeline__content-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                            do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet,
                            consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                            aliqua..</p>
                    </div>
                </div>
                <div class="timeline-item" data-text="01/10/2020">
                    <div class="timeline__content"><img class="timeline__img" src="http://imgfz.com/i/LXNdayR.jpeg" />
                        <h2 class="timeline__content-title">Title event</h2>
                        <p class="timeline__content-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                            do eiusmod tempor incididunt ut labore et dolore magna aliqua..</p>
                    </div>
                </div>
                <div class="timeline-item" data-text="01/10/2020">
                    <div class="timeline__content"><img class="timeline__img" src="http://imgfz.com/i/vSkhKCQ.jpeg" />
                        <h2 class="timeline__content-title">Title event</h2>
                        <p class="timeline__content-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                            do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
                <div class="timeline-item" data-text="01/10/2020">
                    <div class="timeline__content"><img class="timeline__img" src="http://imgfz.com/i/7Fw3pJi.jpeg" />
                        <h2 class="timeline__content-title">Title event</h2>
                        <p class="timeline__content-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                            do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet,
                            consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                            aliqua.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

</div>

@endsection

@push('scripts')

    <script>
        
        const home = new Vue({
            el: '#about-dev',
            data() {
                return {
                    selectedLanguage:"",
                    selectedCurrency:"",
                }
            },
            methods: {

                

            },
            mounted(){

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


                if(this.selectedCurrency == "COP"){
                    $(".show-usd").css("display", "none")
                    $(".show-cop").css("display", "block")
                }else{
                    $(".show-usd").css("display", "block")
                    $(".show-cop").css("display", "none")
                }

                if(this.selectedLanguage == "spanish"){
                    $(".show-spanish").css("display", "block")
                    $(".show-english").css("display", "none")
                }else{
                    $(".show-spanish").css("display", "none")
                    $(".show-english").css("display", "block")
                }

            }
            

        })

         
    </script>


@endpush