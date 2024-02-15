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
        <ShowItem
            :init-url="initUrl"
            :uuid="route.params.uuid"
            @setItem="setItem"
            @redirectTo="router.push({name: 'Book'})"
        >
            <BaseCard v-if="book.uuid">
                <template #title>
                    {{book.title}}
                </template>
                <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                    <BaseDataView class="col-span-1 sm:col-span-2" :label="$trans('book.props.title')">
                        <div v-html="book.title"></div>
                    </BaseDataView>

                    <BaseDataView class="col-span-1 sm:col-span-2" :label="$trans('book.props.name')">
                        <div v-html="book.name"></div>
                    </BaseDataView>

                    <BaseDataView class="col-span-1 sm:col-span-2" :label="$trans('book.props.number')">
                        <div v-html="book.number"></div>
                    </BaseDataView>

                    <BaseDataView class="col-span-1 sm:col-span-2" :label="$trans('book.props.publisher')">
                        <div v-html="book.publisher"></div>
                    </BaseDataView>

                    <BaseDataView class="col-span-1 sm:col-span-2" :label="$trans('book.props.description')">
                        <div v-html="book.description"></div>
                    </BaseDataView>

                    <BaseDataView :label="$trans('general.created_at')">
                        {{book.createdAt}}
                    </BaseDataView>

                    <BaseDataView :label="$trans('general.updated_at')">
                        {{book.updatedAt}}
                    </BaseDataView>
                </dl>
                <template #footer>
                    <ShowButton>
                        <BaseButton design="primary" @click="router.push({name: 'BookEdit', params: {uuid: book.uuid}})">
                            {{$trans("general.edit")}}
                        </BaseButton>
                    </ShowButton>
                </template>
            </BaseCard>
        </ShowItem>
    </ParentTransition>
</template>

<script>
export default {
    name: "BookShow"
}
</script>

<script setup>
import { reactive } from "vue";
import { useRoute, useRouter } from "vue-router";

const route = useRoute();
const router = useRouter();

const initialBook = {};

const initUrl = "master/book/"

const book = reactive({ ...initialBook });

const setItem = (data) => {
    Object.assign(book, data);
};
</script>
