<?php

namespace Mostbyte\ExportGenerator;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\FromCollection;

class Generator implements FromCollection
{
    /**
     * @param Collection<Model> $modelClass
     */
    public function __construct(
        protected Collection $modelClass
    )
    {
    }


    public function collection(): Collection
    {
        return $this->modelClass;
    }
}
