<template>
    <div class="bg-gray-100 pt-16 pb-8">
        <titles>Contact Us</titles>
        <div class="w-1/2 mx-auto mt-12 mb-12">
            <div class="flex flex-row space-x-4">
                <div class="relative z-0 w-full mb-5">
                    <input
                        type="text"
                        id="name"
                        v-model="form.first_name"
                        placeholder=" "
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-gray-700 border-gray-500"
                    />
                    <label for="name" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Fist Name</label>
                </div>
                <div class="relative z-0 w-full">
                    <input
                        type="text"
                        id="lname"
                        v-model="form.last_name"
                        placeholder=" "
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-gray-700 border-gray-500"
                    />
                    <label for="lname" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Last Name</label>
                    <span class="text-sm text-red-600 hidden" id="error">Time is required</span>
                </div>
            </div>
            <div class="flex flex-row space-x-4 pt-9">
                <div class="relative z-0 w-full mb-5">
                    <input
                        type="text"
                        id="subject"
                        v-model="form.subject"
                        placeholder=" "
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-gray-700 border-gray-500"
                    />
                    <label for="subject" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Subject</label>
                </div>
                <div class="relative z-0 w-full">
                    <input
                        type="text"
                        id="email"
                        v-model="form.email"
                        placeholder=" "
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-gray-700 border-gray-500"
                    />
                    <label for="email" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Email</label>
                </div>
            </div>
            <div class="relative z-0 w-full mb-5">
                <textarea
                    name=""
                    id="message"
                    cols="4"
                    class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-gray-700 border-gray-500">
                    {{form.message}}
                </textarea>
                <label for="message" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Message</label>
            </div>
            <button
                id="button"
                type="button"
                class="w-full px-6 py-3 mt-3 text-lg text-white transition-all duration-150 ease-linear shadow outline-none bg-gray-500 hover:bg-gray-600 hover:shadow-lg focus:outline-none"
            >
               <font-awesome-icon :icon="['fas', 'paper-plane']"/> Message Us
            </button>
        </div>
    </div>
</template>

<script>
import Titles from "@/Pages/Home/Titles";
export default {
    name: "Contact",
    components: {Titles},
    data(){
        return {
            form: {
                first_name: "",
                last_name: "",
                subject: "",
                email: "",
                message: "",
            }
        }
    }
}
</script>

<style scoped>
.-z-1 {
    z-index: -1;
}

.origin-0 {
    transform-origin: 0%;
}

input:focus ~ label,
input:not(:placeholder-shown) ~ label,
textarea:focus ~ label,
textarea:not(:placeholder-shown) ~ label,
select:focus ~ label,
select:not([value='']):valid ~ label {
    /* @apply transform; scale-75; -translate-y-6; */
    --tw-translate-x: 0;
    --tw-translate-y: 0;
    --tw-rotate: 0;
    --tw-skew-x: 0;
    --tw-skew-y: 0;
    transform: translateX(var(--tw-translate-x)) translateY(var(--tw-translate-y)) rotate(var(--tw-rotate))
    skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
    --tw-scale-x: 0.75;
    --tw-scale-y: 0.75;
    --tw-translate-y: -1.5rem;
}

input:focus ~ label,
select:focus ~ label {
    /* @apply text-black; left-0; */
    --tw-text-opacity: 1;
    color: rgba(0, 0, 0, var(--tw-text-opacity));
    left: 0px;
}
</style>
