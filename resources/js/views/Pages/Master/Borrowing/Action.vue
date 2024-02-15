<template>
  <PageHeader :title="$trans(route.meta.trans, {
    attribute: $trans(route.meta.label),
  })
    " :navs="[{ label: $trans('master.borrowing.borrowing'), path: 'BorrowingList' }]">
    <PageHeaderAction name="Borrowing" :title="$trans('master.borrowing.borrowing')" :actions="['list']" />
  </PageHeader>

  <ParentTransition appear :visibility="true">
    <BorrowingForm></BorrowingForm>
  </ParentTransition>
</template>

<script>
export default {
  name: "BorrowingAction",
};
</script>

<script setup>
import { useRoute } from "vue-router";
import BorrowingForm from "./Form.vue";

const route = useRoute();
</script>
