<template>
    <div class="min-h-screen flex items-center justify-center bg-blue-500 pt-10 pb-12 px-4 sm:px-6 lg:px-8">
        <div class="bg-yellow-star shadow-xl rounded-lg max-w-md w-full space-y-8 px-3 py-6">
            <h2 class="mt-6 text-center text-4xl font-secondary uppercase text-gray-900">
                Crée ton ladder !
            </h2>
            <form class="mt-8 space-y-6 px-3" v-on:submit.prevent="submitLadder">
                <div class="space-y-6">
                    <div class="block">
                        <label class="block text-gray-900 font-semibold uppercase" for="name">Nom</label>
                        <input v-model="ladder.name" id="name" name="name" type="text" required class="input-custom bg-yellow-200 focus:outline-none p-3 sm:text-sm">
                    </div>
                    <div>
                        <label class="text-gray-900 font-semibold uppercase" for="description">Description</label>
                        <input v-model="ladder.description" id="description" name="description" type="text" required class="input-custom bg-yellow-200 focus:outline-none p-3 sm:text-sm">
                    </div>
                    <div>
                        <label class="text-gray-900 font-semibold uppercase" for="image_url">URL de l'Image</label>
                        <input v-model="ladder.image_url" id="image_url" name="image_url" type="text" required class="input-custom bg-yellow-200 focus:outline-none p-3 sm:text-sm">
                    </div>
                </div>
                <button type="submit" class="btn-skew focus:outline-none bg-blue-500 text-xl shadow-xl border-3 py-2">
                    Sign in
                </button>
            </form>
        </div>
    </div>

</template>
<script>
    export default {
        data() {
            return {
                ladder: {
                    name: null,
                    description: null,
                    category: null,
                    image_url: null,
                    number_players: null
                }
            }
        },
        methods: {
            submitLadder(){
                axios.post('/ajax/ladders/', this.ladder);
                window.location.href = '/';
            }
        }
    }
</script>
