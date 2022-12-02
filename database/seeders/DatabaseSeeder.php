<?php

namespace Database\Seeders;

use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use PDOException;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     *
     * @throws Exception
     */
    public function run()
    {
        $sql_dumps = [
            './database/files/users.sql',
            './database/files/statuses.sql',
        ];
        foreach ($sql_dumps as $file) {
            $sql_dump = File::get($file);
            try {
                DB::connection()->getPdo()->exec($sql_dump);
            } catch (PDOException $exception) {
                throw new Exception('Error in ' . $file . ' ' . $exception->getMessage());
            }
        }
    }
}
