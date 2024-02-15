<?php

namespace App\Policies\Master;

use App\Models\Master\Book;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the book can get pre-requisite.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function preRequisite(Book $book)
    {
        return $book->hasAnyPermission(['book:read', 'book:create', 'book:edit']);
    }

    /**
     * Determine whether the book can view any models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Book $book)
    {
        return $book->can('book:read');
    }

    /**
     * Determine whether the book can view the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Book $book, Book $model)
    {
        if (! $model->can('book:read')) {
            return false;
        }

        return $model->isEditable();
    }


    /**
     * Determine whether the book can create models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Book $book)
    {
        if (! $book->can('book:create')) {
            return false;
        }

        return $book->isEditable();
    }

    /**
     * Determine whether the book can update the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Book $book, Book $model)
    {
        if (! $book->can('book:edit')) {
            return false;
        }

        return $model->isEditable();
    }

    /**
     * Determine whether the book can delete the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Book $book, Book $model)
    {
        if (! $book->can('book:delete')) {
            return false;
        }

        return $model->isEditable();
    }

    /**
     * Determine whether the book can restore the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Book $book, Book $model)
    {
        //
    }

    /**
     * Determine whether the book can permanently delete the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Book $book, Book $model)
    {
        //
    }
}
