<script>
    export default {
        name: "board",
        data(){
            return {
                showNewIssueModal : false
            }
        },
        created() {
            this.$on('test',() => {
                alert('fired');
            });
        }

    }
</script>