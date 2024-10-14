<template>
    <Field>
        <div class="flex space-x-2">
            <div class="relative flex flex-1">
                <Label :name="name" :label="label"
                       class="-top-2.5 laptop-sm:-top-3
                              absolute left-2 inline-block px-1 bg-white text-primary-text text-md font-weight-bolder z-10"/>
                <div class="flex-1 relative">
                    <input
                        class="w-full rounded-xs border-0 pt-3 pb-2 bg-primary-bg text-base font-weight-bolder
                   shadow-sm ring-1 ring-inset ring-accent placeholder:text-secondary-text focus:ring-2
                   focus:ring-inset bg-white focus:ring-secondary-accent sm:leading-6 disabled:opacity-50
                   disabled:cursor-not-allowed tracking-widest pl-6"
                        :name="name"
                        :id="name"
                        type="number"
                        :required="required"
                        :placeholder="placeholder"
                        :value="numberValue"
                        @input="updateNumber"
                        @blur="onNumberBlur"
                        :disabled="disabled"
                        :step="step"
                    />
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 top-0.5">
                        <span class="text-primary-text sm:text-base">$</span>
                    </div>
                </div>
                <div class="w-24
                            relative">
                    <input
                        class="w-full rounded-xs border-0 pt-3 pb-2 pl-3 pr-6 bg-primary-bg text-base font-weight-bolder
                   shadow-sm ring-1 ring-inset ring-accent placeholder:text-secondary-text focus:ring-2
                   focus:ring-inset bg-white focus:ring-secondary-accent sm:leading-6 disabled:opacity-50
                   disabled:cursor-not-allowed tracking-widest"
                        :name="name + '_percent'"
                        :id="name + '_percent'"
                        type="number"
                        :required="required"
                        :placeholder="placeholder2"
                        :value="percentValue"
                        @input="updatePercent"
                        @blur="onPercentBlur"
                        :disabled="disabled"
                        :step="1"
                    />
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2 top-0.5">
                        <span class="text-primary-text sm:text-base">%</span>
                    </div>
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
import {ref, watch} from 'vue';

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
    placeholder2: {
        type: String,
        default: '',
    },
    modelValue: {
        type: [String, Number],
        default: ''
    },
    label: {
        type: String,
        default: null,
    },
    disabled: {
        type: Boolean,
        default: false,
    },
    step: {
        type: Number,
        default: undefined,
    },
    input: {
        type: String,
        default: '',
    },
    calculatePercentFormula: {
        type: Function,
        default: (number, total) => (number / total) * 100,
    },
    calculateNumberFormula: {
        type: Function,
        default: (percent, total) => (percent / 100) * total,
    },
});

const emit = defineEmits(['update:modelValue']);

const numberValue = ref(props.modelValue);
const percentValue = ref('');

const updateNumber = (event) => {
    numberValue.value = event.target.value;
    calculatePercent();
};

const updatePercent = (event) => {
    percentValue.value = event.target.value;
    calculateNumber();
};

const calculatePercent = () => {
    if (numberValue.value && !isNaN(numberValue.value) && props.input) {
        const calculatedPercent = props.calculatePercentFormula(Number(numberValue.value), Number(props.input));
        percentValue.value = calculatedPercent.toFixed(2);
    }
};

const calculateNumber = () => {
    if (percentValue.value && !isNaN(percentValue.value) && props.input) {
        const calculatedNumber = props.calculateNumberFormula(Number(percentValue.value), Number(props.input));
        numberValue.value = calculatedNumber.toFixed(2);
        emit('update:modelValue', numberValue.value);
    }
};

const onNumberBlur = () => {
    emit('update:modelValue', numberValue.value);
};

const onPercentBlur = () => {
    calculateNumber();
};

watch(() => props.modelValue, (newValue) => {
    if (newValue !== numberValue.value) {
        numberValue.value = newValue;
        calculatePercent();
    }
}, { immediate: true });

watch(() => props.input, () => {
    calculatePercent();
});

// Debugging
watch([() => props.modelValue, () => numberValue.value, () => percentValue.value, () => props.input],
    ([modelValue, number, percent, input]) => {
        console.log('Values updated:', { modelValue, number, percent, input });
    }
);
</script>
