<template>
    <div>
        <div class="max-w-sm mx-auto text-white text-xl text-shadow font-bold text-center bg-blue-700 py-2 mb-4">
            {{ ladder.name }}
        </div>
        <div class="max-w-sm mx-auto mb-4 flex">
            <a href="#" class="text-center w-full text-white text-shadow uppercase bg-yellow-star font-bold py-1 border-b-4 border-yellow-600 sm:hover:shadow-lg">
                Fight !
            </a>
        </div>
        <div class="max-w-sm overflow-hidden mx-auto text-shadow">
            <div class="flex px-3 py-6 bg-blue-500 border-b-2 border-t border-l border-r border-black mb-4 text-white font-bold" v-for="team in this.teams">
                <div class="self-center w-1/6 text-center text-black">
                    <img class="border-2 border-black" src="https://www.mobafire.com/images/avatars/ziggs-mad-scientist.png" alt="">
                </div>
                <div class="self-center w-4/6 pl-2">
                    <div class="text-lg">
                        {{ team.name }}
                    </div>
                    <div>
                        {{ team.elo }} pts
                    </div>
                </div>
                <div class="self-center w-1/6 text-center text-lg bg-blue-700 py-3">
                    {{ team.rank }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
module.exports = {
    props: {
        'ladder': Object
    },
    data: function () {
        return {
            ladderData: this.ladder,
            teams: Array,
        }
    },
    created: function() {
        this.getTeams();
    },
    methods: {
        getTeams() {
            axios.get('/ajax/ladders/' + this.ladder.id + '/teams').then(response => {
                this.teams = response.data;
            });
        }
    },

}
</script>
