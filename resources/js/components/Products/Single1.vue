<template>
    <div class="col-md-4 col-sm-6 clear-box">
        <div class="product-details">
            <div class="product-media light-bg">
                <span class="hover-image light-bg">
                    <img :src="product.image" alt="" />
                </span>
                <img alt="product-img" :src="product.sub_image" />
                <div class="product-new">
                    <div
                        class="blue-new-tag new-tag"
                        v-if="product.type == 'New'"
                    >
                        <a class="funky-font" href="#">New</a>
                    </div>
                    <div
                        class="gold-new-tag new-tag"
                        v-else-if="product.type == 'Hot'"
                    >
                        <a class="funky-font" href="#">Hot</a>
                    </div>
                </div>
            </div>
            <div class="product-content">
                <div class="product-name">
                    <p>
                        <a :href="product.link">{{ product.name }}</a>
                    </p>
                </div>
                <div class="product-price">
                    <template v-if="product.promotion_price">
                        <h4 class="pink-btn-small price-line">
                            {{ product.price_format }}
                        </h4>
                        <h4 class="blue-btn-small">
                            {{ product.promotion_price_format }}
                        </h4>
                    </template>
                    <template v-else>
                        <h4 class="pink-btn-small ">
                            {{ product.price_format }}
                        </h4>
                    </template>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        product: Object
    }
};
</script>

<style></style>
