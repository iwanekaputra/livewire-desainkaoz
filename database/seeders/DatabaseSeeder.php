<?php

namespace Database\Seeders;

use App\Models\Bank;
use App\Models\Category;
use App\Models\Color;
use App\Models\Mockups;
use App\Models\DesignCategory;
use App\Models\ProductDesign;
use App\Models\Role;
use App\Models\Size;
use App\Models\Slider;
use App\Models\Style;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


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

        SubCategory::create([
            'name' => 'Clothing',
        ]);

        SubCategory::create([
            'name' => 'Accesories'
        ]);

        SubCategory::create([
            'name' => 'Kids'
        ]);

        SubCategory::create([
            'name' => 'Custom'
        ]);

        Category::create([
            'name' => 'T shirt',
            'slug' => 'tshirt',
            'image' => 'tshirt.png',
            'icon' => 'tshirt.svg',
            'sub_category_id' => 1
        ]);

        Category::create([
            'name' => 'Hoodie',
            'slug' => 'hoodie',
            'image' => 'hoodie.png',
            'icon' => 'hoodi.svg',
            'sub_category_id' => 1
        ]);

        Category::create([
            'name' => 'Sweater',
            'slug' => 'sweater',
            'image' => 'sweater.png',
            'icon' => 'sweater.svg',
            'sub_category_id' => 1
        ]);

        Category::create([
            'name' => 'Topi',
            'slug' => 'topi',
            'image' => 'topi.png',
            'icon' => 'topi.svg',
            'sub_category_id' => 2
        ]);

        Category::create([
            'name' => 'Bag',
            'slug' => 'bag',
            'image' => 'bag.png',
            'icon' => 'tas.svg',
            'sub_category_id' => 2
        ]);

        Category::create([
            'name' => 'Sticker',
            'slug' => 'sticker',
            'image' => 'sticker.png',
            'icon' => 'sticker.svg',
            'sub_category_id' => 4
        ]);

        DesignCategory::create([
            'name' => 'Islami',
            'slug' => 'islami',
            'image' => 'islamic-nobg.svg',
            'icon' => 'islamic.svg'
        ]);

        DesignCategory::create([
            'name' => 'Motor',
            'slug' => 'motor',
            'image' => 'motorcycle-nobg.svg',
            'icon' => 'motorcycle.svg'
        ]);

        DesignCategory::create([
            'name' => 'Car',
            'slug' => 'car',
            'image' => 'car-nobg.svg',
            'icon' => 'car.svg'
        ]);

        DesignCategory::create([
            'name' => 'Sport',
            'slug' => 'sport',
            'image' => 'sport-nobg.svg',
            'icon' => 'sport.svg'
        ]);

        DesignCategory::create([
            'name' => 'Motivasi',
            'slug' => 'motivasi',
            'image' => 'motivation-nobg.svg',
            'icon' => 'motivation.svg'
        ]);

        DesignCategory::create([
            'name' => 'Army',
            'slug' => 'army',
            'image' => 'army-nobg.svg',
            'icon' => 'army.svg'
        ]);

        DesignCategory::create([
            'name' => 'Iconic',
            'slug' => 'iconic',
            'image' => 'city-nobg.svg',
            'icon' => 'city.svg'
        ]);

        DesignCategory::create([
            'name' => 'Outdoor',
            'slug' => 'outdoor',
            'image' => 'outdoor-nobg.svg',
            'icon' => 'outdoor.svg'
        ]);

        DesignCategory::create([
            'name' => 'Cute',
            'slug' => 'cute',
            'image' => 'cute-nobg.svg',
            'icon' => 'cute.svg'
        ]);

        DesignCategory::create([
            'name' => 'Brand',
            'slug' => 'brand',
            'image' => 'brand-nobg.svg',
            'icon' => 'brand.svg'
        ]);

        DesignCategory::create([
            'name' => 'Hobby',
            'slug' => 'hobby',
            'image' => 'hobby-nobg.svg',
            'icon' => 'hobby.svg'
        ]);

        Slider::create([
            'image' => 'DK_1.png'
        ]);
        Slider::create([
            'image' => 'DK_2.png'
        ]);
        Slider::create([
            'image' => 'DK_3.png'
        ]);
        Slider::create([
            'image' => 'DK_4.png'
        ]);

        // ProductDesign::create([
        //     'name' => 'motor',
        //     'category_design_id' => 2,
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur quidem beatae, commodi expedita libero nam aliquid temporibus porro in placeat consectetur delectus molestiae ipsam ut odit cumque praesentium facere voluptates!',
        //     'tags' => 'motor',
        //     'image' => 'brand.svg',
        //     'user_id' => 2,
        //     'price' => '800000'
        // ]);

        // ProductDesign::create([
        //     'name' => 'islami',
        //     'category_design_id' => 1,
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur quidem beatae, commodi expedita libero nam aliquid temporibus porro in placeat consectetur delectus molestiae ipsam ut odit cumque praesentium facere voluptates!',
        //     'tags' => 'islami',
        //     'image' => 'islamic.svg',
        //     'user_id' => 2,
        //     'price' => '200000'
        // ]);

        Bank::create([
            'name' => 'Bank BRI',
        ]);

        Bank::create([
            'name' => 'Bank BCA',
        ]);

        Bank::create([
            'name' => 'Bank BNI',
        ]);

        Bank::create([
            'name' => 'Bank MANDIRI',
        ]);

        Bank::create([
            'name' => 'Bank BSI',
        ]);

        Bank::create([
            'name' => 'Bank CIMB Niaga',
        ]);

        Bank::create([
            'name' => 'PERMATA BANK',
        ]);

        Style::create([
            'name' => 'Lengan Pendek'
        ]);

        Style::create([
            'name' => 'Lengan Panjang'
        ]);

        Color::create([
            'name' => 'red',
        ]);

        Color::create([
            'name' => 'black'
        ]);

        Color::create([
            'name' => 'white'
        ]);

        Size::create([
            'number' => '33',
        ]);

        Size::create([
            'number' => '34'
        ]);

        Size::create([
            'number' => '35'
        ]);

        Role::create([
            'name' => 'admin'
        ]);

        Role::create([
            'name' => 'designer'
        ]);
        Role::create([
            'name' => 'user'
        ]);


        User::create([
            'first_name' => 'admin',
            'last_name' => '123',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin12345'),
            'role_id' => 1,
            'status' => 1,
            'is_email_verified' => 1
        ]);

        User::create([
            'first_name' => 'designer',
            'last_name' => '123',
            'email' => 'designer@gmail.com',
            'password' => Hash::make('designer12345'),
            'role_id' => 2,
            'status' => 1,
            'is_email_verified' => 1
        ]);

        User::create([
            'first_name' => 'user',
            'last_name' => '123',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user12345'),
            'role_id' => 3,
            'status' => 1,
            'is_email_verified' => 1
        ]);
    }
}
