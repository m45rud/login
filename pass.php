<?php

    $options = [
        'cost' => 5
    ];

    echo password_hash("masrud.com", PASSWORD_DEFAULT, $options);

?>
