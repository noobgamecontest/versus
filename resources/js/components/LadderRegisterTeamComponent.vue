<template>
    <div>
        <div class="max-w-sm mx-auto text-white text-xl text-shadow font-bold text-center bg-blue-700 py-2 mb-4">
            {{ ladder.name }}
        </div>
    </div>
</template>

<script>
module.exports = {
    props: [
        'ladder',
    ],

    data: function () {
    },
    created: function() {
    },
    methods: {
    }
}
</script>
