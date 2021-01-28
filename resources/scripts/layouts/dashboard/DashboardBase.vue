<template>
    <v-app>
        <DashboardSideNav v-model="drawer" />
        <v-app-bar dark app>
            <template v-if="!focused">
            <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>

            <!-- <v-toolbar-title class="pr-5">Stratum</v-toolbar-title> -->

            <v-text-field 
                prepend-inner-icon="mdi-magnify" 
                label="Search Instances"
                class="hidden-sm-and-down search-bar"
                flat 
                solo-inverted 
                hide-details>
            </v-text-field>

            <v-spacer></v-spacer>

            <AccountPopover />
            </template>
            <template v-if="focused">

            <v-text-field 
                prepend-inner-icon="mdi-magnify" 
                label="Search Instances"
                flat 
                solo-inverted 
                hide-details>
            </v-text-field>
            </template>
        </v-app-bar>

        <v-main>
            <v-fade-transition mode="out-in">
                <router-view />
            </v-fade-transition>
        </v-main>
    </v-app>
</template>

<script lang="ts">
    import { Component, Vue } from 'vue-property-decorator'

    import AccountPopover from '@/components/menus/AccountPopover.vue'
    import DashboardSideNav from '@/components/navigation/DashboardSideNav.vue'

    @Component({
        components: {
            AccountPopover,
            DashboardSideNav
        }
    })
    export default class DashboardBase extends Vue {
        public drawer: boolean | null = null;

        public focused: boolean = false;
    }
</script>

<style scoped>
    .search-bar {
        max-width: 500px;
    }
</style>
