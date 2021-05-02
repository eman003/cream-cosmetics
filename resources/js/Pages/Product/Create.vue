<template>
        <app-layout>
            <div class="text-center uppercase text-2xl ">add new product</div>
            <div class="mx-auto max-w-6xl bg-white pt-10 px-12 lg:px-24 mb-24">
                <form @submit.prevent="submit">
                    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
                        <div v-for="(field, index) in form">
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
                        <div class="pt-6 mb-4 flex flex-col">
                            <div class="-mx-3 md:flex mb-6">
                                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="name">
                                        product name*
                                    </label>
                                    <input :class="errors.name?'border border-red-500':null" class="w-full bg-gray-50 text-black border border-gray-200 focus:border focus:border-green-400 rounded py-3 px-4 mb-3" id="name" v-model="form.name" type="text" >
                                </div>
                                <div class="md:w-1/2 px-3">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="product-type">
                                        product type*
                                    </label>
                                    <select :class="errors.product_type_id?'border border-red-500':null" v-model="form.product_type_id" class="w-full bg-gray-50 text-black border border-gray-200 focus:border focus:border-green-400 rounded py-3 px-4 mb-3" id="product-type">
                                        <option disabled value="0">Select Product Type</option>
                                        <option v-for="(type, id) in productTypes" :value="id">{{type}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 flex flex-col">
                            <div class="-mx-3 md:flex mb-6">
                                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="url">
                                        takealot product url*
                                    </label>
                                    <input :class="errors.url?'border border-red-500':null" class="w-full bg-gray-50 text-black border border-gray-200 focus:border focus:border-green-400 rounded py-3 px-4 mb-3" id="url" v-model="form.url" type="text" >
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
                        <div class="md:w-full px-3 mb-6 md:mb-0">
                            <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="image">
                                Product image*
                            </label>
                            <div :class="errors.image?'border-red-500':null" class="cursor-pointer relative h-40 rounded-lg border-dashed border-2 border-gray-200 bg-white flex justify-center items-center hover:cursor-pointer">
                                <div class="absolute">
                                    <div class="flex flex-col items-center "> <i class="fa fa-cloud-upload fa-3x text-gray-200"></i> <span class="block text-gray-400 font-normal">Attach you files here</span> <span class="block text-gray-400 font-normal">or</span> <span class="block text-blue-400 font-normal">Browse files</span> </div>
                                </div> <input type="file" class="h-full w-full opacity-0" id="image" @input="form.image = $event.target.files[0]">
                            </div>
                            <div class="flex justify-between items-center text-gray-400"> <span>Accepted file type:.jpeg, .jpg, .png only</span> <span class="flex items-center "><font-awesome-icon :icon="['fas', 'lock']" class="mr-1" /> secure</span> </div>
                        </div>

                        <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                            {{ form.progress.percentage }}%
                        </progress>

                        <div class="-mx-3 md:flex mt-2">
                            <div class="md:w-full px-3">
                                <button class="md:w-full bg-green-400 focus:border focus:border-green-400 uppercase hover:bg-green-500 shadow hover:shadow-md text-white font-bold py-2 px-4 rounded">
                                    Add product
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </app-layout>
</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3';
import AppLayout from "@/Layouts/AppLayout";
export default {
    name: "Create",
    components: {AppLayout},
    props: {
        productTypes: Object,
        errors: Object
    },
    data(){
        return {
            alertOpen: true
        }
    },
    setup () {
        const form = useForm({
            name: null,
            image: null,
            url: null,
            product_type_id: 0,
            status_id: 1
        })

        function submit() {
            form.post('/product')
        }

        return { form, submit }
    },
}
</script>

<style scoped>

</style>
