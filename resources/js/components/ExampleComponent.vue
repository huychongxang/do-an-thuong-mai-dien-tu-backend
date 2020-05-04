<template>
    <div>
        <h1>{{this.$store.state.cart.count}}</h1>
        <button @click="handler">Click here</button>
    </div>
</template>x
<script>
export default {
    name:'ExampleComponent',
    data() {
        return {
            number:0
        }
    },
    methods:{
        handler(){
            // this.$store.commit('cart/INCREMENT');
        }
    },
    computed:{
        count(){
            return this.$store.cart.count;
        }
    }
}
</script>
