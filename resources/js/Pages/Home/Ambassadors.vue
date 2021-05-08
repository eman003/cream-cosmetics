<template>
    <div class="pt-8 md:pt-16 container mx-auto" id="ambassador">
        <titles>Our Ambassadors</titles>
        <div class="mt-8 mx-3 lg:mt-12 mb-4 sm:mb-8 md:mb-12 lg:mb-16 grid grid-cols-2 md:grid-cols-3  lg:grid-cols-6 gap-3">
            <div v-for="image in ambassadors" class="relative rounded-lg">
                <img :src="`/images/ambassadors/${image}.jpg`" alt="">
                <div class="bg-black bg-opacity-40 text-center text-white absolute left-0 bottom-0 w-full h-7">&nbsp;</div>
            </div>
        </div>
    </div>
</template>

<script>
import Titles from "@/Pages/Home/Titles"
import Thumbnails from "@/Pages/Home/Thumbnails";
export default {
    name: "Ambassadors",
    components: {Titles, Thumbnails},
    data(){
        return {
            ambassadors: [1,2,3,4,5,6,7,8,9,10,11,12]
        }
    }
}
</script>

<style scoped>

</style>
