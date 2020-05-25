<template>
    <div class="list-category-details">
        <div class="row">
            <div class="col-md-4">
                <div class="product-media light-bg">
                    <span class="hover-image light-bg">
                        <img :src="product.image" alt="" />
                    </span>
                    <img :src="product.sub_image" alt="product-img" />
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
            </div>
            <div class="col-md-8">
                <div class="product-content">
                    <div class="product-name">
                        <a href="#">{{ product.name }}</a>
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
                    <div class="product-discription">
                        <p>
                            {{product.description}}
                        </p>
                    </div>
                    <div class="add-to-cart">
                        <a class="blue-btn btn" href="#">
                            <i class="fa fa-shopping-cart white-color"></i>
                            Add to Cart</a
                        >
                    </div>
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
