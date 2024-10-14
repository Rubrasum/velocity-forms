<template>
    <Field :select="true">
        <div class="relative z-20">
            <Label :name="name" :label="label"
                   class="
                          -top-2.5 laptop-sm:-top-3
                          absolute left-2 inline-block bg-white px-1
                          text-primary-text text-base font-weight-bolder focus:ring-white
                          z-0
                         "
            />
            <select
                :name="name"
                :id="name"
                :value="modelValue"
                :required="required"
                class="border border-accent w-full bg-white text-base text-primary-text ring-inset ring-accent
                       focus:ring-2 focus:ring-inset focus:ring-secondary-accent disabled:opacity-50
                       disabled:cursor-not-allowed z-30 py-[0.55rem]"
                @change="$emit('update:modelValue', $event.target.value)"
                :disabled="disabled"
                options="options">
                <option :value="''" :selected="modelValue === ''" class="px-4 w-full bg-white text-md text-primary-text" >{{ placeholder }}</option>
                <option
                    class="px-4 w-full bg-white text-md text-primary-text"
                    v-for="option in options"
                    :key="option.key"
                    :value="option.value"
                    :selected="option.value === modelValue"
                >
                    {{ option.key }}
                </option>
            </select>
            <Error :name="name" />
        </div>

    </Field>
</template>

<script setup>
import Field from './Field.vue';
import Label from './Label.vue';
import Error from './Error.vue';
import {usePage} from "@inertiajs/vue3";
import {computed, ref} from "vue";


const page = usePage();

const props = defineProps({
    name: {
        type: String,
        required: true,
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
        type: Number,
        default: 0,
    },
    options : {
        type: Array,
        required: true,
    },
    label : {
        type: String,
        default: null,
    },
    disabled : {
        type: Boolean,
        default: false,
    }
});

const message = ref('');
</script>
