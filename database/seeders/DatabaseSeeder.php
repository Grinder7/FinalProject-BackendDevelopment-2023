<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Product::create([
            'name' => 'Indomie Goreng',
            'stock' => 10,
            'price' => 3100,
            'description' => 'Indomie Goreng adalah mie instan rasa goreng yang terbuat dari bahan-bahan berkualitas. Indomie Goreng memiliki rasa yang khas pedas dan gurih. Indomie Goreng dapat dinikmati oleh semua kalangan usia.',
            'img' => '0lxKQl2mvqEh70XLvgIA.png',
        ]);
        Product::create([
            'name' => 'Indomie Goreng Jumbo',
            'stock' => 15,
            'price' => 4300,
            'description' => 'Indomie Goreng Jumbo adalah varian mie instan yang lebih besar dari ukuran standar, memberikan pengalaman makan yang lebih puas dan kenikmatan yang berlipat ganda. ',
            'img' => 'Iyo3eLTieosZSvRJTGQl.png',
        ]);
        Product::create([
            'name' => 'Indomie Goreng Jumbo Rasa Ayam Panggang',
            'stock' => 5,
            'price' => 4200,
            'description' => 'Dapatkan pengalaman makan yang memuaskan dan puas dengan Indomie Goreng Jumbo Rasa Ayam Panggang, pilihan sempurna untuk Anda yang ingin menikmati hidangan mie instan dengan cita rasa yang lezat dan mengenyangkan.',
            'img' => 'AgjiGLoxvt5GDpk7bh8B.jpg',
        ]);
        Product::create([
            'name' => 'Indomie Kuah Rasa Kaldu Ayam',
            'stock' => 20,
            'price' => 3000,
            'description' => 'Rasakan kelezatan lezat dalam setiap sendokan dengan Indomie Kuah Rasa Kaldu Ayam, sajian mie instan yang menggugah selera! Dengan kuah kaldu ayam yang kaya dan bumbu rahasia kami, setiap tegukan akan memanjakan lidah Anda dengan cita rasa yang autentik dan menghangatkan hati.',
            'img' => 'HJpiy51TDS6Be8q2v8LE.jpg',
        ]);
        Product::create([
            'name' => 'Indomie Kuah Rasa Ayam Bawang',
            'stock' => 23,
            'price' => 3000,
            'description' => 'Rasakan harmoni cita rasa ayam yang gurih dan aroma bawang yang menggoda dengan Indomie Kuah Rasa Ayam Bawang, pilihan sempurna untuk memanjakan lidah Anda!',
            'img' => 'zw34JULbUEUB3us1VzcW.jpg',
        ]);
        Product::create([
            'name' => 'Indomie Goreng Premium Japanese Takoyaki',
            'stock' => 30,
            'price' => 5900,
            'description' => 'Jelajahi kelezatan baru dengan Indomie Goreng Premium Japanese Takoyaki, hidangan mie instan yang menghadirkan sensasi makan yang luar biasa! Rasakan perpaduan sempurna antara mie kuning yang kenyal dan bumbu premium takoyaki yang kaya akan rasa dan aroma.',
            'img' => 'uZqpGDT91YEbzLHnzd7o.jpg',
        ]);
        Product::create([
            'name' => 'Indomie Goreng Premium Japanese Shoyu',
            'stock' => 40,
            'price' => 5900,
            'description' => 'Rasakan keanggunan cita rasa Jepang dengan Indomie Goreng Premium Japanese Shoyu, hidangan mie instan yang membawa Anda dalam petualangan kuliner yang otentik! Dibuat dengan mie kuning berkualitas tinggi dan bumbu khas shoyu Jepang yang lezat, setiap suapan akan memanjakan lidah Anda dengan keharmonisan rasa gurih dan sedikit manis.',
            'img' => 'GSuo1GLnektTGtpSPmDL.jpg',
        ]);
        Product::create([
            'name' => 'Indomie Goreng Premium Japanese Miso',
            'stock' => 20,
            'price' => 5900,
            'description' => 'Selamat datang di dunia cita rasa Jepang yang luar biasa dengan Indomie Goreng Premium Japanese Miso, hidangan mie instan yang menghadirkan kelezatan yang autentik dan memikat! Dibuat dengan mie kuning yang kenyal dan bumbu premium miso Jepang yang kaya akan rasa, setiap suapan akan memanjakan lidah Anda dengan kombinasi unik dari gurih, manis, dan sedikit asin.',
            'img' => '4Du4uPsa6q5J8xfpLkna.jpg',
        ]);
        $test_admin = User::create([
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'is_admin' => true,

        ]);
        Payment::create([
            'user_id' => $test_admin->id,
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'email' => 'admin@gmail.com',
            'address' => 'Araya Mansion No.8-22, Malang',
            'zip' => '65154',
            'remember_detail' => true,
        ]);
        $test_user = User::create([
            'username' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password'),
            'is_admin' => false,
        ]);
    }
}
