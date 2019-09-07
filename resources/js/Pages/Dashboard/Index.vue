<template>
    <layout title="Dashboard">
        <h1 class="mb-8 font-bold text-3xl">Dashboard</h1>
        <section class="shadow">
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
        },
    }
</script>
