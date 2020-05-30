<?php


class Programme
{
    public $id, $name, $description;

    public function __construct(
        string $name = null,
        string $description = null,
        int $id = null
    )

    {
        $name ? $this->name = $name : false;
        $description ? $this->description = $description : false;
        $id ? $this->id = $id : false;
    }

    public function fetch(int $id)
    {
        $id = filter_var($id, FILTER_SANITIZE_SPECIAL_CHARS);
        $query = "select * from programmes where id=:id";
        $stmt = Singleton::getInstance()->getPDO()->prepare($query);
        $stmt->bindValue(':id',$id);
        $stmt->execute();
        $result = $stmt->fetch();

        if($result){
            $this->name = $result->Id;
            $this->description = $result->description;
        }

    }

}




