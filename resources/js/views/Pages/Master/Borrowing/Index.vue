@ -0,0 +1,102 @@
<template>
    <ListItem :init-url="initUrl" @setItems="setItems">
        <template #header>
            <PageHeader :title="$trans('master.borrowing.borrowing')">
                <PageHeaderAction url="master/borrowingborrowings/" name="Borrowing" :title="$trans('master.borrowing.borrowing')"
                    :actions="actions" :dropdown-actions="dropdownActions" @toggleFilter="showFilter = !showFilter"
                    @toggleImport="showImport = !showImport" />
            </PageHeader>
        </template>

        <template #import>
            <ParentTransition appear :visibility="showImport">
                <BaseImport path="master/borrowings/import" @cancelled="showImport = false" @hide="showImport = false"
                    @completed="emitter.emit('listItems')" />
            </ParentTransition>
        </template>

        <template #filter>
            <ParentTransition appear :visibility="showFilter">
                <FilterForm @refresh="emitter.emit('listItems')" @hide="showFilter = false"></FilterForm>
            </ParentTransition>
        </template>

        <ParentTransition appear :visibility="true">
            <DataTable :header="borrowings.headers" :meta="borrowings.meta" module="Borrowing"
                @refresh="emitter.emit('listItems')">
                <DataRow v-for="borrowing in borrowings.data" :key="borrowing.uuid">
                    <DataCell name="name">
                        {{ borrowing.name }}
                    </DataCell>
                    <DataCell name="title">
                        {{ borrowing.booktitle }}
                    </DataCell>
                    <DataCell name="name">
                        {{ borrowing.bookname }}
                    </DataCell>
                    <DataCell name="Year">
                        {{ borrowing.booknumber }}
                    </DataCell>
                    <DataCell name="publisher">
                        {{ borrowing.bookpublisher }}
                    </DataCell>
                    <DataCell name="sinopsis">
                        {{ borrowing.bookdescription }}
                    </DataCell>
                    <DataCell name="date">
                        {{ borrowing.date }}
                    </DataCell>
                    <DataCell name="action">
                        <DropdownMenu
                            v-if="borrowing.isEditable || borrowing.isDeletable || borrowing.isReadtable || borrowing.isCreatetable">
                            <DropdownItem borrowing="fas fa-arrow-circle-right" v-if="borrowing.isReadtable"
                                @click="router.push({ name: 'BorrowingShow', params: { uuid: borrowing.uuid } })">
                                {{ $trans('general.show') }}</DropdownItem>
                            <DropdownItem borrowing="fas fa-edit" v-if="borrowing.isEditable"
                                @click="router.push({ name: 'BorrowingEdit', params: { uuid: borrowing.uuid } })">
                                {{ $trans('general.edit') }}</DropdownItem>
                            <DropdownItem borrowing="fas fa-copy" v-if="borrowing.isCreatetable"
                                @click="router.push({ name: 'BorrowingDuplicate', params: { uuid: borrowing.uuid } })">
                                {{ $trans('general.duplicate') }}</DropdownItem>
                            <DropdownItem borrowing="fas fa-trash" v-if="borrowing.isDeletable" @click="emitter.emit('deleteItem', {
                                uuid: borrowing.uuid
                            })">{{ $trans('general.delete') }}</DropdownItem>
                        </DropdownMenu>
                    </DataCell>
                </DataRow>
                <template #actionButton>
                    <BaseButton @click="router.push({ name: 'BorrowingCreate' })" v-if="perform('borrowing:create')">
                        {{ $trans('global.add', { attribute: $trans('master.borrowing.borrowing') }) }}
                    </BaseButton>
                </template>
            </DataTable>
        </ParentTransition>
    </ListItem>
</template>

<script>
export default {
    name: 'BorrowingList'
}
</script>

<script setup>
import { ref, reactive, inject } from "vue"
import { useRouter } from "vue-router"
import { perform } from "@core/helpers/action"
import FilterForm from './Filter.vue'

const router = useRouter()

const emitter = inject('emitter')

let actions = ['filter']
if (perform('borrowing:create')) {
    actions.unshift('create')
}
let dropdownActions = [];
if (perform('borrowing:export')) {
    dropdownActions = ['print', 'pdf', 'excel']
}

const initUrl = "master/borrowing/"
const showFilter = ref(false)
const showImport = ref(false)

const borrowings = reactive({
    data: []
})

const setItems = (data) => {
    Object.assign(borrowings, data)
}
</script>