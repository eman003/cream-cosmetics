<template>
    <div>
        <navigation  class="container mx-auto" />
        <hero/>
        <products />
        <ambassadors />
        <contact />
        <Footer />
    </div>
</template>

<script>
import Navigation from "@/Pages/Home/Navigation";
import Hero from "@/Pages/Home/Hero";
import Products from "@/Pages/Home/Products";
import Ambassadors from "@/Pages/Home/Ambassadors";
import Contact from "@/Pages/Home/Contact";
import Footer from "@/Pages/Home/Footer";
export default {
    name: "index",
    components: {
        Navigation,
        Hero,
        Products,
        Ambassadors,
        Contact,
        Footer
    }
}
</script>

<style scoped>

</style>
