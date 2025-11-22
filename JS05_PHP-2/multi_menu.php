<?php
$menu = [
    [
        "name" => "Beranda"
    ],
    [
        "name" => "Berita",
        "subMenu" => [
            [
                "name" => "Wisata",
                "subMenu" => [
                    ["name" => "Pantai"],
                    ["name" => "Gunung"]
                ]
            ],
            ["name" => "Kuliner"],
            ["name" => "Hiburan"]
        ]
    ],
    ["name" => "Tentang"],
    ["name" => "Kontak"]
];

function tampilkanMenuBertingkat(array $menu) {
    echo "<ul>";
    foreach ($menu as $item) {
        echo "<li>{$item['name']}";
        if (isset($item['subMenu'])) {
            tampilkanMenuBertingkat($item['subMenu']); 
        }
        echo "</li>";
    }
    echo "</ul>";
}

tampilkanMenuBertingkat($menu);
?>
