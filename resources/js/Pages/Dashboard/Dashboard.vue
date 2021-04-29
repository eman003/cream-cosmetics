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
                    value: 0,
                    name: 'Products Types',
                    color: 'bg-indigo-600',
                    icons:{
                        categories: ['fas', 'project-diagram']
                    },
                    data: []
                },
                {
                    value: '8,282',
                    name: 'Products',
                    color: 'bg-red-400',
                    icons:{
                        categories: ['fas', 'shopping-basket']
                    },
                    data: []
                },
                {
                    value: '8,282',
                    name: 'Ambassadors',
                    color: 'bg-pink-500',
                    icons:{
                        categories: ['fas', 'bullhorn']
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
                    this.cards[0].value = response.data.length;
                    this.isLoading = false;
                })
                .catch(err => console.log(err))
        }
    }
}
</script>

<style scoped>

</style>
