<template>
    <v-form @submit.prevent="login">
        <v-overlay absolute :value="loading" class="overlay">
            <v-progress-linear
                indeterminate
            ></v-progress-linear>
        </v-overlay>

        <v-card-title>
            <h2>Stratum</h2>
        </v-card-title>
        <v-card-subtitle>
            <p>Sign in to continue</p>
        </v-card-subtitle>

        
        <v-card-text>
            <v-text-field
                v-model="email.model"
                :rules="email.rules"
                :error-messages="errors.email"
                autocomplete="email"
                type="email"
                label="Email"
                autofocus
                required
            ></v-text-field>

            <v-text-field
                v-model="password.model"
                :rules="password.rules"
                :error-messages="errors.password"
                label="Password"
                autocomplete="password"

                :type="password.hidden ? 'password' : 'text'"
                @click:append="() => (password.hidden = !password.hidden)"
                :append-icon="password.hidden ? 'mdi-eye-outline' : 'mdi-eye-off-outline'"
                required
            ></v-text-field>
        </v-card-text>

        <v-card-actions class="login-actions">
            <v-btn type="submit" large block depressed color="primary">
                Sign In
            </v-btn>

            <v-divider class="pm-6"></v-divider>

            <v-btn large block text class="mt-5">
                Reset Password
            </v-btn>
        </v-card-actions>
    </v-form>
</template>

<script lang="ts">
    import { Component, Vue } from 'vue-property-decorator'

    import login from '@/api/auth/login'
    import getAccountData from '@/api/account/getAccountData'
    import { httpErrorToHuman } from '@/api/http'

    interface ErrorMessages {
        [key: string]: Array<string>;
    }

    @Component
    export default class LoginForm extends Vue {

        loading = false

        email = {
            model: '',
            rules: [(v: any) => !!v || 'The email field is required.'],
        }

        password = {
            model: '',
            rules: [(v: any) => !!v || 'The password field is required.'],
            hidden: true,
        }

        errors: ErrorMessages = {
            email: [],
            password: [],
        }

        login(): void 
        {
            this.loading = true

            login({email: this.email.model, password: this.password.model})
                .then(response => {
                    // Fetch account information (email, name, etc)
                    getAccountData().then(response => {
                        // Dispatch it to store
                        this.$store.dispatch('user/setUserData', response)
                        
                        // Change the Authenticated state
                        this.$store.dispatch('auth/setAuthenticated', true)
                            .then(() => {
                                // Send the user to the dashboard
                                this.$router.push({ name: 'Dashboard' })
                                this.loading = false
                            })
                    })
                })

                .catch(error => {
                    this.loading = false

                    const err = httpErrorToHuman(error)
                    for (const message in err)
                    {
                        this.errors[message] = err[message][0]
                    }

                });
        }
    }
</script>

<style scoped>
    .login-actions {
        display: block;
        padding: 0 16px 0 16px;
    }

    .reset-btn {
        margin-left: 0 !important;
    }

    .overlay {
        display: block;
        overflow: hidden;
    }
</style>