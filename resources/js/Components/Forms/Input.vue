<template>
    <Field>
        <div class="relative">
            <div v-if="type === 'price'" class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 top-0.5">
                <span class="text-primary-text sm:text-base">$</span>
            </div>
            <div v-if="type === 'percent'" class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2 top-0.5">
                <span class="text-primary-text sm:text-base">%</span>
            </div>

            <Label :name="name" :label="label"
                   class="-top-2.5 laptop-sm:-top-3
                          absolute left-2 inline-block px-1 bg-white text-primary-text
                          text-md font-weight-bolder z-10"/>
            <input
                class="block w-full rounded-xs border-0 pt-3 pb-2 bg-primary-bg text-base font-weight-bolder shadow-sm ring-1
                    ring-inset ring-accent placeholder:text-secondary-text focus:ring-2 focus:ring-inset bg-white
                    focus:ring-secondary-accent sm:leading-6 disabled:opacity-50 disabled:cursor-not-allowed tracking-widest"
                :class="type === 'price' ? 'pl-6' : type === 'percent' ? 'pl-3 pr-6 ' : 'pl-3 pr-3'"
                :name="name"
                :id="name"
                :type="type === 'price' || type === 'percent' ? 'number' : type"
                :required="required"
                :placeholder="placeholder"
                :value="modelValue"
                @input="$emit('update:modelValue', $event.target.value)"
                :step="type === 'datetime-local' ? '1' : step"
                :disabled="disabled"
            />
        </div>
        <Error :name="name" />

    </Field>
</template>

<script setup>
import Field from './Field.vue';
import Label from './Label.vue';
import Error from './Error.vue';
import {onMounted, ref} from "vue";
import {usePage} from "@inertiajs/vue3";

const props = defineProps({
    name: {
        type: String,
        required: true,
    },
    type: {
        type: String,
        default: 'text',
    },
    required: {
        type: Boolean,
        default: false,
    },
    placeholder: {
        type: String,
        default: '',
    },
    modelValue : {
        type: String,
        default: '',
    },
    label : {
        type: String,
        default: null,
    },
    disabled : {
        type: Boolean,
        default: false,
    },
    step : {
        type: Number,
        default: undefined,
    }
});

const message = ref('');

const page = usePage();

onMounted(() => {


    /* This is for glowing when autofilled */
    const element = document.getElementById(props.name);

    if (element && page.props.autofill && page.props.autofill?.[props.name]) {
        console.log('autofill found');
        element.classList.add('shadow-light');

        // Remove the class after the animation completes (2s * 3 iterations)
        setTimeout(() => {
            element.classList.remove('shadow-light');
        }, 6000);
    }
});
</script>

<style scoped>
/* This is for glowing when autofilled */
@keyframes shadowGlow {
    0%, 100% {
        box-shadow: 0 0 0 rgba(213, 185, 178, 0);
        text-shadow: 0 0 0 rgba(255, 255, 255, 0);
    }
    50% {
        box-shadow: 0 0 10px rgba(213, 185, 178, 1), 0 0 10px rgba(213, 185, 178, 1);
        text-shadow: 0 0 10px rgba(255, 255, 255, 0.8), 0 0 20px rgba(255, 255, 255, 0.6), 0 0 30px rgba(255, 255, 255, 0.4);
    }
}

.shadow-light {
    background-image: linear-gradient(90deg, #0D111C, #D5B9B2, #0D111C);
    background-size: 200%;
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    border: 1px solid #D5B9B2;
    animation: shadowGlow 2s ease-in-out 3;
}
</style>
