<template>
    <div class="pt-8 md:pt-16 container mx-auto" id="ambassador">
        <titles>Our Ambassadors</titles>
        <div class="mt-8 mx-3 lg:mt-12 mb-4 sm:mb-8 md:mb-12 lg:mb-16 grid grid-cols-2 md:grid-cols-3  lg:grid-cols-6 gap-3">
            <div v-for="image in ambassadors" class="relative rounded-lg cursor-pointer hover:shadow-md transition ease-linear duration-500" @click="openModal(image)">
                <div class="bg-black opacity-0 hover:opacity-75 transition ease-linear duration-500 text-center text-white absolute left-0 top-0 w-full h-full rounded-md z-10" style="height: 100%">
                    <button class="absolute px-8 py-1 left-1/2 top-1/2 text-5xl" style="transform: translate(-50%, -50%)"><font-awesome-icon class="pr-2" :icon="['fas', 'eye']" /></button>
                </div>
                <img :src="`/images/ambassadors/${image}.jpg`" alt="" class="hover:shadow-md transition ease-linear duration-500">
                <div class="bg-black bg-opacity-40 text-center text-white absolute left-0 bottom-0 w-full h-7">&nbsp;</div>
            </div>
        </div>

        <!-- Image Pop Up -->

        <div v-if="modal_open" class="hidden lg:block fixed h-full w-full z-30 bg-gray-50 opacity-90 top-0 left-0" style="height: 100%;" @click="modal_open = false">
            <span class="text-2xl text-gray-700 absolute right-2 top-2 p-6 cursor-pointer" @click="modal_open = false">
                <font-awesome-icon :icon="['fas', 'times']" />
            </span>
        </div>
        <div v-if="modal_open" class="hidden lg:block opacity-100 fixed top-1/2 left-1/2 z-40 text-gray-700" style="transform: translate(-50%, -50%)">
            <font-awesome-icon
                class="mr-4 inline-block text-4xl cursor-pointer"
                :icon="['fas', 'chevron-left']"
                @click="() => active_image !== 1 ? active_image-- : active_image = 12"
            />
            <img
                :src="`/images/ambassadors/${active_image}.jpg`"
                class="rounded-xl shadow-md border-4 border-white inline-block transition-all ease-out duration-300"
                style="height: 720px; width: 720px"
            />
            <font-awesome-icon
                class="ml-4 inline-block  text-4xl cursor-pointer"
                :icon="['fas', 'chevron-right']"
                @click="()=> active_image !== 12 ? active_image++ : active_image = 1"
             />
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
            ambassadors: [1,2,3,4,5,6,7,8,9,10,11,12],
            active_image: 3,
            modal_open: false,
        }
    },
    methods: {
        openModal(active_image){
            this.active_image = active_image;
            this.modal_open = true;
        }
    }
}
</script>

<style scoped>

</style>
