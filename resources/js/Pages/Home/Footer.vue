<template>
    <div class="py-16 text-gray-600">
        <div class="text-4xl text-center mb-12">
            <a href="https://www.instagram.com/_cream.cosmetics" target="_blank"><font-awesome-icon class="mx-4 hover:text-gray-700" :icon="['fab', 'instagram']" /></a>
            <a href="https://wa.me/27785402697" target="_blank"><font-awesome-icon class="mx-4 hover:text-gray-700" :icon="['fab', 'whatsapp']" /></a>
            <a href="https://www.twitter.com/CosmeticsCream" target="_blank"><font-awesome-icon class="mx-4 hover:text-gray-700" :icon="['fab', 'twitter']" /></a>
            <a href="https://youtube.com/channel/UCvPvqzI6CTsNG5aUnJMmLRw" target="_blank"><font-awesome-icon class="mx-4 hover:text-gray-700" :icon="['fab', 'youtube']" /></a>
        </div>
        <div class="text-center text-base md:text-xl hover:text-gray-700">Cream Cosmetics copyright &copy; {{new Date().getFullYear()}}. All rights reserved</div>
    </div>
</template>

<script>
export default {
    name: "Footer"
}
</script>

<style scoped>

</style>
