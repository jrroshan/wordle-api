<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WordResource;
use App\Models\Word;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WordsController extends Controller
{

    protected $WordsModel;
    public function __construct(Word $word)
    {
        $this->WordsModel =$word;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $word = DB::table('words')->select('words')->get();
        // $word = implode(",",$words);
        // $word = cache()->remember('allwords',60*60,function(){
        //     return $this->WordsModel->select('words')->get();
        // });
        return WordResource::collection($word);
    }

    public function today(){
        $word = DB::table('words')->select('words')->where('dateTime','>=',Carbon::now())->Where('dateTime',"<=",Carbon::now()->addHour(3))->take(1)->get();
//        $word = $this->WordsModel->where('dateTime',">=",Carbon::now())->Where('dateTime',"<=",Carbon::now()->addHour(3))->take(1)->get();
        return WordResource::collection($word);
    }
}
