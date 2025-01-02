<template>
  <div>
    Hi I'm joseph.
  </div>
</template>

<script setup>
import HomeLayout from '../Layouts/HomeLayout.vue';
import AppLayout from '../../Layouts/AppLayout_old.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import LogoutOtherBrowserSessionsForm from './Partials/LogoutOtherBrowserSessionsForm.vue';
import SectionBorder from '../../Components/Default/SectionBorder.vue';
import TwoFactorAuthenticationForm from './Partials/TwoFactorAuthenticationForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';

defineProps({
  confirmsTwoFactorAuthentication: Boolean,
  sessions: Array,
});
import {Head, Link, useForm, usePage} from '@inertiajs/vue3';

defineOptions({ layout: HomeLayout })
const page = usePage();


</script>