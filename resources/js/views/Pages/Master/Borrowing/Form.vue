<template>
  <FormAction
    :init-url="initUrl"
    :pre-requisites="true"
    @setPreRequisites="setPreRequisites"
    :init-form="initForm"
    :form="form"
    redirect="Borrowing"
  >
    <div class="grid grid-cols-2 gap-6">
      <div class="col-span-2">
        <BaseInput
          type="text"
          v-model="form.name"
          name="name"
          :label="$trans('master.borrowing.props.name')"
          v-model:error="formErrors.name"
          autofocus
        />
      </div>
      <div class="col-span-2">
        <BaseSelect
          v-model="form.book"
          name="book"
          :label="$trans('master.book.book')"
          :options="preRequisites.book"
          v-model:error="formErrors.book"
        />
      </div>
      <div class="col-span-2">
        <BaseInput
          type="text"
          v-model="form.date"
          name="date"
          :label="$trans('master.borrowing.props.date')"
          v-model:error="formErrors.date"
          autofocus
        />
      </div>
    </div>
  </FormAction>
</template>

<script>
export default {
  name: "BorrowingForm",
};
</script>

<script setup>
import { reactive } from "vue";
import { getFormErrors } from "@core/helpers/action";

const initUrl = "master/borrowing/";
const formErrors = getFormErrors(initUrl);
const preRequisites = reactive({});

const initForm = {
  name: "",
  book: "",
  date: "",
};

const form = reactive({ ...initForm });

const setPreRequisites = (data) => {
  Object.assign(preRequisites, data);
};
</script>
