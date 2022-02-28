<?php

namespace Database\Seeders;

use App\Models\Word;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $datas =
        $words = explode(" ", file_get_contents('words.txt'));
        shuffle($words);
        $time = 6;
        foreach($words as $word){
            if(strlen($word) == 5 && ctype_alpha($word)){
            $data = ['words'=>$word,'dateTime'=>Carbon::now()->addHour($time)];
            Word::create($data);
            $time+=6;
        }
        }

    }
}
