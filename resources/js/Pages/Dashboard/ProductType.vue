<template>
    <div class="shadow border rounded-lg">
        <div class="flex items-center space-x-4 p-4">
            <div class="flex items-center p-4 bg-purple-600 text-white rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-current" viewBox="0 0 20 20">
                    <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                </svg>
            </div>
            <div class="flex-1">
                <p class="text-gray-500 font-semibold">{{ productType.name }}</p>
                <div class="flex items-end space-x-4 mt-2">
                    <p class="flex text-sm font-semibold " :class="productType.status_id?'text-green-700':'text-gray-700'">
                        <span class="font-bold px-4 py-1" :class="productType.status_id?'bg-green-200':'bg-gray-200'">{{productType.status_id?'Active':'Disabled'}}</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="block p-3 text-lg flex outline-none focus:outline-none justify-between font-semibold bg-purple-50 text-purple-800 cursor-pointer">
            <inertia-link :href="url+'/'+productType.id+'/edit'" class="px-8 py-1 bg-green-400 text-white hover:bg-green-500 active:border-green-500 outline-none text-sm uppercase rounded shadow-md" title="Edit">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                    <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                </svg>
            </inertia-link>
            <button class="px-8 py-1 outline-none bg-red-400 active:border hover:bg-red-500 active:border active:border-red-500 text-white text-sm uppercase rounded shadow-md" title="Delete" @click="deleteConfirm.isDeleting = true">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
        <div v-if="deleteConfirm.isDeleting" class="absolute right-3 top-3">
            <div class="max-w-xl w-full bg-white shadow-lg z-50 rounded-lg overflow-hidden">
                <div class="p-4 flex space-x-4 md:flex-row flex-col md:text-left text-center items-center">
                    <div class="bg-red-50 p-3 md:self-start rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 fill-current text-red-700" width="24" height="24" viewBox="0 0 24 24"><path d="M12 5.177l8.631 15.823h-17.262l8.631-15.823zm0-4.177l-12 22h24l-12-22zm-1 9h2v6h-2v-6zm1 9.75c-.689 0-1.25-.56-1.25-1.25s.561-1.25 1.25-1.25 1.25.56 1.25 1.25-.561 1.25-1.25 1.25z"/></svg>
                    </div>
                    <div>
                        <h1 class="text-xl font-semibold tracking-wide text-red-700">
                            Deleting Product Type
                        </h1>
                        <p class="text-gray-500">
                            Are you sure you want to delete this product type? All of the products under this type will be deleted as well.
                        </p>
                    </div>
                </div>

                <div class="p-3 bg-gray-50 text-right md:space-x-4 md:block flex flex-col-reverse">
                    <button @click="deleteConfirm.isDeleting = false" class="px-4 md:py-1.5 py-2 bg-white border-2 rounded-lg focus:ring-offset-2 focus:outline-none focus:ring-2 focus:ring-blue-800 hover:bg-gray-50">
                        Cancel
                    </button>
                    <button @click="isDeleting" class="mb-2 md:mb-0 px-4 md:py-1.5 py-2 bg-red-700 text-white rounded-lg focus:ring-offset-2 focus:outline-none focus:ring-2 focus:ring-red-800 hover:bg-red-800">
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {reactive, watch} from 'vue';
import { Inertia } from '@inertiajs/inertia';
export default {
    name: "ProductType",
    emits: ['delete'],
    props:{
        url: String,
        productType: Object
    },
    setup(props, ctx){
        const deleteConfirm = reactive({confirm: false, isDeleting: false,})
        function destroy() {
            axios.delete('/'+props.url+'/'+ props.productType.id)
                .then(res => ctx.emit('delete'))
                .then(err => console.log(err));
            //Inertia.delete()
        }

        return {deleteConfirm, destroy}
    },
    methods:{
        isDeleting(){
            this.deleteConfirm.confirm = true;
            this.deleteConfirm.isDeleting = false;
            this.destroy()
        }
    }
}
</script>

<style scoped>

</style>
