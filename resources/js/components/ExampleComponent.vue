<template>
    <div>
        <h1>{{number}} | {{this.$store.state.count}}</h1>
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
            this.$store.commit('increment');
        }
    }
}
</script>
