<template>
    <div v-for="image in images" class="relative rounded-md hover:shadow-md transition ease-out duration-500">
        <a :href="image.url" target="_blank">
            <div class="bg-black opacity-0 hover:opacity-60 transition ease-linear duration-500 text-center text-white absolute left-0 top-0 w-full h-full rounded-md z-10" style="height: 100%">
                <button class="absolute px-8 py-1 border border-white rounded-full left-1/2 top-1/2" style="transform: translate(-50%, -50%)"><font-awesome-icon class="pr-2" :icon="['fas', 'shopping-cart']" />Buy</button>
            </div>
            <img :src="`/images/makeup/${image.type}/${image.id}.jpg`" class="rounded-md">
        </a>
        <div class="bg-black bg-opacity-40 text-center text-white absolute left-0 bottom-0 w-full h-7 rounded-b-md">{{image.description}}</div>
    </div>
</template>

<script>
export default {
    name: "Thumbnails",
    props: {
        images: Array,
    }
}
</script>
