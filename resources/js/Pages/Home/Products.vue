<template>
    <div class="bg-gray-100 pt-6 sm:pt-9 md:pt-12 lg:pt-16 pb-4 sm:pb-6 md:pb-8" id="shop">
        <titles>Make Up</titles>
        <div class="container mt-4 sm:mt-8 md:mt-12 lg:mt-16 mx-auto">
            <div class="md:flex mb-12">
                <div class="w-full md:w-1/4">
                    <div class="py-1 mx-2 text-base md:text-xl px-3 mb-1 md:mb-3 bg-gray-200 rounded shadow text-gray-600 cursor-pointer" @click="activateTab(products.liquid)">Liquid Foundation SPF30</div>
                    <div class="py-1 mx-2 text-base md:text-xl mb-1 md:mb-3 px-3 bg-gray-200 rounded shadow text-gray-600 cursor-pointer" @click="activateTab(products.pressed)">Pressed Powder Matte Finish</div>
                    <div class="py-1 mx-2 text-base md:text-xl mb-1 md:mb-3 px-3 bg-gray-200 rounded shadow text-gray-600 cursor-pointer" @click="activateTab(products.highlights)">V-Face Double Highlight and Contour Stick</div>
                    <div class="py-1 mx-2 text-base md:text-xl mb-1 md:mb-3 px-3 bg-gray-200 rounded shadow text-gray-600 cursor-pointer">Description</div>
                </div>
                <div class="w-full md:w-3/4 mx-2">
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-3">
                        <thumbnails :images="images" />
                    </div>

<!--                    <div class="grid pt-12 justify-items-center">
                        <button class="py-1 px-9 border border-gray-600 rounded rounded-full mb-12 justify-center">View More</button>
                    </div>-->
                </div>
            </div>

        </div>
    </div>
</template>

<script>
import Titles from "@/Pages/Home/Titles";
import Thumbnails from "@/Pages/Home/Thumbnails";
import SiteData from "../data";

export default {
    name: "Products",
    components: {Titles, Thumbnails},
    data(){
        return {
            products: SiteData,
            images: SiteData.liquid,
        }
    },
    methods:{
        activateTab(product){
            this.images = product;
        }
    }
}
</script>

<style scoped>

</style>
