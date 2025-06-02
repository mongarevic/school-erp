<?php

namespace App\Repositories;

use App\Models\BookCategory;
use App\Repositories\BaseRepository;

class BookCategoryRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'description'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return BookCategory::class;
    }
}
