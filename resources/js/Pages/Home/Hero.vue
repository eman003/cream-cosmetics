<template>
    <div class="bg-center bg-cover flex items-center content-center text-center align-middle" :style="style">
        <div class="w-full h-40">
            <p class="capitalize text-5xl text-white mb-8">welcome message goes here.</p>
            <div class="pt-9"><a href="#" class="py-1 px-12 text-white border border-white rounded rounded-full text-2xl"><font-awesome-icon class="pr-2" :icon="['fas', 'shopping-cart']" />Shop</a></div>
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
                height: '45em',
                backgroundImage: ''
            }
        }
    },
    methods: {
        randomBgImages(){
            let x = Math.floor(Math.random() * 5);
            this.style.backgroundImage = 'url(\'/images/heroes/hero'+x+'.jpg\')';
        }
    }
}
</script>

<style scoped>

</style>
