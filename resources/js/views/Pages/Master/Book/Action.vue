<template>
    <PageHeader
        :title="
            $trans(route.meta.trans, {
                attribute: $trans(route.meta.label),
            })
        "
        :navs="[{ label: $trans('master.book.book'), path: 'BookList' }]"
    >
        <PageHeaderAction
            name="Book"
            :title="$trans('master.book.book')"
            :actions="['list']"
        />
    </PageHeader>

    <ParentTransition appear :visibility="true">
        <BookForm></BookForm>
    </ParentTransition>
</template>

<script>
export default {
    name: "BookAction",
};
</script>

<script setup>
import { useRoute } from "vue-router";
import BookForm from "./Form.vue";

const route = useRoute();
</script>
