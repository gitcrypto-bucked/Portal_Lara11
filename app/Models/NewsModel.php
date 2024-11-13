<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class NewsModel extends Model
{
    use HasFactory;
    protected $fillable = ['thumb', 'intro', 'title','created_at','active'];


    public function insert(array $news)
    {
        if(DB::table('noticias')->insert($news))
        {
            return true;
        }
        else return false;
    }


    public function getAllNews( int $paginate= 18){
        return DB::table('noticias')->whereRaw("active ='1'")->orderBy('created_at', 'desc')->paginate($paginate);
    }



    public function remove($id)
    {
        return DB::table('noticias')->where('id',$id)->update(['active'=>'0']);
    }

}
