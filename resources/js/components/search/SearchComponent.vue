<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Start Banner Area -->
                <section class="banner-area organic-breadcrumb">
                    <div class="container">
                        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                            <div class="col-first">
                                <h1>Buscador</h1>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End Banner Area -->
            </div>
        </div>
        <!-- Start Resultado Area -->
        <div class="container" style="margin-top:20px !important">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-5">
                    <div class="sidebar-categories">
                        <div class="head">Categorias</div>
                        <ul class="main-categories">
                            <li class="main-nav-list" v-for="c in categories"><a :href="'/Movies_project/movies_public/public/search/category/'+c.id">{{ c.name }}<span class="number">({{ c.count }})</span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-7 text-center" v-if="loading">
                    <a-spin tip="Cargando Datos...">
                        <a-icon slot="indicator" type="loading" style="font-size: 48px" spin />
                    </a-spin>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-7" v-if="!loading">
                    <!-- Start Filter Bar -->
                    <div class="filter-bar d-flex flex-wrap align-items-center">
                        <div style="margin-top:10px; margin-bottom:5px" class="text-right">
                            <h3>Resultados obtenidos: {{ data.length }}</h3>
                        </div>
                    </div>
                    <!-- End Filter Bar -->
                    <!-- Start Best Seller -->
                    <section class="lattest-product-area pb-40 category-list">
                        <div class="row" v-if="data.length>0">
                            <!-- single product -->
                            <div class="col-lg-4 col-md-6" v-for="d in data">
                                <div class="single-product">
                                    <img class="img-fluid" style="height:365px !important; width:255px !important;" :src="'/Movies_project/movies_admin/public/uploads/films/' + d.url" alt="">
                                    <div class="product-details">
                                        <h6>{{ d.name }}</h6>
                                        <div class="price">
                                            <h6>{{ dateString(d.release_date) }}</h6>
                                        </div>
                                        <div class="prd-bottom">
                                            <a :href="'/Movies_project/movies_public/public/film/'+ d.id +'/information'" class="social-info">
                                                <span class="lnr lnr-move"></span>
                                                <p class="hover-text">ver más</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" v-if="data.length==0" style="margin:20px">
                            <div class="col-12">
                                <a-empty
                                    image="https://gw.alipayobjects.com/mdn/miniapp_social/afts/img/A*pevERLJC9v0AAAAAAAAAAABjAQAAAQ/original"
                                    :imageStyle="{
                                    height: '180px',
                                    }"
                                >
                                    <span slot="description">No se encontraron resultados</span>
                                </a-empty>
                            </div>
                        </div>
                    </section>
                    <!-- End Best Seller -->
                    <!-- Start Filter Bar -->
                    <div class="filter-bar d-flex flex-wrap align-items-center">
                        <div style="margin-top:10px; margin-bottom:10px" class="text-right">
                            <a-pagination v-model="current" :total="total" @change="onChangePage" :pageSize="pageSize" />
                        </div>
                    </div>
                    <!-- End Filter Bar -->
                </div>
            </div>
        </div>
        <!-- End Resultado Area -->
    </div>
</template>

<script>
    export default {
        props: {
            search: String,
            categories: Array,
        },
        mounted() {
            this.getDataSeach();
            console.log(this.search)
        },
        data() {
            return {
                loading:false,
                data:[],
                current:1,
                total:0,
                pageSize:0,
            }
        },
        methods: {
            getDataSeach(){
                this.loading = true;
                let me = this;
                axios.get('/Movies_project/movies_public/public/search/get-data?string='+me.search+'&page='+me.current)
                .then((response) => {
                    me.data = response.data['data']
                    me.total = response.data['total']
                    me.pageSize = response.data['per_page']
                    me.loading = false;
                    console.log(response)
                });
            },
            dateString(release_date){
                if (release_date != null) {
                    var new_date = release_date.replace('-','/')
                    var fecha = new Date(new_date);
                    var options = { year: 'numeric', month: 'long', day: 'numeric' };

                    return fecha.toLocaleDateString("es-MX", options)
                }
            },
            onChangePage(current) {
                this.current = current;
                this.getDataSeach();
            },
        },
    }
</script>
