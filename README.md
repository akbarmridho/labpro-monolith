<h1 align="center"> Labpro Monolith Service </h1>

<p align="center">Author: Akbar Maulana Ridho (13521093)</p>

## Languages, Libraries and Tech Stack

- PHP 8
- Laravel 10
- Bootstrap 5

## Setup

```bash
$ cp .env.example .env
```

```bash
$ composer install
```

```bash
$ ./vendor/bin/sail up
```

```bash
$ ./vendor/bin/sail artisan migrate
```

```bash
$ ./vendor/bin/sail artisan key:generate
```

```bash
$ ./vendor/bin/sail artisan jwt:secret
```

```bash
$ npm install
```

Change `SINGLE_BASE_URL=` in env file with the single service url

## Running The App

```bash
$ ./vendor/bin/sail up
```

```bash
$ npm run dev
```

Open at `http://localhost`

## Design Pattern

### Repository Pattern

Perhatikan bahwa sumber data pada service ini tidak hanya pada database saja, tetapi juga menggunakan data pada service
lain. Oleh karena itu, kita bisa memisahkan logic dan melakukan abstraksi untuk melakukan query pada service luar
tersebut dengan menggunakan
repository pattern.

### Dependency Injection

Digunakan agar project ini bisa terpisah-pisah menjadi modul yang mudah dibongkar pasang dan mempermudah pengaturan
dependency suatu kelas. Selain itu, kelas yang membutuhkan suatu dependency tidak perlu pusing untuk memikirkan
bagaimana cara membuat dan mengatur lifecycle kelas tersebut.

### Model View Controller

Design pattern ini merupakan salah satu design pattern bawaan Laravel, yang memisahkan kode menjadi tiga bagian yang
terdiri dari model, view, dan controller. Model bertugas untuk menyiapkan, mengatur, dan memanipulasi dan
mengorganisasikan data yang ada di database. View bertugas untuk menampilkan informasi dalam bentuk GUI. Controller
bertugas untuk menghubungkan serta mengatur model dan view agar dapat saling terhubung.

Design pattern ini dipilih karena merupakan design pattern yang umum dalam service monolith seperti ini dan memudahkan
pemisahan logic antara model-view-controller. Setiap controlller terdapat pada folder app/Http/Controller, setiap model
terdapat pada folder app/Models dan app/Http/Resources, dan template view terdapat pada folder resources/view.

## Endpoint

- `/login` GET request, untuk menampilkan form login
- `/login` POST request, untuk melakukan aksi login
- `/register` GET request, untuk menampilkan form registrasi
- `/register` POST request, untuk melakukan aksi registrasi
- `/logout` POST request, untuk melakukan aksi logout
- `/` GET request, untk menampilkan homepage yang berisi daftar item yang bisa dibeli
- `/items/{id}` GET request, untuk menampilkan detail suatu barang
- `/items/{id}/purchase` GET request, untuk menampilkan halaman checkout barang tersebut
- `/purchase` POST request, untuk melakukan pembelian suatu barang
- `/item-history` GET request, untuk menampilkan daftar pembelian yang pernah dilakukan oleh pengguna yang sedang login.

## Bonus

### Responsive layout

Banyaknya card pada home dan history page tiap rownya akan mengikuti lebar tampilan sehingga bisa dibilang responsive.

### SOLID

Cukup jelas bila memperhatikan folder structure dan isi kodenya.
