<template>
    <v-row justify="center" class="mt-4">
        <div class="text-center">
            <v-avatar size="90" color="primary">
                <v-icon class="avatar" dark>
                    mdi-account
                </v-icon>
            </v-avatar>
            <h1>Welcome, {{ userData.name }}</h1>
        </div>
    </v-row>
</template>

<script lang="ts">
    import { Component, Vue } from 'vue-property-decorator';
    import { mapState } from 'vuex'

    import { AccountData } from '@/api/account/getAccountData'

    @Component({
        computed: {
            ...mapState('user', ['userData'])
        }
    })
    export default class Header extends Vue {
        private userData!: AccountData
        
    }
</script>

<style scoped>
    .avatar {
        font-size: 60px;
    }
</style>