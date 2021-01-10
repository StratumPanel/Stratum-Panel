<template>
    <div>
        <account-header />

        <v-row>
            <update-profile-form />

            <update-password-form />

            <update-two-factor-auth-form />
        </v-row>
    </div>
</template>

<script lang="ts">
    import { Component, Vue } from 'vue-property-decorator'

    // Components
    import AccountHeader from '@/components/account/Header.vue'
    import UpdateProfileForm from '@/components/account/UpdateProfileForm.vue'
    import UpdatePasswordForm from '@/components/account/UpdatePasswordForm.vue'
    import UpdateTwoFactorAuthForm from '@/components/account/UpdateTwoFactorAuthForm.vue'

    @Component({
        components: {
            AccountHeader,
            UpdateProfileForm,
            UpdatePasswordForm,
            UpdateTwoFactorAuthForm,
        }
    })
    export default class Account extends Vue {
        
    }
</script>

<style scoped>

</style>