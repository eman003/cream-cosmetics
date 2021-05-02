<template>
    <div v-for="image in images" class="relative rounded-lg">
        <img :src="`/images/${directory}/${image}.jpg`" alt="">
        <div class="bg-black bg-opacity-40 text-center text-white absolute left-0 bottom-0 w-full h-7">{{description}} {{image}}</div>
    </div>
</template>

<script>
export default {
    name: "Thumbnails",
    props: {
        images: Array,
        directory: String,
        description: String
    }
}
</script>
