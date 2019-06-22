<template>

    <div class="col">

        <div class="coloum">

            <ul class="no-padding no-style sortable ui-sortable"

                :id="'record-' + record.id"

                :data-record-id="record.id">

                <h4 class="hide">{{record.name}}</h4>

                <issue v-for="issue in record.issues" :issue="issue" :key="issue.id" :users="users"></issue>

            </ul>

        </div>

    </div>

</template>

<script>
    import Issue from './Issue.vue';

    export default {
        name: "List",
        props:['record','users'],
        components:{
            Issue
        }
    }
</script>
