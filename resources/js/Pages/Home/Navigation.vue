<template>
    <header class="flex flex-wrap flex-row justify-between md:items-center md:space-x-4 bg-white py-2 relative">
        <a href="/" class="block">
            <span class="sr-only">Cream. Cosmetics</span>
            <img class="h-8 md:h-16" src="/images/logo.png" alt="Themes.dev Logo" title="Cream. Cosmetics Logo">
        </a>
        <nav class="absolute md:relative top-16 left-0 md:top-0 z-20 hidden md:flex flex-col md:flex-row md:space-x-6 w-full md:w-auto bg-white shadow-md rounded-lg md:rounded-none md:shadow-none md:bg-transparent p-6 pt-0 md:p-0 text-xl ">
<!--            <a href="#" class="block py-1 text-gray-400 hover:text-gray-800 active:text-gray-800">Home</a>-->
<!--            <a href="#" class="block py-1 text-gray-400 hover:text-gray-800 active:text-gray-800">About us</a>-->
            <a href="#ambassador" @click="scrollToElement('ambassador', 700)" class="block py-1 text-gray-400 hover:text-gray-800 active:text-gray-800 transition ease-out duration-700">Ambassadors</a>
            <a href="#contact" @click="scrollToElement('contact', 800)" class="block py-1 text-gray-400 hover:text-gray-800 active:text-gray-800 transition ease-out duration-700">Contact Us</a>
        </nav>
    </header>
</template>

<script>
export default {
    name: "Navigation",
    methods: {
        scrollToElement(id, duration) {

            let target = document.getElementById(id);
            let targetPosition = target.getBoundingClientRect().top;
            let startPosition = window.pageYOffset;
            let distance = targetPosition - startPosition;
            var startTime = null;

            function animation(currentTime){
                if (startTime === null) startTime = currentTime;
                let timeElapsed = currentTime - startTime;
                let run = ease(timeElapsed, startPosition, distance, duration);
                window.scrollTo(0, run);

                if(timeElapsed < duration) requestAnimationFrame(animation)
            }

            function ease(t, b, c, d){
                t /= d/2;
                if (t < 1) return c/2*t*t+b;
                t--;
                return -c/2*(t*(t-2) -1)+b;
            }

            requestAnimationFrame(animation);
        },

    }
}
</script>

<style scoped>

</style>
