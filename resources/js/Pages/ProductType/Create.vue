<template>
        <app-layout>
            <div class="text-center uppercase text-2xl ">add new product types</div>
            <div class="mx-auto max-w-6xl bg-white pt-10 px-12 lg:px-24 mb-24">
            <form @submit.prevent="submit">
                <div class="bg-white shadow rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-full px-3">
                            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="name">
                                product type name*
                            </label>
                            <input class="w-full bg-gray-50 uppercase text-black border border-gray-200 rounded py-3 px-4 mb-3" id="name" v-model="name" type="text" >
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mt-2">
                        <div class="md:w-full px-3">
                            <button class="md:w-full bg-green-400 uppercase hover:bg-green-500 shadow hover:shadow-md text-white font-bold py-2 px-4 rounded">
                                Add product type
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </app-layout>
</template>

<script>

import AppLayout from "@/Layouts/AppLayout";
import { Inertia } from "@inertiajs/inertia";
export default {
    name: "Create",
    components: {AppLayout},
    data: function(){
        return {
            name: '',
        }
    },
    methods: {
        submit(){
            Inertia.post('/product');
        }
    }
}
</script>

<style scoped>

</style>
