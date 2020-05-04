<template>
    <div>
        <h1>{{cart.count}}</h1>
        <button @click="handler">Click here</button>
    </div>
</template>x
<script>
    import {mapGetters} from 'vuex';

    export default {
        name: 'ExampleComponent',
        data() {
            return {
            }
        },
        methods: {
            handler() {
                this.$store.dispatch('cart/increment');
            }
        },
        computed: {
            ...mapGetters([
                'cart'
            ]),
            count() {
                return this.$store.cart.count;
            }
        }
    }
</script>
