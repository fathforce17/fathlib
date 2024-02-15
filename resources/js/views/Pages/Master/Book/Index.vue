<template>
    <ListItem
        :init-url="initUrl"
        @setItems="setItems"
    >
        <template #header>
            <PageHeader
                :title="$trans('master.book.book')"
            >
                <PageHeaderAction
                    url="master/books/"
                    name="Book"
                    :title="$trans('master.book.book')"
                    :actions="actions"
                    :dropdown-actions="dropdownActions"
                    @toggleFilter="showFilter = ! showFilter"
                    @toggleImport="showImport = ! showImport"
                />
            </PageHeader>
        </template>

        <template #import>
            <ParentTransition appear :visibility="showImport">
                <BaseImport path="master/books/import" @cancelled="showImport = false" @hide="showImport = false" @completed="emitter.emit('listItems')" />
            </ParentTransition>
        </template>

        <template #filter>
            <ParentTransition appear :visibility="showFilter">
                <FilterForm @refresh="emitter.emit('listItems')" @hide="showFilter = false"></FilterForm>
            </ParentTransition>
        </template>

        <ParentTransition appear :visibility="true">
            <DataTable
                :header="books.headers"
                :meta="books.meta"
                module="book"
                @refresh="emitter.emit('listItems')"
            >
                <DataRow v-for="book in books.data" :key="book.uuid">
                    <DataCell name="title">
                        {{ book.title }}
                    </DataCell>
                    <DataCell name="name">
                        {{ book.name }}
                    </DataCell>
                    <DataCell name="number">
                        {{ book.number }}
                    </DataCell>
                    <DataCell name="publisher">
                        {{ book.publisher }}
                    </DataCell>
                    <DataCell name="description">
                        {{ book.description }}
                    </DataCell>
                    <DataCell name="action">
                        <DropdownMenu v-if="book.isEditable || book.isDeletable || book.isReadtable || book.isCreatetable">
                            <DropdownItem book="fas fa-arrow-circle-right" v-if="book.isReadtable" @click="router.push({name: 'BookShow', params: {uuid: book.uuid}})">{{$trans('general.show')}}</DropdownItem>
                            <DropdownItem book="fas fa-edit" v-if="book.isEditable" @click="router.push({name: 'BookEdit', params: {uuid: book.uuid}})">{{$trans('general.edit')}}</DropdownItem>
                            <DropdownItem book="fas fa-copy" v-if="book.isCreatetable" @click="router.push({name: 'BookDuplicate', params: {uuid: book.uuid}})">{{$trans('general.duplicate')}}</DropdownItem>
                            <DropdownItem book="fas fa-trash" v-if="book.isDeletable" @click="emitter.emit('deleteItem', {
                                uuid: book.uuid
                            })">{{$trans('general.delete')}}</DropdownItem>
                        </DropdownMenu>
                    </DataCell>
                </DataRow>
                <template #actionButton>
                    <BaseButton @click="router.push({name: 'BookCreate'})" v-if="perform('book:create')">
                        {{$trans('global.add', {attribute: $trans('master.book.book')})}}
                    </BaseButton>
                </template>
            </DataTable>
        </ParentTransition>
    </ListItem>
</template>

<script>
export default {
    name: 'BookList'
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
if (perform('book:create')) {
    actions.unshift('create')
}
let dropdownActions = [];
if (perform('book:export')) {
    dropdownActions = ['print', 'pdf', 'excel']
}

const initUrl = "master/book/"
const showFilter = ref(false)
const showImport = ref(false)

const books = reactive({
    data: []
})

const setItems = (data) => {
    Object.assign(books, data)
}
</script>
