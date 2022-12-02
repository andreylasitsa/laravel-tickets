<template>

</template>

<script>
import axios from "axios";

export default {
    name: "ListComponent",
    data() {
        return {
            tickets: []
        }
    },
    methods: {
        getData() {
            axios.get('/get').then(response => {
                this.tickets = response.data;
            })
            .catch(error => {});
        }
    }
}
</script>

<style scoped>

</style>
