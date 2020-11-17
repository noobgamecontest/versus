<template>
    <div>
        <div :key="ladder.id" v-for="ladder in this.ladders" class="space-y-6 max-w-sm overflow-hidden mx-auto">
            <a :href="'ladders/' + ladder.id + '/edit'" class="bg-red-500 text-white">edit</a>
            <button v-on:click="deleteLadder(ladder)" class="text-white bg-red-500">delete this ladder !</button>
            <div v-on:click="showRanking(ladder)"  class="hover:shadow-lg bg-blue-500 border-b-2 border-t border-l border-r border-black">
                <img class="w-full" :src="ladder.image_url" alt="">
                <div class="px-8 py-4 space-y-2 ">
                    <h2 class="font-bold text-xl">
                        {{ ladder.name }}
                    </h2>
                    <p class="text-white text-shadow dots">
                        {{ ladder.description }}
                    </p>
                </div>
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
