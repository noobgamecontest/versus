<template>
    <div class="max-w-sm mx-auto text-white text-xl text-shadow font-bold text-center bg-blue-700 py-2 mb-4">
        <form class="space-y-4 px-3" v-on:submit.prevent="submitEditLadder(ladderEdit)">
            <div>
                <label class="block w-full text-left" for="name">{{ ladderData.name }}</label>
                <input v-model="ladderEdit.name" class="focus:outline-none input-custom" type="text" name="name" id="name">
            </div>
            <div>
                <label class="block w-full text-left" for="description">{{ ladderData.description }}</label>
                <input v-model="ladderEdit.description" class="focus:outline-none input-custom" type="text" id="description" name="description">
            </div>
            <div>
                <label class="block w-full text-left" for="category">Category</label>
                <input v-model="ladderEdit.category" class="focus:outline-none input-custom" type="text" id="category" name="category">
            </div>
            <div>
                <label class="block w-full text-left" for="image_url">{{ ladder.image_url }}</label>
                <input v-model="ladderEdit.image_url" class="focus:outline-none input-custom" type="text" id="image_url" name="image_url">
            </div>
            <button type="submit">edit</button>
        </form>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                ladderData: this.ladder,
                ladderEdit: {
                    name: null,
                    description: null,
                    image_url: null,
                }
            }
        },
        props: ['ladder'],
        methods: {
            submitEditLadder(ladderEdit) {
                axios.put('/ajax/ladders/' + this.ladderData.id, this.ladderEdit);
                window.location.href = '/';
            }
        }
    }
</script>

