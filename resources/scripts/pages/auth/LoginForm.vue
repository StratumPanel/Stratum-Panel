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
            <p>Sign in to continue to Stratum</p>
        </v-card-subtitle>

        
        <v-card-text>
            <v-text-field
                v-model="email"
                label="Email"
                autocomplete="email"
                type="email"

                :error-messages="emailErrors"

                autofocus
            ></v-text-field>

            <v-text-field
                v-model="password"
                label="Password"
                autocomplete="password"

                :type="hidePassword ? 'password' : 'text'"
                @click:append="() => (hidePassword = !hidePassword)"
                :append-icon="hidePassword ? 'mdi-eye-outline' : 'mdi-eye-off-outline'"

                :error-messages="passwordErrors"
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

    @Component
    export default class LoginForm extends Vue {

        loading = false

        email = ''
        password = ''
        hidePassword = true

        emailErrors = ''
        passwordErrors = ''

        login(): void 
        {
            this.loading = true

            this.validateForm()

            login({email: this.email, password: this.password})
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
                                this.loading = false;
                            })
                    })
                })

                .catch(err => {
                    this.loading = false;

                    this.emailErrors = 'Check your email'
                    this.passwordErrors = 'Check your password'
                });
        }

        validateForm(): void
        {
            this.emailErrors = ''
            this.passwordErrors = ''
            
            if (!/.+@.+/.test(this.email))
            {
                this.emailErrors = 'Malformed Email'
                return
            }

            if (this.password.length === 0)
            {
                this.passwordErrors = 'Password is required'
                return
            }
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