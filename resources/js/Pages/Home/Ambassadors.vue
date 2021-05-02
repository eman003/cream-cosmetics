<template>
    <div class="pt-16 container mx-auto">
        <titles>Our Ambassadors</titles>
        <div class="mt-12 mb-16 grid grid-cols-6 gap-3">
            <thumbnails description="Ambassador Name" directory="ambassadors" :images="ambassadors"/>
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
