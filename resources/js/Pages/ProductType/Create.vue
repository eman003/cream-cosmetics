<template>
        <app-layout>
            <div class="text-center uppercase text-2xl ">add new product types</div>
            <div class="mx-auto max-w-6xl bg-white pt-10 px-12 lg:px-24 mb-24">

            <form @submit.prevent="submit">
                <div class="bg-white shadow rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
                    <div v-for="(field, index) in producttype">
                        <div v-if="alertOpen && errors[index]" class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-pink-500">
                            <span class="text-xl inline-block mr-5 align-middle">
                              <i class="fas fa-bell"></i>
                            </span>
                            <span class="inline-block align-middle mr-8">{{errors[index]}}</span>
                            <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none" @click="alertOpen = false">
                                <span>×</span>
                            </button>
                        </div>
                    </div>
                    <div class="pt-3 mb-4 flex flex-col">
                        <div class="-mx-3 md:flex mb-6">
                            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="name">
                                    product type name*
                                </label>
                                <input :class="errors.name?'border border-red-500':null" class="w-full bg-gray-50 text-black border border-gray-200 focus:border focus:border-green-400 rounded py-3 px-4 mb-3" id="name" v-model="producttype.name" type="text" >
                            </div>
                            <div class="md:w-1/2 px-3">
                                <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="status">
                                    status*
                                </label>
                                <select :class="errors.status_id?'border border-red-500':null" v-model="producttype.status_id" class="w-full bg-gray-50 text-black border border-gray-200 focus:border focus:border-green-400 rounded py-3 px-4 mb-3" id="status">
                                    <option disabled>Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Disabled</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mt-2">
                        <div class="md:w-full px-3">
                            <button class="md:w-full bg-green-400 focus:outline-none focus:border-green-400 uppercase hover:bg-green-500 shadow hover:shadow-md text-white font-bold py-2 px-4 rounded">
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
import ValidationError from "@/Utils/ValidationError";
export default {
    name: "Create",
    components: {AppLayout, ValidationError},
    props:{
        errors: Object
    },
    data: function(){
        return {
            producttype: {
                name: '',
                status_id: 1,
            },
            alertOpen: true
        }
    },
    methods: {
        submit(){
            Inertia.post('/producttype', this.producttype);
        }
    }
}
</script>

<style scoped>

</style>
