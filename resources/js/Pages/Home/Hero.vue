<template>
    <div class="bg-center h-hero sm:h-heroSm md:h-heroMd lg:h-heroLg bg-cover flex items-center content-center text-center align-middle" :style="style">
        <div class="w-full">
            <p class="capitalize text-3xl md:text-5xl text-white mb-2">Hello gorgeous, shop and find your perfect shade.</p>
            <div class="pt-3 md:pt-9">
                <a @click="scrollToElement('shop', 500)" href="#shop" class="py-1 md:py3 px-9 md:px-12 text-white border border-white rounded rounded-full text-1xl md:text-3xl hover:bg-white hover:text-gray-700 transition ease-linear duration-700"><font-awesome-icon class="pr-2" :icon="['fas', 'shopping-cart']" />Shop</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Hero",
    mounted() {
        this.randomBgImages();
    },
    data(){
        return {
            style: {
                backgroundImage: ''
            }
        }
    },
    methods: {
        randomBgImages(){
            let x = Math.floor(Math.random() * 5);
            this.style.backgroundImage = 'url(\'/images/heroes/hero'+x+'.jpg\')';
        },
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

            requestAnimationFrame(animation)
        },
    }
}
</script>

<style scoped>

</style>
