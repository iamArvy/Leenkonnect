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
use App\Models\Blog;
use App\Models\BlogCategory;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $role = Role::findOrCreate('superuser');
        // $newpermissions = ['create users', 'assign users', 'view dashboard'];

        // foreach ($newpermissions as $permission) {
        //     Permission::findOrCreate($permission);
        // }
        // $permissions = Permission::all();
        // $role->syncPermissions($permissions);

        // $email = env('SUPERUSER_EMAIL', 'default@example.com'); // Default fallback value
        // $password = env('SUPERUSER_PASSWORD', 'defaultPassword');
        // $user = User::where('email', $email)->first();
        // // dd($email);
        // if(!$user){
        //     $user = User::create([
        //         'name' => 'superuser',
        //         'email' => $email,
        //         'password' => Hash::make($password)
        //     ]);
        // }
        // $user->assignRole($role);


        // Category::truncate(); // Clears all categories and cascades to products if setup
        // Product::truncate(); // Optional if cascade doesn't handle it
        // Review::truncate();  // Optional if cascade doesn't handle it
        // $categories = [
        //     ['name' => 'laptops'],
        //     ['name' => 'printers']
        // ];

        // foreach ($categories as $cat) {
        //     $category = Category::create($cat);
        //     Product::factory()
        //         ->count(60)
        //         ->create(['category_id' => $category->id])
        //         ->each(function ($product) {
        //             Review::factory()->count(5)->create(['product_id' => $product->id]);
        //         });
        // }

        // Testimonial::factory()->count(10)->create();

        // $promotion = Promotion::where(['name' => 'featured'])->first();
        // $products = Product::isFeatured()->get();

        // foreach($products as $product){
        //     $product->promotions()->attach($promotion->id);
        // }
        Blog::truncate();
        BlogCategory::truncate();
        $categories = [
            ['name' => 'laptops'],
            ['name' => 'printers']
        ];

        foreach ($categories as $cat) {
            $category = BlogCategory::create($cat);
            Blog::factory()
                ->count(60)
                ->create(['category_id' => $category->id]);
        }
    }
}
