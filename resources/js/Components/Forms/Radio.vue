<template>
    <Field>
        <div class="relative mt-2 flex flex-wrap">
            <Label :name="name" :label="label"
                   class="absolute -top-7 left-2 px-1 inline-block bg-white text-primary-text
                text-md font-weight-bolder z-10"/>
            <div class="flex flex-wrap justify-center -mx-2 bg-white border-0 w-full">
<!--                This is the 1/3 version. That's it. Thats the only reason there's 2 versions. -->
                <div v-if="isDivisibleByThree" v-for="option in options" :key="option.value"
                     class="w-full laptop-sm:w-1/3
                            px-2 mb-4 mt-2">
                    <input
                        :id="`${name}-${option.value}`"
                        :name="name"
                        type="radio"
                        :value="option.value"
                        v-model="localModelValue"
                        :disabled="disabled"
                        class="sr-only peer"
                    />
                    <label
                        :for="`${name}-${option.value}`"
                        class="text-base laptop-sm:text-lg py-1.5 laptop-sm:py-2
                               flex items-center justify-center w-full h-full px-4 bg-white text-primary-text font-subtitle
                               rounded-sm border border-accent transition-all duration-300 cursor-pointer
                               hover:bg-secondary-bg hover:text-white hover:border-primary-bg
                               peer-checked:bg-secondary-bg peer-checked:border-accent peer-checked:text-white
                               peer-disabled:opacity-50 peer-disabled:cursor-not-allowed text-base
                              "
                    >
                        {{ option.label }}
                    </label>
                </div>
                <div v-else v-for="option in options" :key="option.value" class="px-2 mb-4 mt-2 w-1/2">
                    <input
                        :id="`${name}-${option.value}`"
                        :name="name"
                        type="radio"
                        :value="option.value"
                        v-model="localModelValue"
                        :disabled="disabled"
                        class="sr-only peer"
                    />
                    <label
                        :for="`${name}-${option.value}`"
                        class="text-base laptop-sm:text-lg py-1.5 laptop-sm:py-2
                               flex items-center justify-center w-full h-full px-4 bg-white text-primary-text font-subtitle
                               rounded-sm border border-accent transition-all duration-300 cursor-pointer text-center
                               hover:bg-secondary-bg hover:text-white hover:border-primary-bg
                               peer-checked:bg-secondary-bg peer-checked:border-accent peer-checked:text-white
                               peer-disabled:opacity-50 peer-disabled:cursor-not-allowed
                              "
                    >
                        {{ option.label }}
                    </label>
                </div>

            </div>
        </div>
    </Field>
</template>


<script setup>
import { ref, computed, watch } from 'vue';
import Field from './Field.vue';
import Label from './Label.vue';

const props = defineProps({
    name: {
        type: String,
        required: true,
    },
    modelValue: {
        type: String,
        default: '',
    },
    label: {
        type: String,
        default: null,
    },
    disabled: {
        type: Boolean,
        default: false,
    },
    options: {
        type: Array,
        required: true,
        // Each option should be an object with 'value', 'label', and 'content' properties
    },
});

const isDivisibleByThree = computed(() => props.options.length % 3 === 0);
const emit = defineEmits(['update:modelValue']);

const localModelValue = computed({
    get: () => props.modelValue,
    set: (value) => emit('update:modelValue', value)
});

const showContent = ref(false);

const activeOption = computed(() =>
    props.options.find(option => option.value === localModelValue.value)
);

watch(localModelValue, (newValue, oldValue) => {
    if (newValue !== oldValue) {
        showContent.value = false;
        setTimeout(() => {
            showContent.value = true;
        }, 300);
    }
});

// Initialize showContent if there's a default selected value
if (props.modelValue) {
    showContent.value = true;
}
</script>
