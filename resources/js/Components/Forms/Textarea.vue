<template>
    <Field>
        <div class="relative">
            <Label :name="name" :label="label" :class="['absolute -top-7 left-2 inline-block px-1 bg-white text-primary-text\n'+
'                text-md font-weight-bolder z-10']"/>
            <textarea
                :class="['block w-full rounded-sm border-0 mx-0 px-2 my-2 py-2 bg-white text-md font-weight-bolder shadow-sm border border-accent ' +
                        'ring-1 ring-inset ring-accent placeholder:text-slate-900 focus:ring-2 focus:ring-inset focus:ring-secondary-bg h-32', height]"
                :name="name"
                :id="name"
                :required="required"
                :placeholder="placeholder"
                :value="modelValue"
                @input="$emit('update:modelValue', $event.target.value)"
            >
            </textarea>
        </div>
        <Error :name="name" />
    </Field>
</template>

<script setup>
import Field from './Field.vue';
import Label from './Label.vue';
import Error from './Error.vue';
import {usePage} from "@inertiajs/vue3";
import {computed, onMounted, ref} from "vue";

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
    height: {
        type: String,
        default: '48',
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
    }
});

</script>
