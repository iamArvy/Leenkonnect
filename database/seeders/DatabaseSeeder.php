<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use App\Models\Store\Product;
use App\Models\Store\Review;
use App\Models\Store\Category;
use App\Models\Testimonial;
use App\Models\Store\Promotion;
use App\Models\Blog\Blog;
use App\Models\Blog\Category as BlogCategory;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $role = Role::findOrCreate('superuser');
        // $newpermissions = [
        //     'create users',
        //     'assign users',
        //     'view dashboard',
        //     'control access',
        //     'view store'
        // ];

        // foreach ($newpermissions as $permission) {
        //     Permission::findOrCreate($permission);
        // }
        // $permissions = Permission::all();
        // $role->syncPermissions($permissions);

        // $email = env('SUPERUSER_EMAIL', 'default@example.com'); // Default fallback value
        // $password = env('SUPERUSER_PASSWORD', 'defaultPassword');
        // $user = User::where('email', $email)->first();
        // if(!$user){
        //     $user = User::create([
        //         'name' => 'superuser',
        //         'email' => $email,
        //         'password' => Hash::make($password)
        //     ]);
        // }
        // $user->assignRole($role);

        // $categories = [
        //     ['name' => 'laptops'],
        //     ['name' => 'printers']
        // ];
        $categories = BlogCategory::all();
        foreach ($categories as $cat) {
            // $category = Category::create(['name' => 'printers']);
            Product::factory()
                ->count(60)
                ->create(['category_id' => $category->id])
                ->each(function ($product) {
                    Review::factory()->count(5)->create(['product_id' => $product->id]);
                });
        }

        Testimonial::factory()->count(10)->create();

        $promotion = Promotion::create(['name' => 'featured']);
        $products = Product::all();
        foreach($products as $product){
            $product->promotions()->attach($promotion->id);
        }
        $blogcategories = [
            ['name' => 'laptops'],
            ['name' => 'printers']
        ];

        foreach ($blogcategories as $cat) {
            $category = BlogCategory::create($cat);
            Blog::factory()
                ->count(20)
                ->create(['category_id' => $category->id]);
        }
    }
}
