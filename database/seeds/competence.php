<?php

use Illuminate\Database\Seeder;
use App\MyModel\competenceModel;
use App\MyCommon\Role;
use Illuminate\Support\Facades\DB;

class competence extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //清空数据
        competenceModel::truncate();
        $competence = Role::masterCompetence;
        $id = 1;
        foreach ($competence as $key => $val) {
            DB::table('competence')->insert([
                'id' => $id,
                'name' => $val,
                'competence' => $key,
                'created_at' => date('Y-m-d H:i:s', time())
            ]);
            $id++;
        }
    }
}
