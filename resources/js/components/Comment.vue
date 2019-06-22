<template>

    <article class="message is-link">

        <div class="message-header">

            <p v-text="comment.user.name"></p>

        </div>

        <div class="message-body" v-text="comment.body"></div>

        <div v-if="hasMedia">

            <img :src=" '/storage/' + comment.media[0].path" alt="" width="150px" height="100px">

        </div>

    </article>

</template>

<script>
    export default {
        name: "Comment",
        props :['comment'],
        computed:{
            hasMedia(){
                return Boolean(Array.isArray(this.comment.media) && this.comment.media.length);

            }
        }
    }
</script>