<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WordResource;
use App\Models\Word;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        $word = $this->WordsModel->get();
        return WordResource::collection($word);
    }

    public function today(){
        $word = $this->WordsModel->where('dateTime',">=",Carbon::now())->Where('dateTime',"<=",Carbon::now()->addHour(6))->take(1)->get();
        return WordResource::collection($word);
    }
}
