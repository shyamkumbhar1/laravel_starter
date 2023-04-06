<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User1,Phone,Comment,Post,Role,User2};


class RelationshipController extends Controller
{
    public function oneToOne (){
 
        $User_data = User1::find(1)->phone;
        $user_data_phone = Phone::find(1)->user1;
        dd($User_data,$user_data_phone);


    }
    public function oneToMany (){
 
        $post = Post::find(1);
        $comments = $post->comments;
        dd($comments ,$post);  
        
    }
    public function ManyToMany (){
        /* Table Name : User2,Role,Role_user */
         $data = User2::find(1);
         dd($data->roles);
    }
}
