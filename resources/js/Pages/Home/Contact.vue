<template>
    <div class="bg-gray-100 pt-8 lg:pt-16 pb-8" id="contact">
        <titles>Contact Us</titles>
        <div class="w-full lg:w-1/2 px-3 mx-auto mt-6 lg:mt-12 mb-8 lg:mb-12">
            <div v-if="is_sent" class="p-3 border border-green-600 bg-green-200 text-green-600 mb-4">
                Your message was sent successfully.
            </div>
            <div class="flex flex-row space-x-4">
                <div class="relative z-0 w-full mb-5">
                    <input
                        type="text"
                        id="name"
                        v-model="form.first_name"
                        placeholder=" "
                        class="pt-1 md:pt-3 pb-1 md:pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-gray-700 border-gray-500"
                        :class="errors.first_name?'border-red-600':null"
                    />
                    <label for="name" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Fist Name*</label>
                    <span v-if="errors.first_name" class="text-sm text-red-600">First Name is required</span>
                </div>
                <div class="relative z-0 w-full">
                    <input
                        type="text"
                        id="lname"
                        v-model="form.last_name"
                        placeholder=" "
                        class="pt-1 md:pt-3 pb-1 md:pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-gray-700 border-gray-500"
                    />
                    <label for="lname" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Last Name</label>
                </div>
            </div>
            <div class="flex flex-row space-x-4 pt-9">
                <div class="relative z-0 w-full mb-5">
                    <input
                        type="text"
                        id="subject"
                        v-model="form.subject"
                        placeholder=" "
                        class="pt-1 md:pt-3 pb-1 md:pb-2 block w-full px-0 mt-0 bg-transparent focus:bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-gray-700 border-gray-500"
                        :class="errors.subject?'border-red-600':null"
                    />
                    <label for="subject" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Subject*</label>
                    <span v-if="errors.subject" class="text-sm text-red-600">Subject is required</span>
                </div>
                <div class="relative z-0 w-full">
                    <input
                        type="email"
                        id="email"
                        v-model="form.email"
                        placeholder=" "
                        class="pt-1 md:pt-3 pb-1 md:pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-gray-700 border-gray-500"
                        :class="errors.email?'border-red-600':null"
                    />
                    <label for="email" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Email*</label>
                    <span v-if="errors.email" class="text-sm text-red-600">{{error_message}}</span>
                </div>
            </div>
            <div class="relative z-0 w-full mb-5">
                <textarea
                    id="message"
                    v-model="form.message"
                    cols="4"
                    class="pt-1 md:pt-3 pb-1 md:pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-gray-700 border-gray-500"
                    :class="errors.message?'bg-red-600':null"
                >
                    {{form.message}}
                </textarea>
                <label for="message" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Message*</label>
                <span v-if="errors.message" class="text-sm text-red-600">Message is required</span>
            </div>
            <button
                id="button"
                type="button"
                class="w-full px-6 py-3 mt-2 md:mt-3 text-base md:text-lg text-white transition-all duration-500 ease-linear shadow outline-none bg-gray-500 hover:bg-gray-600 hover:shadow-lg focus:outline-none"
                @click="sendMail"
            >
               <span v-if="!is_sending"><font-awesome-icon :icon="['fas', 'paper-plane']"/> Message Us</span>
                <div v-if="is_sending" class="lds-hourglass"></div>
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
            },
            errors: {
                first_name: false,
                subject: false,
                email: false,
                message: false,
            },
            error_message: "",
            is_sending: false,
            is_sent: false
        }
    },
    methods: {
        sendMail(){
            this.is_sending = true;
            this.errors = {
                first_name: false,
                subject: false,
                email: false,
                message: false,
            }
            this.validateForm();

            axios.post('/contact-us', this.form).then(response => {
                if (response.data.success){
                    this.is_sending = false;
                    this.is_sent = true;

                    this.form = {
                        first_name: "",
                        last_name: "",
                        subject: "",
                        email: "",
                        message: "",
                    }

                    setTimeout(() => this.is_sent = false, 7000);
                }
            }).catch(err => {
                this.is_sending = false;
                console.log(err.response)
            })
        },
        validateForm(){
            if (this.form.first_name.length === 0){
                this.errors.first_name = true;
                this.is_sending = false;
                return false;
            }

            if (this.form.subject.length === 0){
                this.errors.subject = true;
                this.is_sending = false;
                return false;
            }

            if (this.form.email.length === 0){
                this.error_message = "Email is required";
                this.is_sending = false;
                this.errors.email = true;
                return false
            }else {
                if (this.ValidateEmail(this.form.email) === false){
                    this.error_message = "Please provide a valid email address";
                    this.is_sending = false;
                    this.errors.email = true;
                    return false;
                }
            }

            if (this.form.message.length === 0){
                this.errors.message = true;
                this.is_sending = false;
                return false;
            }
        },
        ValidateEmail(inputText){
            var mailformat = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if(inputText.match(mailformat))
            {
                return true;
            }
            else
            {
                return false;
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
.lds-hourglass {
    display: inline-block;
    position: relative;
    width: 30px;
    height: 30px;
}
.lds-hourglass:after {
    content: " ";
    display: block;
    border-radius: 50%;
    width: 0;
    height: 0;
    margin: 8px;
    box-sizing: border-box;
    border: 15px solid #fff;
    border-color: #fff transparent #fff transparent;
    animation: lds-hourglass 1.2s infinite;
}
@keyframes lds-hourglass {
    0% {
        transform: rotate(0);
        animation-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
    }
    50% {
        transform: rotate(900deg);
        animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
    }
    100% {
        transform: rotate(1800deg);
    }
}
</style>
