<template>

    <div class="modal is-active" v-show="this.$parent.showNewIssueModal">

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

                    <label for="attachment">Attachment</label>

                    <input type="file" class="form-control" id="attachment" accept="image/*" ref="attachment"
                           @change="setAttachment">

                </div>

                <div class="form-group">

                    <label for="deadline">Deadline</label>

                    <input type="date" class="form-control" id="deadline"  v-model="deadline">

                </div>

                <div class="form-group">

                    <label for="record">Choose List</label>

                    <select class="form-control" id="record" v-model="record">

                        <option selected disabled>Select List</option>

                        <option v-for="record in records" :value="record.id">{{record.name}}</option>


                    </select>

                </div>

                <div class="form-group">

                    <label for="user">Assign User</label>

                    <select class="form-control" id="user" v-model="user">

                        <option selected disabled>Select User</option>

                        <option v-for="user in users" :value="user.id">{{user.name}}</option>


                    </select>

                </div>

            </section>

            <footer class="modal-card-foot">

                <button class="button is-success" @click="submit">Save</button>

                <button class="button" @click="$emit('close')">Cancel</button>

            </footer>

        </div>

    </div>

</template>

<script>
    export default {
        name: "NewIssue",
        props: ['users','records'],
        data() {
            return {
                title: '',
                description: '',
                attachment: '',
                user: auth.user.id,
                record : 'Select List',
                deadline : ''
            }
        },
        methods: {
            submit() {

                let data = new FormData();

                if (this.attachment) {
                    data.append('attachment', this.attachment);
                }

                data.append('title', this.title);

                data.append('description', this.description);

                data.append('user_id', this.user);

                data.append('record_id', this.record);

                data.append('deadline', this.deadline);

                axios.post('/issues', data, {

                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                )
                    .then(response => this.$emit('close'))

                    .catch(error => console.log(error))

            },
            setAttachment() {
                this.attachment = this.$refs.attachment.files[0];
            }
        }
    }
</script>