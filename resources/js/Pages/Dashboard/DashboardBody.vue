<template>
    <div class="mb-10 text-gray-800">
        <span class="text-xl">{{card.name}}</span>
        <inertia-link v-if="card.name === 'Products Types'" href="/producttype/create" class="text-base uppercase text-sm float-right text-gray-50 bg-green-400 hover:bg-green-500 px-8 py-2 rounded drop-shadow">Add New</inertia-link>
        <inertia-link v-if="card.name === 'Products'" href="/product/create" class="text-base uppercase text-sm float-right text-gray-50 bg-green-400 hover:bg-green-500 px-8 py-2 rounded drop-shadow">Add New</inertia-link>
        <inertia-link v-if="card.name === 'Ambassadors'" href="/ambassador/create" class="text-base uppercase text-sm float-right text-gray-50 bg-green-400 hover:bg-green-500 px-8 py-2 rounded drop-shadow">Add New</inertia-link>
    </div>
    <div v-if="loader" class="py-52 w-full grid grid-cols-1 place-items-center">
        <!-- TODO: Add a spinner -->
        <p>Check Me Out</p>
    </div>
    <div class="-my-2 py-2 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8 flex items-center justify-center ">
        <div class="min-w-full shadow sm:rounded-lg border-b border-gray-200 md:grid md:grid-cols-3 md:gap-4 space-y-4 md:space-y-0 mt-4 p-3">
            <product-type v-if="card.name === 'Products Types'" v-for="type in card.data" url="producttype" :product-type="type"/>
            <product-type v-if="card.name === 'Products'" v-for="type in card.data" url="product" :product-type="type"/>
            <product-type  v-if="card.name === 'Products Ambassadors'" v-for="type in card.data" url="ambassador" :product-type="type"/>
        </div>
    </div>
</template>

<script>
import ProductType from "@/Pages/Dashboard/ProductType";

export default {
    name: "DashboardBody",
    props: ['card', 'loader'],
    components: {ProductType},

}
</script>

<style scoped>

</style>
