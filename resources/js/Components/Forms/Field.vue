<template>
    <div class="mb-1 tablet-lg:mb-3
                mb-3 border-x-0 border-b-0 border-t-accent bg-white w-full px-0"
        :class="props.select ? 'border-none mt-0 tablet-lg:mt-4 ' : 'mt-2 tablet-lg:mt-6'" >
        <slot></slot>
    </div>
</template>
<script setup>
const props = defineProps({
    select: {
        type: Boolean,
        required: false,
    }
});
</script>
