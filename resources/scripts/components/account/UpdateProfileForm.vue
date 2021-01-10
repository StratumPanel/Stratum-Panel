<template>
    <v-col cols="12" md="6">
        <v-card
            outlined
        >
            <v-card-title>
                Personal Information
            </v-card-title>

            <v-card-text class="form">
                <v-text-field
                    label="Name"
                ></v-text-field>
                <v-text-field
                    label="Email"
                ></v-text-field>
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
    export default class UpdateProfileForm extends Vue {
        
    }
</script>

<style scoped>
    .form {
        padding-bottom: 0px;
    }
</style>