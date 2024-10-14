<template>
    <label class="text-sm laptop-sm:text-base"
        for="{{ name }}" name="{{ name }}"
    >
        {{ label ? label.replace(/\b\w/g, char => char.toUpperCase()) : name.replace(/\b\w/g, char => char.toUpperCase()) }}
    </label>
</template>

<script setup>

import {computed} from "vue";

const props = defineProps({
    name: {
        type: String,
        required: true,
        default: "name missing"
    },
    label : {
        type: String,
        default: null,
    }
});

const name = computed(() => props.name);

</script>
