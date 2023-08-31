// *
----------------------------------------------------------------------------------------*
//
<template>
    <div class="h-full bg-white w-full px-4">
        <van-form @submit="emits('onSubmit', answers_model)">
            <van-cell-group inset>
                <van-field
                    name="name"
                    label-align="top"
                    :placeholder="$t('placeholders.entryName')"
                    :label="questions.name"
                    v-model="answers_model.name"
                    :rules="[
                        {
                            required: true,
                            message: $t('placeholders.requiredName'),
                        },
                    ]"
                />
                <van-field
                    name="birth_date"
                    label-align="top"
                    :placeholder="$t('placeholders.selectDate')"
                    :label="questions.birth_date"
                    v-model="answers_model.birth_date"
                    is-link
                    readonly
                    :rules="[
                        {
                            required: true,
                            message: $t('placeholders.required_b_day'),
                        },
                    ]"
                    @click="showPickerBirthDate = true"
                />
                <van-popup v-model:show="showPickerBirthDate" position="bottom">
                    <van-date-picker
                        :min-date="minDate"
                        :max-date="maxDate"
                        v-model="currentDateBirth"
                        @confirm="onConfirmBirthDate"
                        @cancel="showPickerBirthDate = false"
                    />
                </van-popup>
                <van-field
                    v-model="answers_model.duration_cycle_last"
                    name="duration_cycle_last"
                    :label="questions.duration_cycle_last"
                    label-align="top"
                    :placeholder="$t('placeholders.selectNum')"
                    :rules="[
                        {
                            required: true,
                            message: $t('placeholders.required_cycle'),
                        },
                    ]"
                    readonly
                    is-link
                    @click="showPickerCycle = true"
                />
                <van-popup v-model:show="showPickerCycle" position="bottom">
                    <van-picker
                        v-model="selectedValueCycle"
                        :columns="columns"
                        @confirm="onConfirmCycle"
                        @cancel="showPickerCycle = false"
                    />
                </van-popup>
                <van-field
                    v-model="answers_model.duration_period_last"
                    name="duration_period_last"
                    :label="questions.duration_period_last"
                    label-align="top"
                    :placeholder="$t('placeholders.selectNum')"
                    :rules="[
                        {
                            required: true,
                            message: $t('placeholders.required_period'),
                        },
                    ]"
                    readonly
                    is-link
                    @click="showPickerPeriod = true"
                />
                <van-popup v-model:show="showPickerPeriod" position="bottom">
                    <van-picker
                        v-model="selectedValuePeriod"
                        :columns="columns"
                        @confirm="onConfirmPeriod"
                        @cancel="showPickerPeriod = false"
                    />
                </van-popup>
                <template v-if="entry === 1">
                    <van-field
                        v-model="answers_model.last_period_date"
                        name="last_period_date"
                        :label="questions.last_period_date"
                        label-align="top"
                        :placeholder="$t('placeholders.selectDate')"
                        :rules="[
                            {
                                required: true,
                                message: $t('placeholders.required_periodDate'),
                            },
                        ]"
                        readonly
                        is-link
                        @click="showPickerDate = true"
                    />
                    <van-popup v-model:show="showPickerDate" position="bottom">
                        <van-date-picker
                            v-model="currentDatePeriod"
                            :min-date="minDate"
                            :max-date="maxDate"
                            @confirm="onConfirmDate"
                            @cancel="showPickerDate = false"
                        />
                    </van-popup>
                </template>
            </van-cell-group>
            <van-button
                type="primary"
                native-type="submit"
                size="large"
                class="mt-4"
            >
                {{ $t("buttons.save") }}
            </van-button>
        </van-form>
    </div>
</template>

<script setup>
import appBridge from "@/mixins/app-bridge";
import { computed, ref, watch } from "vue";
import { useStore } from "vuex";
import secondaryFunctions from "@/mixins/secondary-functions";

const { questions, answers, entry, currentDate } = defineProps({
    to: String,
    questions: Object,
    answers: Object,
    entry: Number,
    currentDate: Object,
});

const emits = defineEmits(["onSubmit"]);

const store = useStore();

const locale = computed(() => store.state.Auth.locale);

const answers_model = ref(answers);

watch(locale, (newLocale, oldLocale) => {
    store.dispatch("Auth/getQuestions", newLocale);
});

const currentDateBirth = ref(answers.birth_date.split("-"));
const currentDatePeriod = ref(answers.last_period_date.split("-"));
const selectedValueCycle = ref([answers.duration_cycle_last]);
const selectedValuePeriod = ref([answers.duration_period_last]);

const showPickerCycle = ref(false);
const showPickerPeriod = ref(false);
const showPickerDate = ref(false);
const showPickerBirthDate = ref(false);

const minDate = new Date(currentDate.getFullYear() - 70, 0, 1);
const maxDate = currentDate;

const columns = secondaryFunctions.methods.getColumn(1, 31);

function onConfirmCycle({ selectedOptions }) {
    answers_model.value.duration_cycle_last = selectedOptions[0]?.text;
    showPickerCycle.value = false;
}
function onConfirmPeriod({ selectedOptions }) {
    answers_model.value.duration_period_last = selectedOptions[0]?.text;
    showPickerPeriod.value = false;
}
function onConfirmDate({ selectedValues }) {
    answers_model.value.last_period_date = selectedValues.join("-");
    showPickerDate.value = false;
}

function onConfirmBirthDate({ selectedValues }) {
    answers_model.value.birth_date = selectedValues.join("-");
    showPickerBirthDate.value = false;
}
</script>

<style scoped>
.van-hairline-unset--top-bottom::after {
    border-color: red;
}
</style>
// *
----------------------------------------------------------------------------------------*
//
