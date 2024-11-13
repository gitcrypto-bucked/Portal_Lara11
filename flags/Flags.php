<?php

namespace Flags;
class Flags
{
    public static function getFlags()
    {
        return  [

            'admin'=>[
                'index' => ['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
                'inventario'=> ['listar'=>1, 'chamado'=>1],
                'dashboard' => ['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
                'user-profile'=>['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
                'register-user'=> ['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
                'news-list'=> ['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
                'add-news'=> ['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
            ],
            9 =>[
                'index' => ['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
                'inventario'=> ['listar'=>1],
                'user-profile'=>['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
                'dashboard' => ['inventario'=>0,'chamadas'=>1,'tracking'=>0,'contato'=>1],
                'user-profile'=>['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
            ],
            8=>[
                'index' => ['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
                'inventario'=> ['listar'=>1, 'chamado'=>1,'troca'=>0],
                'dashboard' => ['inventario'=>1,'chamadas'=>1,'tracking'=>0,'contato'=>1],
                'user-profile'=>['inventario'=>1,'chamadas'=>1,'tracking'=>0,'contato'=>1],
            ],
            7=>[
                'index' => ['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
                'inventario'=> ['listar'=>1, 'chamado'=>1],
                'dashboard' => ['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
                'user-profile'=>['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
                'register-user'=> ['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
                'news-list'=> ['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
                'add-news'=> ['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
            ],
            6=>[
                'index' => ['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
                'inventario'=> ['listar'=>1, 'chamado'=>1],
                'dashboard' => ['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
                'user-profile'=>['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
                'register-user'=> ['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
                'news-list'=> ['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
                'add-news'=> ['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
            ],
            5=>[
                'index' => ['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
                'inventario'=> ['listar'=>1, 'chamado'=>1],
                'dashboard' => ['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
                'user-profile'=>['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
                'register-user'=> ['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
                'news-list'=> ['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
                'add-news'=> ['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
            ],
            4=>[
                'index' => ['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
                'inventario'=> ['listar'=>1, 'chamado'=>1],
                'dashboard' => ['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
                'user-profile'=>['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
                'register-user'=> ['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
                'news-list'=> ['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
                'add-news'=> ['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
            ],
            3=>[
                'index' => ['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
                'inventario'=> ['listar'=>1, 'chamado'=>1],
                'dashboard' => ['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
                'user-profile'=>['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
                'register-user'=> ['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
                'news-list'=> ['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
                'add-news'=> ['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
            ],
            2=>[
                'index' => ['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
                'inventario'=> ['listar'=>1, 'chamado'=>1],
                'dashboard' => ['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
                'user-profile'=>['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
                'register-user'=> ['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
                'news-list'=> ['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
                'add-news'=> ['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
            ],
            1=>[
                'index' => ['inventario'=>0,'chamadas'=>0,'tracking'=>1,'contato'=>1],
                'inventario'=> ['listar'=>0, 'chamado'=>1],
                'dashboard' => ['inventario'=>1,'chamadas'=>0,'tracking'=>1,'contato'=>1],
                'user-profile'=>['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
                'register-user'=> ['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
                'news-list'=> ['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
                'add-news'=> ['inventario'=>1,'chamadas'=>1,'tracking'=>1,'contato'=>1],
            ]
        ];

    }



    public static function  getCrud()
    {
        return [
            'admin'=>['create'=>1,'update'=>1,'delete'=>1,'select'=>1],
            9=>['create'=>0,'update'=>0,'delete'=>0,'select'=>1],
            8=>['create'=>0,'update'=>0,'delete'=>0,'select'=>1],
            7=>['create'=>0,'update'=>0,'delete'=>1,'select'=>1],
            6=>['create'=>0,'update'=>0,'delete'=>1,'select'=>1],
            5=>['create'=>0,'update'=>0,'delete'=>1,'select'=>1],
            4=>['create'=>0,'update'=>0,'delete'=>1,'select'=>1],
            3=>['create'=>0,'update'=>0,'delete'=>1,'select'=>1],
            2=>['create'=>0,'update'=>0,'delete'=>0,'select'=>1],
            1=>['create'=>0,'update'=>0,'delete'=>0,'select'=>1]
        ];
    }
}
