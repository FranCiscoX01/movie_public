<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- start banner Area -->
                <section class="banner-area">
                    <div class="container">
                        <div class="row fullscreen align-items-center justify-content-start">
                            <div class="col-lg-12">
                                <div class="active-banner-slider owl-carousel">
                                    <!-- single-slide -->
                                    <div class="row single-slide" v-for="rs in recommendedslider">
                                        <div class="col-lg-5 col-md-6">
                                            <div class="banner-content">
                                                <h1>{{ rs.name }}</h1>
                                                <p>{{ rs.description }}</p>
                                                <div class="add-bag d-flex align-items-center">
                                                    <a class="add-btn" :href="'film/'+ rs.id +'/information'"><span class="lnr lnr-cross"></span></a>
                                                    <span class="add-text text-uppercase">Ver más detalles</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7" style="text-align: right !important;">
                                            <div class="banner-img">
                                                <img class="img-fluid" style="height:455px !important; width:345px !important; margin-left: 200px !important" :src="'/Movies_project/movies_admin/public/uploads/films/' + rs.url">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End banner Area -->

                <!-- start features Area -->
                <section class="features-area section_gap">
                    <div class="container">
                        <div class="row features-inner">
                            <!-- single features -->
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="single-features">
                                    <div class="f-icon">
                                        <img src="img/features/f-icon1.png" alt="">
                                    </div>
                                    <h6>Entrega Gratis</h6>
                                    <p>Envío gratis en todos los pedidos</p>
                                </div>
                            </div>
                            <!-- single features -->
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="single-features">
                                    <div class="f-icon">
                                        <img src="img/features/f-icon2.png" alt="">
                                    </div>
                                    <h6>Politica de cambios</h6>
                                    <p>Cambio de pelicula por mismo precio</p>
                                </div>
                            </div>
                            <!-- single features -->
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="single-features">
                                    <div class="f-icon">
                                        <img src="img/features/f-icon3.png" alt="">
                                    </div>
                                    <h6>Soporte 24/7</h6>
                                    <p>Soporte y atención todo el día</p>
                                </div>
                            </div>
                            <!-- single features -->
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="single-features">
                                    <div class="f-icon">
                                        <img src="img/features/f-icon4.png" alt="">
                                    </div>
                                    <h6>Pagos Seguros</h6>
                                    <p>Pague con lo que mas se acomode</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- end features Area -->

                <!-- start product Area -->
                <section class="owl-carousel active-product-area section_gap">
                    <!-- single product slide -->
                    <div class="single-product-slider">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-6 text-center">
                                    <div class="section-title">
                                        <h1>Estrenos</h1>
                                        <p>Los mejores estrenos para esta pandemia estan aqui xD.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <!-- single product -->
                                <div class="col-lg-3 col-md-6" v-for="p in premier">
                                    <div class="single-product">
                                        <img class="img-fluid" style="height:365px !important; width:255px !important;" :src="'/Movies_project/movies_admin/public/uploads/films/' + p.url" alt="">
                                        <div class="product-details">
                                            <h6>{{ p.name }}</h6>
                                            <div class="price">
                                                <h6>{{ dateString(p.release_date) }}</h6>
                                                <!--<h6 class="l-through">$210.00</h6>-->
                                            </div>
                                            <div class="prd-bottom">
                                                <a :href="'film/'+ p.id +'/information'" class="social-info">
                                                    <span class="lnr lnr-move"></span>
                                                    <p class="hover-text">ver más</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single product slide -->
                    <div class="single-product-slider">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-6 text-center">
                                    <div class="section-title">
                                        <h1>Lo recomendado</h1>
                                        <p>Las mejores recomendaciones para ti.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <!-- single product -->
                                <div class="col-lg-3 col-md-6" v-for="r in recommended">
                                    <div class="single-product">
                                        <img class="img-fluid" style="height:365px !important; width:255px !important;" :src="'/Movies_project/movies_admin/public/uploads/films/' + r.url" alt="">
                                        <div class="product-details">
                                            <h6>{{ r.name }}</h6>
                                            <div class="price">
                                                <h6>{{ dateString(r.release_date) }}</h6>
                                                <!--<h6 class="l-through">$210.00</h6>-->
                                            </div>
                                            <div class="prd-bottom">
                                                <a :href="'film/'+ r.id +'/information'" class="social-info">
                                                    <span class="lnr lnr-move"></span>
                                                    <p class="hover-text">ver más</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- end product Area -->
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            premier: Array,
            recommended: Array,
            recommendedslider: Array,
        },
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {

            }
        },
        methods: {
            dateString(release_date){
                if (release_date != null) {
                    var new_date = release_date.replace('-','/')
                    var fecha = new Date(new_date);
                    var options = { year: 'numeric', month: 'long', day: 'numeric' };

                    return fecha.toLocaleDateString("es-MX", options)
                }
            },
        },
    }
</script>
