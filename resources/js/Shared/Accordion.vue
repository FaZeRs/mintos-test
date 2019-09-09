<template>
    <article class="border-b">
        <div v-bind:class="[active ? 'bg-gray-100 border-indigo-500' : 'border-transparent']"  class="border-l-2">
            <header class="flex justify-between items-center p-5 pl-8 pr-8 cursor-pointer select-none">
                            <span v-bind:class="[active ? 'text-indigo-500' : 'text-gray-700']" class="font-thin text-xl">
                                {{ item.title }}
                            </span>
                <div v-show="active" class="rounded-full border border border-indigo-500 w-7 h-7 flex items-center justify-center bg-indigo-500" @click.prevent="active = !active">
                    <!-- icon by feathericons.com -->
                    <svg aria-hidden="true" data-reactid="281" fill="none" height="24" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                        <polyline points="18 15 12 9 6 15">
                        </polyline>
                    </svg>
                </div>
                <div v-show="!active" class="rounded-full border border-gray-500 w-7 h-7 flex items-center justify-center" @click.prevent="active = !active">
                    <!-- icon by feathericons.com -->
                    <svg aria-hidden="true" class="" data-reactid="266" fill="none" height="24" stroke="#606F7B" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                        <polyline points="6 9 12 15 18 9">
                        </polyline>
                    </svg>
                </div>
            </header>
            <div v-show="active">
                <div class="pl-8 pr-8 pb-5 text-gray-700">
                   {{ item.description }}
                    <div class="flex mt-2">
                        <div class="text-gray-500">{{ item.date }}</div>
                        <a class="no-underline text-gray-500 hover:text-indigo-600 focus:text-indigo-600 ml-2" :href="item.link" target="_blank">Read more ➔</a>
                    </div>
                </div>
            </div>
        </div>
    </article>
</template>

<script>
    export default {
        props: {
            item: Object,
        },
        data() {
            return {
                active: false,
            }
        }
    }
</script>
