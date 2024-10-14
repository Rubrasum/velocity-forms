<template>
    <button type="submit"
            class="mt-2 laptop-sm:mt-8
                   w-48 tablet-lg:w-72 laptop-lg:w-96
                   mx-auto
                   bg-secondary-accent text-white uppercase text-base py-2 px-10 rounded-xs
                   border-slate-400 border-2
                   hover:bg-white hover:text-secondary-accent mb-2
                   transition-colors duration-300
                  "
            :disabled="disabled"
    >
        <slot></slot>
    </button>
</template>

<script setup>
defineProps ({
    disabled: {
        type: Boolean,
        default: false,
    }
});

</script>
