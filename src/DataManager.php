<?php

namespace Mostbyte\ExportGenerator;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class DataManager
{
    /**
     * Method for exporting and saving data from database to local storage
     *
     * @param Collection $collection
     * @param string $fileName
     * @param string|null $categoryName
     * @return string
     */
    public static function save(Collection $collection, string $fileName, string $categoryName = null): string
    {
        $fileName = "$fileName.xlsx";
        $categoryName = "$categoryName/" ?? "";
        $path = "exported/$categoryName$fileName";

        $file = Excel::download(new Generator($collection), $fileName);
        Storage::put($path, $file);

        return $path;
    }

    /**
     * Method that gets the list of files that located in given category
     *
     * @param string $categoryName
     * @return array<string>
     */
    public static function getList(string $categoryName = ""): array
    {
        return Storage::allFiles("exported/$categoryName");
    }

    /**
     * Method for getting the file
     *
     * @param string $filePath
     * @return string|null
     */
    public static function get(string $filePath): string|null
    {
        return Storage::get($filePath);
    }
}
