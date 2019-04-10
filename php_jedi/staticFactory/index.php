<?php

interface FormatterInterface {
    public function format($n);
}

final class StaticFactory {
    public static function make($type) {
        if($type == "number") {
            return new FormatNumber();
        }
        if($type == "string") {
            return new FormatString();
        }
    }
}

class FormatNumber implements FormatterInterface {
    public function format($n) {
        echo "Formatando numero: ". $n;
    }
}

class FormatString implements FormatterInterface {
    public function format($n) {
        echo "Formatando string: ". $n;
    }
}

$Formatter = StaticFactory::make("string");
$Formatter->format("Testando 1,2,3...<br>");

$Formatter = StaticFactory::make("number");
$Formatter->format("123<br>");

?>