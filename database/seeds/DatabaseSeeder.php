<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
         'id' => 1,
         'nome' => 'Like Admin',
         'email' => 'dev@likepublicidade.com',
         'password' => bcrypt('admin'),
         'nivel' => 1,
       ]);
       DB::table('empresa')->insert([
         'id' =>1,
         'nomefantasia' =>'Leite Soberano',
         'telefone' =>'(99)3526-5300',
         'email' =>'leitesoberano@gmail.com',
         'endereco' =>'R. RAFAEL DE ALMEIDA, N˚01 - PARQUE BURITI, IMPERATRIZ - MA, CEP: 65916-193',
         'descricao' =>'Leite Soberano LTDA.',
         'palavraschave' =>'leite,integral',
         'achenos' => 'https://www.google.com/maps/place/Leite+Soberano/@-5.5470622,-47.4716459,15z/data=!4m5!3m4!1s0x0:0x526d36eb1ce92b31!8m2!3d-5.5470622!4d-47.4716459',         
       ]);
    }
}
