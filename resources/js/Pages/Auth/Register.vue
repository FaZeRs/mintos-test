<template>
    <div class="p-6 bg-indigo-800 min-h-screen flex justify-center items-center">
        <div class="w-full max-w-md">
            <logo class="block mx-auto w-full max-w-xs fill-white" height="100" />
            <form class="mt-8 bg-white rounded-lg shadow-lg overflow-hidden" @submit.prevent="submit">
                <div class="px-10 py-12">
                    <h1 class="text-center font-bold text-3xl">Registration</h1>
                    <div class="mx-auto mt-6 w-24 border-b-2" />
                    <text-input v-model="form.name" :errors="$page.errors.name" class="mt-10" label="Name" autofocus autocapitalize="on" />
                    <text-input v-model="form.email" :errors="$page.errors.email" class="mt-6" label="Email" type="email" autocapitalize="off" />
                    <text-input v-model="form.password" :errors="$page.errors.password" class="mt-6" label="Password" type="password" />
                    <text-input v-model="form.password_confirmation" class="mt-6" label="Password confirmation" type="password" />
                </div>
                <div class="px-10 py-4 bg-gray-100 border-t border-gray-200 flex justify-between items-center">
                    <inertia-link class="hover:underline" tabindex="-1" :href="route('login')">Login</inertia-link>
                    <loading-button :loading="sending" class="btn-indigo-500" type="submit">Register</loading-button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import LoadingButton from '@/Shared/LoadingButton'
    import Logo from '@/Shared/Logo'
    import TextInput from '@/Shared/TextInput'

    export default {
        components: {
            LoadingButton,
            Logo,
            TextInput,
        },
        props: {
            errors: Object,
        },
        data() {
            return {
                sending: false,
                form: {
                    name: null,
                    email: null,
                    password: null,
                    password_confirmation: null,
                },
            }
        },
        mounted() {
            document.title = 'Register | Mintos'
        },
        watch: {
            'form.email': function(newVal, oldVal) {
                const regex = /\S+@\S+\.\S+/;
                if(regex.test(newVal)) {
                    this.$inertia.post(this.route('validate.email'), { email: newVal })
                }
            },
        },
        methods: {
            submit() {
                this.sending = true
                this.$inertia.post(this.route('register.post'), this.form).then(() => this.sending = false)
            },
        },

    }
</script>
