<template>

    <div>

        <li class="ui-sortable-handle"

            @click="showEditModal = true"

            :data-issue-id = "issue.id"

            :id="issue.id">

            <div class="project-item">

                <div class="project-info">

                    <div class="media">

                        <img src="/imgs/person0.jpg" class="mr-3 rounded-circle" width="35px"

                             height="35px">

                        <div class="media-body">

                            <p>Lorem ipsum</p>

                            <h6 class="mt-0">Jon Doe</h6>

                            <p>Lorem ipsum</p>

                        </div>

                    </div>

                    <div class="item-body">

                        <p>project name 2459</p>

                        <h6>{{issue.title}}</h6>

                        <p>{{issue.description}}</p>

                        <div v-if="hasMedia">

                            <img :src=" '/storage/' + issue.media[0].path" alt="" width="150px" height="100px">

                        </div>

                    </div>

                </div>

            </div>

        </li>

        <issue-edit v-show="showEditModal" @close="showEditModal = false" :issue="issue" :key="issue.id" :users="users">

            <template slot="header">{{issue.title}}</template>

        </issue-edit>

    </div>

</template>

<script>
    import IssueEdit from './IssueEdit.vue';

    export default {
        name: "Issue",
        props: ['issue','users'],
        data() {
            return {
                showEditModal: false
            }
        },
        components: {
            IssueEdit
        },
        computed : {
            hasMedia(){
                return Boolean(Array.isArray(this.issue.media) && this.issue.media.length);
            }
        }
    }
</script>