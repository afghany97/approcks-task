<script>
    import List from './List.vue';

    export default {
        name: "Lists",
        components: {
            List,
        },
        mounted() {
            $(function () {

                const BaseUrl = window.location.href + '/';

                $('ul[id^="record"]').sortable({

                    connectWith: ".sortable",

                    receive: function (e, ui) {

                        let record_id = $(ui.item).parent(".sortable").data("record-id");

                        let issue_id = $(ui.item.children()[0]).data('issue-id');

                        let url = BaseUrl + record_id + '/' + issue_id + '/update';

                        axios.post(url);

                    }

                }).disableSelection();
            });
        }
    }
</script>