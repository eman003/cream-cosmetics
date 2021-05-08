<template>
    <header class="flex flex-wrap flex-row justify-between md:items-center md:space-x-4 bg-white py-2 relative">
        <a href="#" class="block">
            <span class="sr-only">Cream. Cosmetics</span>
            <img class="h-8 md:h-16" src="/images/logo.png" alt="Themes.dev Logo" title="Cream. Cosmetics Logo">
        </a>
        <nav class="absolute md:relative top-16 left-0 md:top-0 z-20 hidden md:flex flex-col md:flex-row md:space-x-6 w-full md:w-auto bg-white shadow-md rounded-lg md:rounded-none md:shadow-none md:bg-transparent p-6 pt-0 md:p-0 text-xl ">
<!--            <a href="#" class="block py-1 text-gray-400 hover:text-gray-800 active:text-gray-800">Home</a>-->
<!--            <a href="#" class="block py-1 text-gray-400 hover:text-gray-800 active:text-gray-800">About us</a>-->
            <a href="#ambassador" @click="scrollToElement" class="block py-1 text-gray-400 hover:text-gray-800 active:text-gray-800">Ambassadors</a>
            <a href="#contact" @click="scrollToElement" class="block py-1 text-gray-400 hover:text-gray-800 active:text-gray-800">Contact Us</a>
        </nav>
    </header>
</template>

<script>
export default {
    name: "Navigation",
    methods: {
        scrollToElement() {
            const el = this.$refs.scrollToMe;

            if (el) {
                // Use el.scrollIntoView() to instantly scroll to the element
                el.scrollIntoView({behavior: 'smooth'});
            }
        }
    }
}
</script>

<style scoped>

</style>
