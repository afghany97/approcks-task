<template>

    <div class="task-navigation-bar">

        <div class="row">

            <div class="col-md-12">

                <ul class="steps">

                    <li v-for="record in records">

                        {{record.name}}

                        <span class="counter" v-text="record.issues.length"></span>

                    </li>

                </ul>

            </div>

        </div>

    </div>

</template>

<script>
    export default {
        name: "Records",
        props:['records']
    }
</script>
