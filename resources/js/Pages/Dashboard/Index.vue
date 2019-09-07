<template>
    <layout title="Dashboard">
        <h1 class="mb-8 font-bold text-3xl">Dashboard</h1>
        <section class="flex">
            <div class="p-2" v-for="(count, word) in popularWords" :key="word">
                <div class="inline-flex items-center bg-white leading-none text-purple-dark rounded-full p-2 shadow text-teal text-sm">
                    <span class="inline-flex bg-indigo-dark text-white rounded-full h-6 px-3 justify-center items-center">{{ count }}</span>
                    <span class="inline-flex px-2">{{ word }}</span>
                </div>
            </div>
        </section>
        <section class="shadow mt-2">
            <div v-for="(item, key) in feedItems" :key="key">
                <accordion :item="item"></accordion>
            </div>
        </section>
    </layout>
</template>

<script>
    import Layout from '@/Shared/Layout'
    import Accordion from '@/Shared/Accordion'

    export default {
        components: {
            Layout,
            Accordion
        },
        props: {
            feedItems: Array,
            popularWords: Array,
        },
    }
</script>
