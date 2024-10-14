<template>
    <div v-if="errorMessage" >
        <p class="text-remax-red text-sm mt-2 ml-2 flex items-center"><ExclamationCircleIcon class="h-6 w-6 inline-block" aria-hidden="true" />&nbsp;{{ errorMessage }}</p>
    </div>
</template>

<script setup>
import {computed, ref} from 'vue';
import {usePage} from "@inertiajs/vue3";
import { ExclamationCircleIcon } from '@heroicons/vue/24/outline';
const props = defineProps({
    name: {
        type: String,
        required: true,
    },
});

const page = usePage();

// Compute the error message for the given field name
const errorMessage = computed(() => {
    return page.props.errors?.[props.name] || '';
});
</script>
