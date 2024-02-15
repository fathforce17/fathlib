<template>
  <PageHeader
    :title="
      $trans(route.meta.trans, {
        attribute: $trans(route.meta.label),
      })
    "
    :navs="[{ label: $trans('master.borrowing.borrowing'), path: 'BorrowingList' }]"
  >
    <PageHeaderAction
      name="Borrowing"
      :title="$trans('master.borrowing.borrowing')"
      :actions="['list']"
    />
  </PageHeader>

  <ParentTransition appear :visibility="true">
    <ShowItem
      :init-url="initUrl"
      :uuid="route.params.uuid"
      @setItem="setItem"
      @redirectTo="router.push({ name: 'Borrowing' })"
    >
      <BaseCard v-if="borrowing.uuid">
        <template #name>
          {{ borrowing.name }}
        </template>
        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
          <BaseDataView :label="$trans('master.borrowing.props.name')">
            <div v-html="borrowing.name"></div>
          </BaseDataView>

          <BaseDataView
            :label="$trans('master.book.book')"
          >
            <div v-html="borrowing.booktitle"></div>
          </BaseDataView>

          <BaseDataView
            :label="$trans('master.book.book2')"
          >
            <div v-html="borrowing.bookname"></div>
          </BaseDataView>

          <BaseDataView
            :label="$trans('master.book.book3')"
          >
            <div v-html="borrowing.booknumber"></div>
          </BaseDataView>

          <BaseDataView
            :label="$trans('master.book.book4')"
          >
            <div v-html="borrowing.bookpubliser"></div>
          </BaseDataView>

          <BaseDataView
            :label="$trans('master.book.book5')"
          >
            <div v-html="borrowing.bookdescription"></div>
          </BaseDataView>
          <BaseDataView :label="$trans('master.borrowing.props.date')">
            <div v-html="borrowing.date"></div>
          </BaseDataView>
        </dl>
        <template #footer>
          <ShowButton>
            <BaseButton
              design="primary"
              @click="
                router.push({
                  name: 'BorrowingEdit',
                  params: { uuid: borrowing.uuid },
                })
              "
            >
              {{ $trans("general.edit") }}
            </BaseButton>
          </ShowButton>
        </template>
      </BaseCard>
    </ShowItem>
  </ParentTransition>
</template>

<script>
export default {
  name: "BorrowingShow",
};
</script>

<script setup>
import { reactive } from "vue";
import { useRoute, useRouter } from "vue-router";

const route = useRoute();
const router = useRouter();

const initialBorrowing = {};

const initUrl = "master/borrowing/";

const borrowing = reactive({ ...initialBorrowing });

const setItem = (data) => {
  Object.assign(borrowing, data);
};
</script>
