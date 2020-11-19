<template>
    <div>
        <header class="bg-blue-500 py-1 text-white">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 justify-between flex items-center text-shadow">
                <a class="text-yellow-star flex items-center text-4xl font-title" href="/">Versus</a>
                <div onclick="" class="flex items-center">
                    <a href="#" class="font-bold text-lg" id="userName">{{ username }}</a>
                    <i class="ml-1 text-sm pt-1 fas fa-chevron-down"></i>
                </div>
            </div>
        </header>
    </div>
</template>
<script>
export default {
    props: {
        'username': String
    }
}
</script>
