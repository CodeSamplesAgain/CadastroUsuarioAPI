<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = [

            [
                "id" => 11,
                "code" => "RO",
                "name" => "Rondônia",
            ],
            [
                "id" => 12,
                "code" => "AC",
                "name" => "Acre",
            ],
            [
                "id" => 13,
                "code" => "AM",
                "name" => "Amazonas",
            ],
            [
                "id" => 14,
                "code" => "RR",
                "name" => "Roraima",
            ],
            [
                "id" => 15,
                "code" => "PA",
                "name" => "Pará",
            ],
            [
                "id" => 16,
                "code" => "AP",
                "name" => "Amapá",
            ],
            [
                "id" => 17,
                "code" => "TO",
                "name" => "Tocantins",
            ],
            [
                "id" => 21,
                "code" => "MA",
                "name" => "Maranhão",
            ],
            [
                "id" => 22,
                "code" => "PI",
                "name" => "Piauí",
            ],
            [
                "id" => 23,
                "code" => "CE",
                "name" => "Ceará",
            ],
            [
                "id" => 24,
                "code" => "RN",
                "name" => "Rio Grande do Norte",
            ],
            [
                "id" => 25,
                "code" => "PB",
                "name" => "Paraíba",
            ],
            [
                "id" => 26,
                "code" => "PE",
                "name" => "Pernambuco",
            ],
            [
                "id" => 27,
                "code" => "AL",
                "name" => "Alagoas",
            ],
            [
                "id" => 28,
                "code" => "SE",
                "name" => "Sergipe",
            ],
            [
                "id" => 29,
                "code" => "BA",
                "name" => "Bahia",
            ],
            [
                "id" => 31,
                "code" => "MG",
                "name" => "Minas Gerais",
            ],
            [
                "id" => 32,
                "code" => "ES",
                "name" => "Espírito Santo",
            ],
            [
                "id" => 33,
                "code" => "RJ",
                "name" => "Rio de Janeiro",
            ],
            [
                "id" => 35,
                "code" => "SP",
                "name" => "São Paulo",
            ],
            [
                "id" => 41,
                "code" => "PR",
                "name" => "Paraná",
            ],
            [
                "id" => 42,
                "code" => "SC",
                "name" => "Santa Catarina",
            ],
            [
                "id" => 43,
                "code" => "RS",
                "name" => "Rio Grande do Sul",
            ],
            [
                "id" => 50,
                "code" => "MS",
                "name" => "Mato Grosso do Sul",
            ],
            [
                "id" => 51,
                "code" => "MT",
                "name" => "Mato Grosso",
            ],
            [
                "id" => 52,
                "code" => "GO",
                "name" => "Goiás",
            ],
            [
                "id" => 53,
                "code" => "DF",
                "name" => "Distrito Federal",
            ],
        ];

        DB::table('states')->insert($states);
    }
}
