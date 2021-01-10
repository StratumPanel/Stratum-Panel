<template>
    <v-navigation-drawer :clipped="$vuetify.breakpoint.lgAndUp" fixed v-bind="$attrs" v-on="$listeners" app>
        <v-list dense nav>
            <v-list-item v-for="link in links" :key="link.title" :to="{ name: link.route }" link>
                <v-list-item-icon>
                    <v-icon>{{ link.icon }}</v-icon>
                </v-list-item-icon>

                <v-list-item-content>
                    <v-list-item-title>{{ link.title }}</v-list-item-title>
                </v-list-item-content>
            </v-list-item>
        </v-list>
    </v-navigation-drawer>
</template>

<script lang="ts">
    import { Component, Watch, Prop, Vue } from 'vue-property-decorator';

    export interface links {
        [index: number]: {
            title: string;
            icon: string;
            route: string;
        }
    }

    @Component
    export default class DashboardSideNav extends Vue {
        private links: links = [
            { title: 'Instances', icon: 'mdi-layers', route: 'Dashboard'},
            { title: 'My Account', icon: 'mdi-account-circle', route: 'My Account'},
        ]
    }
</script>

<style scoped></style>
