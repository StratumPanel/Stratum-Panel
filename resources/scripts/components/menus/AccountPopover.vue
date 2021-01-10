<template>
    <div class="text-center">
        <v-menu v-model="isVisible" :close-on-content-click="false" :nudge-width="200" offset-x>
            <template v-slot:activator="{ on, attrs }">
                <v-btn icon v-bind="attrs" v-on="on">
                    <v-icon dark>
                        mdi-account-circle
                    </v-icon>
                </v-btn>
            </template>

            <v-card>
                <v-overlay :value="loading" class="overlay" absolute>
                    <v-progress-linear
                        indeterminate
                    ></v-progress-linear>
                </v-overlay>

                <v-list>
                    <v-list-item>
                        <v-list-item-avatar>
                            <v-icon large>
                                mdi-account-circle
                            </v-icon>
                        </v-list-item-avatar>

                        <v-list-item-content>
                            <v-list-item-title>{{ userData.name }}</v-list-item-title>
                            <v-list-item-subtitle>{{ userData.admin ? 'Administrator' : 'Standard Account' }}</v-list-item-subtitle>
                        </v-list-item-content>
                    </v-list-item>
                </v-list>

                <v-divider></v-divider>

                <v-list>
                    <v-list-item>
                        <v-list-item-action>
                            <v-switch v-model="darkMode" inset></v-switch>
                        </v-list-item-action>
                        <v-list-item-title>Dark mode</v-list-item-title>
                    </v-list-item>
                </v-list>

                <v-card-actions>
                    <v-spacer></v-spacer>

                    <v-btn text @click="isVisible = false">
                        Close
                    </v-btn>
                    <v-btn color="primary" text @click="logout">
                        Sign Out
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-menu>
    </div>
</template>

<script lang="ts">
    import { Component, Watch, Vue } from 'vue-property-decorator'
    import { mapState } from 'vuex'

    import { AccountData } from '@/api/account/getAccountData'
    import logout from '@/api/auth/logout'

    @Component({
        computed: {
            ...mapState('user', ['userData'])
        }
    })
    export default class AccountPopover extends Vue {
        private userData!: AccountData

        private isVisible: boolean = false
        private darkMode: boolean = this.$vuetify.theme.dark
        private loading: boolean = false

        @Watch('darkMode')
        themeChanged(payload: boolean): void
        {
            this.$vuetify.theme.dark = payload
        }

        logout(): void
        {
            this.loading = true

            logout()
                .then(() => {
                    this.loading = false

                    this.$store.dispatch('auth/setAuthenticated', false)
                        .then(() => {
                            this.$router.push({ name: 'Login' })
                        })
                })
        }
    }
</script>

<style scoped>
    .overlay {
        display: block;
        overflow: hidden;
    }
</style>