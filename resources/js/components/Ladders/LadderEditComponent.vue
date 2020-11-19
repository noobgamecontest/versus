<template>
    <div class="min-h-screen flex items-center justify-center bg-blue-500 pt-10 pb-12 px-4 sm:px-6 lg:px-8">
        <div class="bg-yellow-star shadow-xl rounded-lg max-w-md w-full space-y-8 px-3 py-6">
            <h2 class="mt-6 text-center text-4xl font-secondary uppercase text-gray-900">
                Paramètres du ladder {{ ladderData.name }} !
            </h2>
            <form class="mt-8 space-y-6 px-3" v-on:submit.prevent="submitEditLadder(ladderEdit)">
                <div class="space-y-6">
                    <div>
                        <label class="text-gray-900 font-semibold uppercase" for="name">Nom: <span class="text-gray-700 normal-case">{{ ladderData.name }}</span></label>
                        <input v-model="ladderEdit.name" id="name" name="name" type="text" required class="input-custom bg-yellow-200 focus:outline-none p-3 sm:text-sm">
                    </div>
                    <div>
                        <label class="text-gray-900 font-semibold uppercase" for="description">Description: <span class="text-gray-700 normal-case dots">{{ ladderData.description }}</span></label>
                        <input v-model="ladderEdit.description" id="description" name="description" type="text" required class="input-custom bg-yellow-200 focus:outline-none p-3 sm:text-sm">
                    </div>
                    <div>
                        <label class="text-gray-900 font-semibold uppercase" for="image_url">Url de l'image: <span class="text-gray-700 normal-case dots">{{ ladderData.image_url.toLowerCase() }}</span></label>
                        <input v-model="ladderEdit.image_url" id="image_url" name="image_url" type="text" required class="input-custom bg-yellow-200 focus:outline-none p-3 sm:text-sm">
                    </div>
                </div>
                <button type="submit" class="btn-skew focus:outline-none bg-blue-500 text-xl shadow-xl border-3 py-2">
                    Edit
                </button>
            </form>
        </div>
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
        props: {
            'ladder': Object
        },
        methods: {
            submitEditLadder(ladderEdit) {
                axios.put('/ajax/ladders/' + this.ladderData.id, this.ladderEdit);
                window.location.href = '/';
            }
        }
    }
</script>

