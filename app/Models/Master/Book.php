<?php

namespace App\Models\Master;

use App\Concerns\HasFilter;
use App\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class Book extends Model 
{
    use HasFactory, HasFilter, HasUuid, HasRoles;

    protected $fillable = [];

    protected $primaryKey = 'id';

    protected $table = 'books';

    public function getModelName(): string
    {
        return 'Book';
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
