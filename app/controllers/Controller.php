<?php


class Controller
{

    public function index()
    {

    }

    public function programmes()
    {
        echo __METHOD__ . "<br>";
        $programmes = new Programme();
        $programmes->fetch("id");
        var_dump($programmes);


        $data = [
            "programmes" => $programmes
        ];
        view('info', 'programmes', $data);
    }


    public function show($vars)
    {
        echo __METHOD__ . "<br>";
        $programmes = new Programme();
        $programmes->find($vars["id"]);
        var_dump($programmes);
        var_dump($vars);

        $data = [
            "programmes" => $programmes
        ];
        view('info', 'show', $data);
    }

}