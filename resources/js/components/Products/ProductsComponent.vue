<template>
    <article  class="container theme-container">
                <section class="product-category">
                    <div class="row">
                        <!-- Sidebar Start -->
                        <Condition ></Condition>
                        <!-- / Sidebar Ends -->
                        <ListProduct></ListProduct>
                    </div>
                </section>
            </article>
</template>

<script>
import Condition from '@/components/Products/ConditionComponent';
import ListProduct from '@/components/Products/List';
    export default {
        name: "ProductsComponent",
        components:{
            Condition,
            ListProduct
        }
    }
</script>

<style scoped>

</style>
