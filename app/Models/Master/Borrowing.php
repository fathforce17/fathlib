<?php

namespace App\Models\Master;

use App\Concerns\HasFilter;
use App\Concerns\HasUuid;
use App\Models\Master\Book;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class Borrowing extends Model
{
    use HasFactory, HasFilter, HasUuid, HasRoles;

    protected $fillable = [];

    protected $primaryKey = 'id';

    protected $table = 'borrowings';

    protected $casts = [
    ];

    public function getModelName(): string
    {
        return 'Borrowing';
    }

    /**
     * Get the user that owns the Borrowing
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function isEditable()
    {

        if (! Auth::user()->is_default && $this->hasRole('admin')) {
            return false;
        }

        // if ($this->id == \Auth::id()) {
        //     return false;
        // }

        return true;
    }
}
