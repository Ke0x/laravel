<?php

use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array (
        [
          'name' => 'JavaScipt',
          'description' => 'Description JavaScript',
          'logo' => 'js.png',
        ],
        [
          'name' => 'CSS3',
          'description' => 'Description CSS3',
          'logo' => 'html-css.png',
        ],
        [
          'name' => 'PHP',
          'description' => 'Description PHP',
          'logo' => 'php.png',
        ],
        [
          'name' => 'Python',
          'description' => 'Description Python',
          'logo' => 'html-css.png',
        ]);
        App\Skill::insert($data);
    }
}
