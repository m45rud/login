<?php

    $options = [
        'cost' => 5
    ];

    echo password_hash("admin", PASSWORD_DEFAULT, $options);

?>
