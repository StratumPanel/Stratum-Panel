<template>
    <div>
        <h1>wowzone</h1>
        <account-header />
    </div>
</template>

<script lang="ts">
    import { Component, Vue } from 'vue-property-decorator'

    import AccountHeader from '@/components/account/Header.vue'

    @Component({
        components: {
            AccountHeader
        }
    })
    export default class Account extends Vue {
        
    }
</script>

<style scoped>

</style>