<?php


use Phinx\Seed\AbstractSeed;

class CategoriesSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {

        $data = [
            [
                "category_name" => "Crna Hronika"
            ],
            [
                "category_name" => "Hadisi"
            ],
            [
                "category_name" => "Hadz"
            ],
            [
                "category_name" => "Recepti"
            ],
            [
                "category_name" => "Ekonomija"
            ]
        ];

        $users = $this->table('categories');
        $users->insert($data)
            ->save();
    }
}
