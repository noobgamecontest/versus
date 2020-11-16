<template>
    <div>
        <a href="ladders/create">create your ladder</a>
        <div :key="ladder.id" v-for="ladder in this.ladders" class="max-w-sm overflow-hidden mx-auto">
            <ladder-component></ladder-component>
            <button v-on:click="deleteLadder(ladder)" class="text-white bg-red-500">delete this ladder !</button>
            <a :href="'ladders/' + ladder.id + '/edit'" class="bg-red-500 text-white">edit</a>
            <div v-on:click="showRanking(ladder)"  class="px-6 py-4 hover:shadow-lg bg-blue-500 border-b-2 border-t border-l border-r border-black mb-4">
                <img class="w-full" :src="ladder.image_url" alt="">
                <div class="font-bold text-xl mb-2">
                    {{ ladder.name }}
                </div>
                <p class="text-white text-base text-shadow dots">
                    {{ ladder.description }}
                </p>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data(){
            return {
                ladders: Array,
            }
        },
        mounted() {
            this.getLadders();
        },
        methods: {
            getLadders() {
                axios.get('ajax/ladders')
                    .then(response => {
                        this.ladders = Object.values(response.data.flat());
                    });
            },
            showRanking(ladder){
                window.location.href = 'ladders/' + ladder.id + '/ranking';
            },
            deleteLadder(ladder){
                axios.post('/ajax/ladders/' + ladder.id, {
                    _method: 'delete'
                })
                window.location.href = '/';
            },
        }
    }
</script>
