# Testing Documentation

## Tujuan Testing
Testing dilakukan untuk memastikan fitur-fitur utama pada aplikasi Google Keep CLI dapat berjalan dengan baik. Pengujian dilakukan menggunakan unit testing untuk mengecek fungsi yang ada pada aplikasi serta mocking untuk memastikan hubungan antara service dan repository berjalan sesuai.

## Tools yang Digunakan
Tools yang digunakan dalam proses testing:
- PHP 8.2.29
- PHPUnit 11.5.56
- Mockery
- Xdebug 3.5.3

## Menjalankan Aplikasi
- Aplikasi Google Keep CLI dapat dijalankan melalui terminal menggunakan perintah:
php index.php

## Unit Test yang Dibuat
Pada project ini terdapat beberapa unit test yang dilakukan, yaitu:
1. Test membuat note (`createNote()`)
2. Test menampilkan semua note (`getAllNotes()`)
3. Test update note (`updateNote()`)
4. Test delete note (`deleteNote()`)
5. Test search note (`searchNote()`)
6. Test menampilkan archived note (`getArchivedNotes()`)
   
## Mocking Testing
Mocking dilakukan menggunakan library Mockery.
Mocking digunakan untuk membuat objek tiruan dari NoteRepository sehingga dapat menguji apakah proses penyimpanan note sudah memanggil method repository yang sesuai.
Pengujian mocking yang dilakukan:
- Memastikan method `save()` pada repository dipanggil.
- Memastikan method `save()` dipanggil sebanyak satu kali.
- Memastikan data yang dikirim berupa objek `Note`.

## Cara Menjalankan Testing
- Untuk menjalankan unit test digunakan perintah:
vendor/bin/phpunit
Hasil yg diperoleh:
OK (7 tests, 26 assertions)

-  Untuk melihat code coverage digunakan perintah:
vendor/bin/phpunit --coverage-text
Hasil code coverage yang diperoleh:
- Classes : 25.00%
- Methods : 73.33%
- Lines : 76.06%

Detail coverage:
Models\Note
- Methods : 100.00%
- Lines : 100.00%

Repositories\NoteRepository
- Methods : 66.67%
- Lines : 92.59%

Services\NoteService
- Methods : 85.71%
- Lines : 96.00%

Nilai coverage belum mencapai 100% karena masih terdapat beberapa method dan kondisi tertentu yang belum dibuatkan unit test. Namun sebagian besar fitur utama pada aplikasi Google Keep CLI sudah berhasil diuji.

