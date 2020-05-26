<template>
    <section id="shopping-cart" class="shopping-cart-wrap">
        <div class="theme-container container">
            <div class="light-bg default-box-shadow">
                <form class="cart-form">
                    <table class="product-table">
                        <thead>
                            <tr>
                                <th>Ảnh</th>
                                <th>Tên</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th>Tổng giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            <SingleProduct
                                v-for="product in products"
                                :key="product.row_id"
                                :product="product"
                            ></SingleProduct>
                        </tbody>
                    </table>
                    <div class="continue-shopping">
                        <div class="shp-btn">
                            <a class="blue-btn btn" href="#"
                                >Tiếp túc mua hàng<i
                                    class="fa fa-caret-right"
                                ></i
                            ></a>
                        </div>
                        <div class="cart-sub-total">
                            <span>Tổng tiền:</span>
                            <strong class="pink-color">{{ sub_total_format }}</strong>
                        </div>
                    </div>
                </form>
            </div>
            <div class="cart-collaterals space-80">
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div
                            class="light-bg default-box-shadow cart_totals_wrap"
                        >
                            <div class="cart_totals_box">
                                <table class="cart_totals">
                                    <tr>
                                        <th>Tổng giá:</th>
                                        <td>
                                            <strong>{{ sub_total_format }}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Phí ship :</th>
                                        <td>
                                            <strong>{{ shipping_cost_format }}</strong>
                                        </td>
                                    </tr>
                                    <tr class="grand-total">
                                        <th>Tổng tiền :</th>
                                        <td>
                                            <strong class="pink-color">{{
                                                total_format
                                            }}</strong>
                                        </td>
                                    </tr>
                                </table>

                                <div class="chk-out">
                                    <a href="#" class="pink-btn btn"
                                        >Thanh toán</a
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import SingleProduct from "@/components/Cart/SingleProduct";
import { getCart } from "@/api/cart.js";
export default {
    data() {
        return {};
    },
    components: {
        SingleProduct
    },
    methods: {},
    computed: {
        products() {
            return this.$store.state.cart.products;
        },
        sub_total_format() {
            return this.$store.state.cart.sub_total_format;
        },
        shipping_cost_format() {
            return this.$store.state.cart.shipping_cost_format;
        },
        total_format() {
            return this.$store.state.cart.total_format;
        }
    },
    created() {
        this.$store.dispatch("cart/fetchCart");
    }
};
</script>

<style></style>
