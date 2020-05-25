<template>
    <article  class="container theme-container">
                <section class="product-category">
                    <div class="row">
                        <!-- Sidebar Start -->
                        <Condition ></Condition>
                        <!-- / Sidebar Ends -->
                        <ListProduct ></ListProduct>
                    </div>
                </section>
            </article>
</template>

<script>
import Condition from '@/components/Products/ConditionComponent';
import ListProduct from '@/components/Products/List';
import {getList} from '@/api/product.js';
    export default {
        name: "ProductsComponent",
        components:{
            Condition,
            ListProduct
        },
        data(){
            return {

            }
        },
        methods:{
            async fetch(){
                const response = await getList();
                const object = response.data;
                this.$store.dispatch('product/setProducts',object.data);
                this.$store.dispatch('product/setPaginate',object.meta);
                this.$store.dispatch('product/setLinks',object.links);
            }
        },
        created(){
            this.fetch();
        }
    }
</script>

<style scoped>

</style>
