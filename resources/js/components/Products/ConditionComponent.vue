<template>
    <aside class="col-md-3 col-sm-4">
        <div class="sidebar-widget light-bg default-box-shadow">
            <h4 class="widget-title green-bg"><span> CATEGORIES </span></h4>
            <div class="widget-content">
                <ul id="green-scroll">
                    <li v-for="category in categories" :key="category.id">
                        <label class="checkbox-inline"
                            ><input type="checkbox" :value="category.id" v-model="checked" />
                            <span>{{category.name}}</span> <span>({{category.products_count}})</span></label
                        >
                    </li>
                </ul>
            </div>
        </div>
    </aside>
</template>

<script>
import { getList } from "@/api/product-category.js";
export default {
    data() {
        return {
            categories: [],
            checked:[],
        };
    },
    methods: {
        async fetch() {
            const response = await getList();
            const object = response.data;
            this.categories = object.data;
        }
    },
    created() {
        this.fetch();
    },
    watch:{
        checked(newValue, oldValue){
            this.$store.dispatch('product/setCategories',newValue);
            this.$store.dispatch('product/fetchProducts');
        }
    }
};
</script>

<style></style>
