<template>
    <div class="light-bg sorter">
        <div class="col-md-6 col-sm-12 show-items">
            <span
                >Showing Items : {{ paginate.from }} to {{ paginate.to }} total
                {{ paginate.total }}</span
            >
        </div>
        <div class="col-md-6 col-sm-12 bottom-pagination text-right">
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
                                    <i class="fa fa-angle-left"></i>
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
                                <a @click="changePage(n)"> {{ n }} </a>
                            </template>
                        </li>

                        <template v-if="hasMoreLinks">
                            <li class="nxt">
                                <a @click="nextPage">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </template>
                        <template v-else>
                            <li class="nxt">
                                <i class="fa fa-angle-right"></i>
                            </li>
                        </template>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    computed: {
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
        }
    }
};
</script>

<style></style>
