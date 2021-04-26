<template>
    <app-layout>
            <h3 class="text-gray-700 text-3xl font-medium">Dashboard</h3>

            <div class="mt-4">
                <div class="flex flex-wrap -mx-6">
                    <dashboard-card v-for="(card, index) in cards"
                        :card-icon="card.icons.categories"
                        :card-value="card.value"
                        :card-name="card.name"
                        :card-color="card.color"
                        :active-color="index === active_index ? 'bg-gray-100':'bg-gray-200'"
                        @click="active_index = index"
                    />
                </div>
            </div>

            <div class="flex flex-col mt-8">
                <dashboard-body :card="cards[active_index]" :loader="isLoading" @delete="getProductTypes" />
            </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import DashboardCard from "@/Pages/Dashboard/DashboardCard";
import DashboardBody from "@/Pages/Dashboard/DashboardBody";
export default {
    name: "Dashboard",
    mounted() {
        this.getProductTypes();
    },
    components: {
        AppLayout,
        DashboardCard,
        DashboardBody,
    },
    data: function(){
        return{
            cards: [
                {
                    value: '8,282',
                    name: 'Products Types',
                    color: 'bg-indigo-600',
                    icons:{
                        categories: '<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20"  fill="white"> \n'+
                            '<path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"/> \n'+
                            '</svg>'
                    },
                    data: []
                },
                {
                    value: '8,282',
                    name: 'Products',
                    color: 'bg-red-400',
                    icons:{
                        categories: '<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="white"> \n'+
                            '<path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd" /> \n'+
                            '</svg>'
                    },
                    data: []
                },
                {
                    value: '8,282',
                    name: 'Ambassadors',
                    color: 'bg-pink-500',
                    icons:{
                        categories: '<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="white"> \n'+
                            '<path fill-rule="evenodd" d="M18 3a1 1 0 00-1.447-.894L8.763 6H5a3 3 0 000 6h.28l1.771 5.316A1 1 0 008 18h1a1 1 0 001-1v-4.382l6.553 3.276A1 1 0 0018 15V3z" clip-rule="evenodd" /> \n'+
                            '</svg>'
                    },
                    data: []
                }
            ],
            active_index: 0,
            isLoading: true,
        }
    },
    methods: {
        getProductTypes(){
            axios.get('/producttype')
                .then(response => {
                    this.cards[0].data = response.data;
                    this.isLoading = false;
                })
                .catch(err => console.log(err))
        }
    }
}
</script>

<style scoped>

</style>
