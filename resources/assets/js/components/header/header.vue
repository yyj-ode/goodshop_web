<template>
    <div id="app">
        <v-header></v-header>
        <router-view></router-view>
    </div>
</template>

<script>
    import header from './components/header/header.vue';
    export default {
      components: {
        'v-header': header
      }

    }
</script>

<style >
</style>