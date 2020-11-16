<template>
    <div>
        <h2 class="text-center font-semibold text-2xl text-white">Create ladder</h2>
        <div class="max-w-sm mx-auto text-white text-xl text-shadow font-bold text-center bg-blue-700 py-2 mb-4">
            <form class="space-y-4 px-3" v-on:submit.prevent="submitLadder">
                <div>
                    <label class="block w-full text-left" for="name">Name</label>
                    <input v-model="ladder.name" class="focus:outline-none input-custom" type="text" name="name" id="name">
                </div>
                <div>
                    <label class="block w-full text-left" for="description">Description</label>
                    <input v-model="ladder.description" class="focus:outline-none input-custom" type="text" id="description" name="description">
                </div>
                <div>
                    <label class="block w-full text-left" for="category">Category</label>
                    <input v-model="ladder.category" class="focus:outline-none input-custom" type="text" id="category" name="category">
                </div>
                <div>
                    <label class="block w-full text-left" for="image_url">Image URL</label>
                    <input v-model="ladder.image_url" class="focus:outline-none input-custom" type="text" name="image_url" id="image_url">
                </div>
                <button type="submit">create</button>
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
                    image_url: null
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
