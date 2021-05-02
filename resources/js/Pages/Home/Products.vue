<template>
    <div class="bg-gray-100 pt-16 pb-8">
        <titles>Make Up</titles>
        <div class="container mt-16 mx-auto">
            <div class="flex mb-12">
                <div class="w-1/4">
                    <div class="py-2 text-xl px-3 mb-3 bg-gray-200 rounded shadow text-gray-600 cursor-pointer">Liquid Foundation SPF30</div>
                    <div class="py-2 text-xl mb-3 px-3 bg-gray-200 rounded shadow text-gray-600 cursor-pointer">Pressed Powder Matte Finish</div>
                    <div class="py-2 text-xl mb-3 px-3 bg-gray-200 rounded shadow text-gray-600 cursor-pointer">V-Face Double Highlight and Contour Stick</div>
                    <div class="py-2 text-xl mb-3 px-3 bg-gray-200 rounded shadow text-gray-600 cursor-pointer">Description</div>
                </div>
                <div class="w-3/4 ml-9">
                    <div class="grid grid-cols-5 gap-3">
                        <thumbnails :images="images" directory="makeup/liquid" description="Shade Number"/>
                    </div>
                    <div class="grid pt-12 justify-items-center">
                        <button class="py-1 px-9 border border-gray-600 rounded rounded-full mb-12 justify-center">View More</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
import Titles from "@/Pages/Home/Titles";
import Thumbnails from "@/Pages/Home/Thumbnails";

export default {
    name: "Products",
    components: {Titles, Thumbnails},
    data(){
        return {
            images: [1,2,3,4,5,6,7,8,9,10]
        }
    },
}
</script>

<style scoped>

</style>
