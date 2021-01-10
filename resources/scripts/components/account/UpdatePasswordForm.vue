<template>
    <v-col cols="12" md="6">
        <v-card
            outlined
        >
            <v-card-title>
                Update Password
            </v-card-title>

            <v-card-text class="form">
                <v-text-field
                    label="Current Password"
                ></v-text-field>

                <v-row justify="space-between">
                    <v-col cols="5" class="p-0">
                        <v-text-field
                            label="New Password"
                        ></v-text-field>
                    </v-col>

                    <v-col cols="5" class="p-0">
                        <v-text-field
                            label="Confirm New Password"
                        ></v-text-field>
                    </v-col>
                </v-row>
            </v-card-text>

            <v-card-actions>
                <v-btn text color="primary">Update</v-btn>
            </v-card-actions>
        </v-card>
    </v-col>
</template>

<script lang="ts">
    import { Component, Vue } from 'vue-property-decorator';

    @Component
    export default class UpdatePasswordForm extends Vue {
        
    }
</script>

<style scoped>
    .form {
        padding-bottom: 0px;
    }

    .p-0 {
        padding: 0 !important;
    }
</style>