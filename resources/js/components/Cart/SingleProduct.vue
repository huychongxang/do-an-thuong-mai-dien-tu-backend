<template>
    <tr>
        <td class="image">
            <div class="white-bg cart-img">
                <a class="media-link" href="#"
                    ><img :src="product.image" alt=""
                /></a>
            </div>
        </td>
        <td class="description">
            <a href="#">{{ product.name }}</a>
            <p v-for="(value, name) in product.options" :key="name">
                {{ value }}
            </p>
            <a href="#" class="remove pink-color"
                ><i class="fa fa-times"></i> Remove
            </a>
        </td>
        <td class="quantity">
            <div class="quantity buttons-add-minus">
                <input type="button" class="minus" value="-" @click="minus" />
                <input
                    type="text"
                    class="input-text qty text"
                    title="Qty"
                    :value="product.qty"
                    name="cart"
                />
                <input type="button" class="plus" value="+" @click="plus" />
            </div>
        </td>
        <td class="total">
            <strong> {{ product.price_format }} </strong>
        </td>
        <td class="total">
            <strong> {{ product.sub_total_format }} </strong>
        </td>
    </tr>
</template>

<script>
import { updateQty } from "@/api/cart.js";
export default {
    props: {
        product: Object
    },
    methods: {
        async minus() {
            this.product.qty -= 1;
            updateQty(this.product.row_id, this.product.qty);
            this.$store.dispatch("cart/fetchCart");
        },
        plus() {
            this.product.qty += 1;
            updateQty(this.product.row_id, this.product.qty);
            this.$store.dispatch("cart/fetchCart");
        }
    }
};
</script>

<style scoped>
.image {
    max-width: 100px;
}
</style>
