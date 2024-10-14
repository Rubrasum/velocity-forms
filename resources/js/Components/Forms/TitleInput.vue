<template>
    <Field>
        <div class="mb-14">
            <div>
                <Label :name="name" :label="label" class="block text-5xl px-2 mb-6 leading-8 text-primary-text"/>
                <div class="relative mt-2">
                    <input
                        class="peer block w-full text-4xl border font-weight-lighter border-0 custom-slate px-3 pt-4 pb-3
                    text-white focus:ring-0 sm:leading-6
                    disabled:opacity-75 disabled:cursor-not-allowed"
                        :name="name"
                        :id="name"
                        :type="type"
                        :required="required"
                        :placeholder="placeholder"
                        :value="modelValue"
                        @input="$emit('update:modelValue', $event.target.value)"
                        :disabled="disabled"
                    />
                    <div class="absolute inset-x-0 bottom-0 border-t border-slate-500 peer-focus:border-t-2  peer-focus:border-white" aria-hidden="true" />
                </div>
            </div>

        </div>
        <Error :name="name" />
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
    }
});

const message = ref('');
</script>
<style scoped>
.custom-slate {
    background-color: #151e33; /* Custom color between slate-800 and slate-900 */
}
</style>
