<!--
  - Jellyplot Copyright (c) 2022.
  -->

<template>

    <table class="score">
        <tr>
            <td colspan="3" class="description">{{title}}</td>
        </tr>
        <tr>
            <td>{{title}}</td>
            <th>{{title}} - {{title}}</th>
            <td>{{title}}</td>
        </tr>
        <tr>
            <td><img src="https://ui-avatars.com/api/?name={{title}}&color=FF6900&background=EBF4FF'" width="31" height="20" alt="{{title}}" /></td>
            <th></th>
            <td><img src="https://flagpedia.net/data/flags/mini/france.png" width="31" height="20" alt="france" /></td>
        </tr>
    </table>

</template>

<script>
export default {
    name: "SchedulerItemComponent"
}
</script>

<style scoped>

</style>
