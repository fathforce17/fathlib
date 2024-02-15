<?php

namespace App\Policies\Master;

use App\Models\Master\Borrowing;
use Illuminate\Auth\Access\HandlesAuthorization;

class BorrowingPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the borrowing can get pre-requisite.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function preRequisite(Borrowing $borrowing)
    {
        return $borrowing->hasAnyPermission(['borrowing:read', 'borrowing:create', 'borrowing:edit']);
    }

    /**
     * Determine whether the borrowing can view any models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Borrowing $borrowing)
    {
        return $borrowing->can('borrowing:read');
    }

    /**
     * Determine whether the borrowing can view the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Borrowing $borrowing, Borrowing $model)
    {
        if (! $model->can('borrowing:read')) {
            return false;
        }

        return $model->isEditable();
    }


    /**
     * Determine whether the borrowing can create models.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Borrowing $borrowing)
    {
        if (! $borrowing->can('borrowing:create')) {
            return false;
        }

        return $borrowing->isEditable();
    }

    /**
     * Determine whether the borrowing can update the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Borrowing $borrowing, Borrowing $model)
    {
        if (! $borrowing->can('borrowing:edit')) {
            return false;
        }

        return $model->isEditable();
    }

    /**
     * Determine whether the borrowing can delete the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Borrowing $borrowing, Borrowing $model)
    {
        if (! $borrowing->can('borrowing:delete')) {
            return false;
        }

        return $model->isEditable();
    }

    /**
     * Determine whether the borrowing can restore the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Borrowing $borrowing, Borrowing $model)
    {
        //
    }

    /**
     * Determine whether the borrowing can permanently delete the model.
     *
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Borrowing $borrowing, Borrowing $model)
    {
        //
    }
}
