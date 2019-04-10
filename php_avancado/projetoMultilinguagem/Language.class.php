<?php

class Language {

    private $language, $ini, $language_db;

    public function __construct() {
        $this->language = 'pt-br';

        if(!empty($_SESSION['lang']) && file_exists('lang/'.$_SESSION['lang'].'.ini')) {
            $this->language = $_SESSION['lang'];
        } else {
            header("Location: index.php?lang=pt-br");
        }

        $this->ini = parse_ini_file('lang/'.$this->language.'.ini');

        global $pdo;
        $sql = "SELECT * FROM tb_language WHERE lang = :lang";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":lang", $this->language);
        $sql->execute();

        if($sql->rowCount() > 0) {
            foreach ($sql->fetchAll() as $item) {
                $this->language_db[$item['name']] = $item['value'];
            }
        }
    }

    public function getLanguage() {
        return $this->language;
    }
    
    public function get($word, $return = false) {
        $text = $word;

        if(isset($this->ini[$word])) {
            $text = $this->ini[$word];
        } elseif(isset($this->language_db[$word])) {
            $text = $this->language_db[$word];
        }


        if($return) {
            return $text;
        } else {
            echo $text;
        }
    }

}

?>