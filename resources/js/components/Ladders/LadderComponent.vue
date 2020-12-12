<template>
    <div>
        <div v-on:click="showRanking">
            <div class="container-padding hover:shadow-lg mb-4">
                <div class="title-container">
                    {{ ladder.name }}
                </div>
                <p class="text-white text-base text-shadow">
                    {{ ladder.description }}
                </p>
            </div>
        </div>
    </div>
</template>
<script>
    module.exports = {
        props: {
            ladder: Object,
        },
        methods: {
            showRanking() {
                window.location.href = '/ladders/' + this.ladder.id + '/ranking';
            }
        }
    }
</script>
