<?php

function dateSlovak()

{
    $den = array ("Nedeľa", "Pondelok", "Utorok", "Streda", "Štvrtok", "Piatok",
        "Sobota");

    $mesiace = array ("Január", "Február", "Marec", "Apríl", "Máj", "Jún", "Júl",
        "August", "September", "Október", "November", "December");

    return $den[Date("w")]. ", ".Date ("j") . "." .$mesiace[Date ("n") - 1]. " " .
        Date ("Y");
}

echo dateSlovak();
?>
