<template>
    <app-layout>
        <div class="text-center uppercase text-2xl ">add new product types</div>
        <div class="mx-auto max-w-6xl bg-white pt-10 px-12 lg:px-24 mb-24">
            <form @submit.prevent="edit">
                <div class="bg-white shadow rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
                    <div class="pt-6 mb-4 flex flex-col">
                        <div class="-mx-3 md:flex mb-6">
                            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="name">
                                    product type name*
                                </label>
                                <input :class="errors.name?'border border-red-500':null" class="w-full bg-gray-50 text-black border border-gray-200 focus:border focus:border-green-400 rounded py-3 px-4 mb-3" id="name" v-model="form.name" type="text" >
                            </div>
                            <div class="md:w-1/2 px-3">
                                <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="status">
                                    status*
                                </label>
                                <select :class="errors.status_id?'border border-red-500':null" v-model="form.status_id" class="w-full bg-gray-50 text-black border border-gray-200 focus:border focus:border-green-400 rounded py-3 px-4 mb-3" id="status">
                                    <option disabled>Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Disabled</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mt-2">
                        <div class="md:w-full px-3">
                            <button class="md:w-full bg-green-400 focus:border focus:border-green-400 uppercase hover:bg-green-500 shadow hover:shadow-md text-white font-bold py-2 px-4 rounded">
                                Update product type
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="absolute right-3 top-3">
            <div v-if="displayErrors" v-for="(error, index) in errors" class="bg-red-200 border-l-4 border-red-500 text-red-500 p-4" role="alert">
                <p>{{ error }}</p>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import { reactive } from 'vue';
import { Inertia } from '@inertiajs/inertia';

export default {
    name: "Create",
    components:{AppLayout},
    props:{
        producttype: Object,
        errors: Object
    },
    data: function (){
        return {
            displayErrors: false
        }
    },
    watch: {
        errors(){
            this.displayErrors = true;
            setTimeout(() => this.displayErrors = false, 7000);
        }
    },
    setup(props){
        const form = reactive({
            name: props.producttype.name,
            status_id: props.producttype.status_id,
        })

        function edit(){
            Inertia.patch('/producttype/'+props.producttype.id, form)
        }

        return { form, edit }
    }
}
</script>

<style scoped>

</style>
