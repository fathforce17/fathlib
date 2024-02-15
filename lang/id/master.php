<?php 
 
return [ 
    'master' => 'Master', 
    'productcategory' => [ 
        'productcategory' => 'Kategori Produk', 
        'props' => [ 
            'title' => 'Judul', 
        ], 
    ], 
    'product' => [ 
        'product' => 'Daftar Produk', 
        'products' => 'Daftar Produk', 
        'props' => [ 
            'name' => 'Nama', 
            'description' => 'Deskripsi', 
        ], 
    ], 
    'book' => [ 
        'book' => 'Buku', 
        'props' => [ 
            'title' => 'Judul',
            'name' => 'Penulis',
            'number' => 'Tahun',
            'publisher' => 'Penerbit',
            'description' => 'Sinopsis',
        ], 
    ], 
    'borrowing' => [ 
        'borrowing' => 'Daftar Pinjaman', 
        'borrowings' => 'Daftar Pinjaman', 
        'props' => [ 
            'name' => 'Nama', 
            'description' => 'Deskripsi',
            'date' => 'Tanggal', 
        ], 
    ], 
];