<template>
    <div v-for="image in images" class="relative rounded-lg">
        <a :href="image.url"><img :src="`/images/makeup/${image.type}/${image.id}.jpg`" alt=""></a>
        <div class="bg-black bg-opacity-40 text-center text-white absolute left-0 bottom-0 w-full h-7">{{image.description}}</div>
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
