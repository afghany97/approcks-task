<template>

    <div class="modal is-active">

        <div class="modal-background"></div>

        <div class="modal-card">

            <header class="modal-card-head">

                <p class="modal-card-title">

                    <slot name="header"></slot>

                </p>

                <button class="delete" aria-label="close" @click="$emit('close')"></button>

            </header>

            <section class="modal-card-body">

                <div class="form-group">

                    <label for="title">Title</label>

                    <input type="text" class="form-control" id="title" v-model="title">

                </div>

                <div class="form-group">

                    <label for="description">Description</label>

                    <input type="text" class="form-control" id="description" v-model="description">

                </div>

                <div class="form-group">

                    <label for="deadline">Deadline</label>

                    <input type="text" class="form-control" id="deadline" v-model="deadline">

                </div>

                <div class="form-group">

                    <label for="user">Assign User</label>

                    <select class="form-control" id="user" v-model="user">

                        <option selected disabled>{{issue.user.name}}</option>

                        <option v-for="user in users" :value="user.id" v-if="user.id != issue.user.id" v-text="user.name"></option>

                    </select>

                </div>

                <div v-if="hasMedia">

                    <img :src=" '/storage/' + issue.media[0].path" alt="" width="50%" height="100px">

                </div>

                <hr>

                <h1>Comments</h1>

                <hr>

                <comment v-for="comment in issue.comments" :key="comment.id" :comment="comment"></comment>

                <div class="form-group">

                    <label for="comment">Write Comment</label>

                    <input type="text" class="form-control" id="comment" v-model="comment">

                </div>

                <div class="form-group">

                    <label for="attachment">Attachment</label>

                    <input type="file" class="form-control-file" id="attachment" ref="attachment"
                           @change="setAttachment" accept="image/*">

                </div>

                <button class="btn btn-primary" @click="submitComment">Submit</button>

            </section>

            <footer class="modal-card-foot">

                <button class="button is-success" @click="updateIssue">Save changes</button>

                <button class="button" @click="$emit('close')">Cancel</button>

            </footer>

        </div>

    </div>

</template>

<script>
    import Comment from './Comment.vue';

    export default {
        name: "IssueEdit",
        props: ['issue','users'],
        data() {
            return {
                title: this.issue.title,
                description: this.issue.description,
                comment: '',
                attachment: '',
                user : this.issue.user.name,
                deadline : this.issue.deadline
            }
        },
        components: {
            Comment
        },
        methods: {
            updateIssue() {
                axios.put('/issues/' + this.issue.id, {
                    title: this.title,
                    description: this.description,
                    user_id : this.user,
                    deadline : this.deadline
                })

                    .then(response => {

                        this.$parent._props.issue.title = response.data.title;

                        this.$parent._props.issue.description = response.data.description;

                        this.title = response.data.title;

                        this.deadline = response.data.deadline;

                        this.description = response.data.description;

                    })

                    .catch(error => console.log(error));

            },
            submitComment() {

                let data = new FormData();

                if(this.attachment)
                {
                    data.append('attachment',this.attachment);
                }

                data.append('body',this.comment);

                axios.post('/issues/' + this.issue.id + '/comments', data,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                )
                    .then(response => {

                        this.issue.comments.push(response.data);

                        this.attachment = this.comment = '';

                        this.$forceUpdate();

                    })

                    .catch(error => console.log(error));
            },
            setAttachment() {
                this.attachment = this.$refs.attachment.files[0];
            }
        },
        computed : {
            hasMedia(){
                return Boolean(Array.isArray(this.issue.media) && this.issue.media.length);
            }
        }

    }
</script>