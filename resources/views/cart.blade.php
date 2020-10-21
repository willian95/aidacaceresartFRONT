@extends("layouts.index")

@section("content")


<section class="container mt-5">
    <div class="row">
        <div class="col-sm-12 ">
            <div class="carrito">
                <div class="title__general text-justify">
                    <h2 class="title-bold">Your cart</h2>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <table class="items-content">
                            <div class="titulo-table">
                                <p>Items</p>
                            </div>

                            <!-------producto-------->
                            <div class="main-producto">
                                <div class="producto-item">
                                    <div class="row">
                                        <div class="col-md-6 item_product">
                                            <div class="item_img">
                                                <img src="http://imgfz.com/i/S3XdEeA.jpeg" alt="">
                                            </div>
                                            <div class="item_texto">
                                                <p  class="title-bold">lorem opsum asmet</p>
                                                <span>130cm x 130cm</span>
                                                <span>Formato: Canvas</span>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <p class="space"><span>$ 79.000</span> </p>
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="producto-item">
                                    <div class="row">
                                        <div class="col-md-6 item_product">
                                            <div class="item_img">
                                                <img src="http://imgfz.com/i/ywPrSJ8.jpeg" alt="">
                                            </div>
                                            <div class="item_texto">
                                                <p  class="title-bold">lorem opsum asmet</p>
                                                <span>130cm x 130cm</span>
                                                <span>Formato: Canvas</span>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <p class="space"><span>$ 79.000</span> </p>
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="producto-item">
                                    <div class="row">
                                        <div class="col-md-6 item_product">
                                            <div class="item_img">
                                                <img src="http://imgfz.com/i/S3XdEeA.jpeg" alt="">
                                            </div>
                                            <div class="item_texto">
                                                <p  class="title-bold">lorem opsum asmet</p>
                                                <span>130cm x 130cm</span>
                                                <span>Formato: Canvas</span>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <p class="space"><span>$ 79.000</span> </p>
                                        </div>
                                    </div>
                                   
                                </div>

                            </div>
                            <div class="text-center mt-3">
                                <a href=""><button class="btn-custom btn-custom2">Continue <i class="fa fa-angle-right" aria-hidden="true"></i></button></a>
                            </div>




                            <div class="titulo-table mt-5">
                                <p>      Shipping & Billing</p>
                            </div>
                      


                        </table>

                    </div>
                    <div class="col-md-4">
                        <div class="pedido pt-0">

                            <p class="title-bold" style="    font-size: 21px;">Order sumary</p>

                            <p class="space_total">Total: <span>$ 79.000</span> </p>
                            <p class="space_total">Subtotal: <span>$ 79.000</span> </p>

                            <!---<div class="text-center">
                                <a href=""><button class="btn-custom">Finalizar compra ></button></a>
                            </div>-->

                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>
</section>


@endsection