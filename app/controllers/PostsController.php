<?php


class PostsController
{

    public function index()
    {


//            ---- model ----
//        TODO hämta från db med modell
        $users = [
            ['username' =>'Sunkan', 'age' =>41],
            ['username' =>'Mallis', 'age' =>34],
        ];

//            ---- view ----
        $data = ["users"=>$users];
        view('posts', 'index',$data);
    }


    public function show($vars)
    {
        echo __METHOD__ . "<br>";
        $id = $vars["id"];
        $post = new Post('Fikbil', 'Lorem tuna', 2);
        $post->find($id);
        var_dump($post);
//        var_dump($vars);

    }


    /**
     * Visar vyn för att redigera en Post
     * @return boolean success
     */
    public function edit()
{
    echo "<br>Formulär för att redigera";
//    var_dump($vars);
//        TODO hämta från db med modell
//        TODO visa på skärm med vy
        return true;
}

public function update()
{
    echo "<br>Spara ändringar mmed update-fråga mpt db";
//    var_dump($vars);
//        TODO hämta från db med modell
//        TODO visa på skärm med vy
}

public function add()
{
    echo "<br>Formulär som man fyller i för att göra en ny";
//    var_dump($vars);
//        TODO hämta från db med modell
//        TODO visa på skärm med vy
}

public function delete()
{
    echo "<br>Döda post med delete-fråga";
//    var_dump($vars);
//        TODO hämta från db med modell
//        TODO visa på skärm med vy
}

public function store()
{
    echo "<br>Sparar en ny med insert-fråga";
//    var_dump($vars);
//        TODO hämta från db med modell
//        TODO visa på skärm med vy
}

}