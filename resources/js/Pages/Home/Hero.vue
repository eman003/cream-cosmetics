<template>
    <div class="bg-center h-hero sm:h-heroSm md:h-heroMd lg:h-heroLg bg-cover flex items-center content-center text-center align-middle" :style="style">
        <div class="w-full">
            <p class="capitalize text-3xl md:text-5xl text-white mb-2">Hello gorgeous, shop and find your perfect shade.</p>
            <div class="pt-3 md:pt-9"><a href="#shop" @click="scrollToElement" class="py-1 md:py3 px-9 md:px-12 text-white border border-white rounded rounded-full text-1xl md:text-3xl"><font-awesome-icon class="pr-2" :icon="['fas', 'shopping-cart']" />Shop</a></div>
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
