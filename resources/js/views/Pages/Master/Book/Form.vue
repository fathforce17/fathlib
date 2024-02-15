<template>
    <FormAction :init-url="initUrl" :init-form="initForm" :form="form" redirect="Book">
        <div class="grid grid-cols-2 gap-6">
            <div class="col-span-3 sm:col-span-1">
                <BaseInput type="text" v-model="form.title" name="title" :label="$trans('master.book.props.title')
                    " v-model:error="formErrors.title" autofocus />
            </div>
            <div class="col-span-3 sm:col-span-1">
                <BaseInput type="text" v-model="form.name" name="name"
                    :label="$trans('master.book.props.name')" v-model:error="formErrors.name" />
            </div>

            <div class="col-span-3 sm:col-span-1">
                <BaseInput type="number" v-model="form.number" name="number"
                    :label="$trans('master.book.props.number')" v-model:error="formErrors.number" />
            </div>
            <div class="col-span-3 sm:col-span-1">
                <BaseInput type="text" v-model="form.publisher" name="publisher"
                    :label="$trans('master.book.props.publisher')" v-model:error="formErrors.publisher" />
            </div>
            <div class="col-span-3 sm:col-span-2">
                <BaseTextarea v-model="form.description" name="description"
                    :label="$trans('master.book.props.description')" v-model:error="formErrors.description" />
            </div>
        </div>
    </FormAction>
</template>

<script>
export default {
    name: 'BookForm'
}
</script>

<script setup>
import { reactive } from "vue";
import { getFormErrors } from "@core/helpers/action"

const initForm = {
    title: "",
    name: "",
    number: "",
    publisher: "",
    description: "",
};

const initUrl = "master/book/"
const formErrors = getFormErrors(initUrl)

const form = reactive({ ...initForm });
</script>
