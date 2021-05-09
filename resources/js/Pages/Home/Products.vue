<template>
    <div class="bg-gray-100 pt-6 sm:pt-9 md:pt-12 lg:pt-16 pb-4 sm:pb-6 md:pb-8" id="shop">
        <titles>Make Up</titles>
        <div class="container mt-4 sm:mt-8 md:mt-12 lg:mt-16 mx-auto">
            <div class="md:flex mb-12">
                <div class="w-full md:w-1/4">
                    <div class="py-1 mx-2 text-base md:text-xl px-3 mb-1 md:mb-3 rounded shadow text-gray-600 cursor-pointer" :class="active_tab === products.liquid[0].type?'bg-gray-50':'bg-gray-200'" @click="activateTab(products.liquid)">
                        Liquid Foundation SPF30
                        <font-awesome-icon
                            class="float-right"
                            :class="active_tab === products.liquid[0].type?'lg:inline-block':'hidden'"
                            :icon="['fas', 'caret-right']"/>
                    </div>
                    <div class="py-1 mx-2 text-base md:text-xl mb-1 md:mb-3 px-3 rounded shadow text-gray-600 cursor-pointer" :class="active_tab === products.pressed[0].type?'bg-gray-50':'bg-gray-200'" @click="activateTab(products.pressed)">
                        Pressed Powder Matte Finish
                        <font-awesome-icon
                            class="float-right"
                            :class="active_tab === products.pressed[0].type?'lg:inline-block':'hidden'"
                            :icon="['fas', 'caret-right']"/>
                    </div>
                    <div class="py-1 mx-2 text-base md:text-xl mb-1 md:mb-3 px-3 rounded shadow text-gray-600 cursor-pointer" :class="active_tab === products.highlights[0].type?'bg-gray-50':'bg-gray-200'" @click="activateTab(products.highlights)">
                        V-Face Double Highlight and Contour Stick
                        <font-awesome-icon
                            class="float-right"
                            :class="active_tab === products.highlights[0].type?'lg:inline-block':'hidden'"
                            :icon="['fas', 'caret-right']"/>
                    </div>
                    <div class="py-1 mx-2 text-base md:text-xl mb-1 md:mb-3 px-3 rounded shadow text-gray-600 cursor-pointer" :class="active_tab == 'description'?'bg-gray-50':'bg-gray-200'" @click="activateTab('description')">
                        Description
                        <font-awesome-icon
                            class="float-right"
                            :class="active_tab == 'description'?'lg:inline-block':'hidden'"
                            :icon="['fas', 'caret-right']"/>
                    </div>
                </div>
                <div class="w-full md:w-3/4 mx-2">
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-3" v-if="!is_description">
                        <thumbnails :images="images" />
                    </div>
                    <div class="p-4" v-if="is_description">
                        <p class="text-xl">CREAM. Cosmetics Foundation is ideal for South African skin, with SPF 30 to protect your skin from UV-rays. The foundation is creamy and lightweight, offers full coverage for 24 hours, it helps minimize the appearance of pores and imperfections, and it also blends easily. Offers a smooth and flawless look and finish.</p>
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
            active_tab: SiteData.liquid[0].type??null,
            is_description:false,
        }
    },
    methods:{
        activateTab(product){
            if (product != 'description'){
                this.images = product;
                this.active_tab = product[0].type;
                this.is_description = false;
            }else {
                this.active_tab = product;
                this.is_description = true;
            }
        }
    }
}
</script>

<style scoped>

</style>
