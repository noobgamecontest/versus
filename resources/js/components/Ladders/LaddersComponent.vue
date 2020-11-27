<template>
    <div class="lg:py-10 py-8 lg:space-y-2 space-y-6">
        <div class="block md:flex items-center justify-end">
            <div class="block md:flex space-y-4 md:space-y-0">
                <div class="relative flex items-center rounded-full justify-end mr-2">
                    <i class="absolute right-0 text-xl mr-4 text-gray-900 fas fa-search"></i>
                    <input type="text" v-model="search" class="box text-gray-900 relative rounded-full pl-5 border-3 border-gray-900 bg-transparent focus:outline-none">
                </div>
                <div class="flex">
                    <button class="btn-skew lg:w-auto px-9 py-1 text-xs lg:text-lg xl:text-xl bg-yellow-star focus:outline-none border-3">Sports</button>
                    <button class="btn-skew lg:w-auto px-9 py-1 text-xs lg:text-lg xl:text-xl bg-red-500 focus:outline-none border-b-3 border-t-3 border-r-3 ">Plateaux</button>
                    <button class="btn-skew lg:w-auto px-9 py-1 text-xs lg:text-lg xl:text-xl bg-green-500 focus:outline-none border-b-3 border-t-3 border-r-3">Vidéos</button>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-y-12 gap-x-4">
            <div :key="ladder.id" v-for="ladder in getFilteredLadders" class="relative hover:-translate-y-4 duration-500 transform">
                <div class="space-x-1" v-if="userRoleData === 'admin'">
                    <a :href="'ladders/' + ladder.id + '/edit'" class="focus:outline-none text-gray-700 hover:text-red-500 font-semibold tracking-wide text-xs"><i class="fas fa-pen"></i>Modifier</a>
                    <button v-on:click="deleteLadder(laddenr)" class="focus:outline-none text-gray-700 hover:text-red-500 font-semibold tracking-wide text-xs"><i class="fas fa-trash"></i>Supprimer</button>
                </div>
                <div v-on:click="showRanking(ladder)"  class="cursor-pointer shadow-card border-4 border-b-8 border-black bg-white">
                    <div>
                        <img class="img-card" :src="ladder.image_url" alt="">
                    </div>
                    <div class="py-3 px-8 space-y-2 border-t-8 border-red-500">
                        <div class="flex justify-between items-center">
                            <span class="font-secondary uppercase text-red-500">Sport</span>
                            <div class="flex space-x-2 items-center">
                                <span><i class="text-green-500 fas fa-check"></i></span>
                                <span class="text-gray-700 text-xs xl:text-sm">6 <i class="mr-1 fas fa-users"></i></span>
                            </div>
                        </div>
                        <h2 class="font-secondary uppercase text-4xl text-gray-900">
                            {{ ladder.name }}
                        </h2>
                        <p class="text-gray-700 text-sm dots">
                            {{ ladder.description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return {
            ladders: [],
            userRoleData: this.user,
            search: ''
        }
    },
    props: {
        'user': Object,
    },
    mounted() {
        this.getLadders();
        console.log(this.userRoleData);
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
        }
    },
    computed: {
        getFilteredLadders() {
            return this.ladders.filter(ladder => {
                return ladder.name.toLowerCase().includes(this.search.toLowerCase());
            })
        },
    }
}
</script>
