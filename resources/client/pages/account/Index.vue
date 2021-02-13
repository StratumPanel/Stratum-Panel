<template>
    <div>
        <account-header />

        <v-row>
            <update-profile />

            <update-password />

            <account-security />

            <update-two-factor-auth />
        </v-row>
    </div>
</template>

<script lang="ts">
    import { Component, Vue } from 'vue-property-decorator'

    import { AccountHeader, 
             UpdateProfile, 
             UpdatePassword, 
             AccountSecurity, 
             UpdateTwoFactorAuth,
    } from '@/components/account'

    @Component({
        components: {
            AccountHeader,
            UpdateProfile,
            UpdatePassword,
            AccountSecurity,
            UpdateTwoFactorAuth,
        }
    })
    export default class Account extends Vue {
        
    }
</script>

<style scoped>

</style>