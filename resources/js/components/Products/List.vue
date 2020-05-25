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
                                            @change="selectedLimit($event)"
                                            v-model="currentLimit"
                                        >
                                            <option value="1">1</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
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
                                        <template v-if="isFirstPage">
                                            <li class="prev">
                                                <i class="fa fa-angle-left"></i>
                                            </li>
                                        </template>
                                        <template v-else>
                                            <li class="prev">
                                                <a @click="previousPage">
                                                    <i
                                                        class="fa fa-angle-left"
                                                    ></i>
                                                </a>
                                            </li>
                                        </template>

                                        <li
                                            v-for="n in lastPage"
                                            :key="n"
                                            :class="{ active: isCurrent(n) }"
                                        >
                                            <template v-if="isCurrent(n)">
                                                {{ n }}
                                            </template>

                                            <template v-else>
                                                <a @click="changePage(n)">
                                                    {{ n }}
                                                </a>
                                            </template>
                                        </li>

                                        <template v-if="hasMoreLinks">
                                            <li class="nxt">
                                                <a @click="nextPage">
                                                    <i
                                                        class="fa fa-angle-right"
                                                    ></i>
                                                </a>
                                            </li>
                                        </template>
                                        <template v-else>
                                            <li class="nxt">
                                                <i
                                                    class="fa fa-angle-right"
                                                ></i>
                                            </li>
                                        </template>
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
                        <Single1
                            v-for="product in products"
                            :key="product.id"
                            :product="product"
                        ></Single1>
                    </div>
                </div>
                <div
                    id="list-view"
                    class="tab-pane fade  active in"
                    role="tabpanel"
                >
                    <Single2
                        v-for="product in products"
                        :key="product.id"
                        :product="product"
                    ></Single2>
                </div>
            </div>
            <FooterPaginate></FooterPaginate>
        </section>
        <!-- / Product Category Ends -->
    </aside>
</template>

<script>
import Single1 from "@/components/Products/Single1";
import Single2 from "@/components/Products/Single2";
import FooterPaginate from "@/components/Products/Paginate/FooterPaginate";
export default {
    components: {
        Single1,
        Single2,
        FooterPaginate
    },
    computed: {
        products() {
            return this.$store.state.product.products;
        },
        paginate() {
            return this.$store.state.product.paginate;
        },
        isFirstPage() {
            return this.$store.state.product.paginate.current_page === 1;
        },
        hasMoreLinks() {
            return this.$store.state.product.links.next != null;
        },
        lastPage() {
            return this.$store.state.product.paginate.last_page;
        },
        currentLimit() {
            return this.$store.state.product.limit;
        }
    },
    methods: {
        previousPage() {
            const page = this.$store.state.product.paginate.current_page - 1;
            this.$store.dispatch("product/fetchProducts", page);
        },
        nextPage() {
            const page = this.$store.state.product.paginate.current_page + 1;
            this.$store.dispatch("product/fetchProducts", page);
        },
        isCurrent(number) {
            return number === this.$store.state.product.paginate.current_page;
        },
        changePage(page) {
            this.$store.dispatch("product/fetchProducts", page);
        },
        selectedLimit(event) {
            const limit = event.target.value;
            this.$store.dispatch("product/setLimit", limit);
            this.$store.dispatch("product/fetchProducts");
        }
    }
};
</script>

<style></style>
