<template>
    <div class="w-full px-6 sm:w-1/2 xl:w-1/3">
        <div class="flex items-center px-5 py-6 shadow-sm rounded-md cursor-pointer" :class="activeColor">
            <div class="p-3 rounded-full bg-opacity-75" :class="cardColor" v-html="cardIcon"></div>
            <div class="mx-5">
                <h4 class="text-2xl font-semibold text-gray-700">{{cardValue}}</h4>
                <div class="text-gray-500">{{ cardName }}</div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "DashboardCard",
    props: ['cardIcon', 'cardValue', 'cardName', 'cardColor', 'activeColor']
}
</script>

<style scoped>

</style>
