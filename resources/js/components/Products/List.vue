<template>
    <aside class="col-md-9 col-sm-8">
        <!-- Product Category Start -->
        <section id="product-category" class="space-bottom-45">
            <div class="light-bg margin-30 sorter">
                <div class="col-md-6 col-sm-12">
                    <div class="row">
                        <div class="view-as col-md-5 col-sm-4">
                            <span>View as:</span>
                            <div class="inline-block">
                                <ul class="nav-tabs tabination">
                                    <li>
                                        <a
                                            data-toggle="tab"
                                            href="#grid-view"
                                            aria-expanded="true"
                                        >
                                            <i class="fa fa-th-large"></i>
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a
                                            data-toggle="tab"
                                            href="#list-view"
                                            aria-expanded="false"
                                        >
                                            <i class="fa fa-th-list"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="sort-by col-md-7 col-sm-8 no-padding">
                            <span>Sort By:</span>
                            <div class="inline-block">
                                <form class="filter-form">
                                    <div
                                        class="form-group selectpicker-wrapper"
                                    >
                                        <select
                                            class="selectpicker input-price"
                                            data-live-search="true"
                                            data-width="100%"
                                            data-toggle="tooltip"
                                            title="Best Sellers"
                                        >
                                            <option>Most Popular</option>
                                            <option>Latest Items</option>
                                            <option>Best Sellers</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="row">
                        <div
                            class="show-as col-md-4 col-sm-4 no-padding text-right"
                        >
                            <span>Show:</span>
                            <div class="inline-block">
                                <form class="filter-form">
                                    <div
                                        class="form-group selectpicker-wrapper"
                                    >
                                        <select
                                            class="selectpicker input-price"
                                            data-live-search="true"
                                            data-width="100%"
                                            data-toggle="tooltip"
                                            title="16"
                                        >
                                            <option>20</option>
                                            <option>24</option>
                                            <option>All</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="page-by col-md-8 col-sm-8 text-right">
                            <span>Page:</span>
                            <div class="inline-block">
                                <div class="pagination-wrapper">
                                    <ul class="pagination-list">
                                        <li><a href="#"> 1 </a></li>
                                        <li><a href="#"> 2 </a></li>
                                        <li class="active">3</li>
                                        <li><a href="#"> 4 </a></li>
                                        <li><a href="#"> 5 </a></li>
                                        <li class="nxt">
                                            <a href="#">
                                                <i
                                                    class="fa fa-angle-right"
                                                ></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div id="grid-view" class="tab-pane fade" role="tabpanel">
                    <div class="row">
                        <Single1 v-for="product in products" :key="product.id" :product="product"></Single1>
                    </div>
                </div>
                <div
                    id="list-view"
                    class="tab-pane fade  active in"
                    role="tabpanel"
                >
                    <Single2 v-for="product in products" :key="product.id" :product="product"></Single2>
                </div>
            </div>
            <div class="light-bg sorter">
                <div class="col-md-6 col-sm-12 show-items">
                    <span>Showing Items : 12 to 24 total 152</span>
                </div>
                <div class="col-md-6 col-sm-12 bottom-pagination text-right">
                    <div class="inline-block">
                        <div class="pagination-wrapper">
                            <ul class="pagination-list">
                                <li class="prev">
                                    <a href="#">
                                        <i class="fa fa-angle-left"></i>
                                    </a>
                                </li>
                                <li><a href="#"> 1 </a></li>
                                <li><a href="#"> 2 </a></li>
                                <li class="active">3</li>
                                <li><a href="#"> 4 </a></li>
                                <li><a href="#"> 5 </a></li>
                                <li class="nxt">
                                    <a href="#">
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- / Product Category Ends -->
    </aside>
</template>

<script>
import Single1 from '@/components/Products/Single1';
import Single2 from '@/components/Products/Single2';
export default {
    props: {
        products: Array
    },
    components:{
        Single1,
        Single2,
    }
};
</script>

<style></style>
