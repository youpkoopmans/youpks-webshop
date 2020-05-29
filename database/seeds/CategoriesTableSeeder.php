<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rootCategory = Category::create([
            'title' => 'Computers',
            'slug' => Str::slug('Computers'),
            'published_at' => now()
        ]);

            $childCategory = Category::create([
                'title' => 'Laptops',
                'slug' => Str::slug('Laptops'),
                'published_at' => now()
            ]);
            $childCategory->makeChildOf($rootCategory);

                $child2Category = Category::create([
                    'title' => 'Gaming laptops',
                    'slug' => Str::slug('Gaming laptops'),
                    'published_at' => now()
                ]);
                $child2Category->makeChildOf($childCategory);

                $child2Category = Category::create([
                    'title' => 'Zakelijke laptops',
                    'slug' => Str::slug('Zakelijke laptops'),
                    'published_at' => now()
                ]);
                $child2Category->makeChildOf($childCategory);

            $childCategory = Category::create([
                'title' => 'Desktops',
                'slug' => Str::slug('Desktops'),
                'published_at' => now()
            ]);
            $childCategory->makeChildOf($rootCategory);

                $child2Category = Category::create([
                    'title' => 'Gaming desktops',
                    'slug' => Str::slug('Gaming desktops'),
                    'published_at' => now()
                ]);
                $child2Category->makeChildOf($childCategory);

                $child2Category = Category::create([
                    'title' => 'Zakelijke desktops',
                    'slug' => Str::slug('Zakelijke desktops'),
                    'published_at' => now()
                ]);
                $child2Category->makeChildOf($childCategory);

            $childCategory = Category::create([
                'title' => 'Monitoren',
                'slug' => Str::slug('Monitoren'),
                'published_at' => now()
            ]);
            $childCategory->makeChildOf($rootCategory);

                $child2Category = Category::create([
                    'title' => 'Gaming monitoren',
                    'slug' => Str::slug('Gaming monitoren'),
                    'published_at' => now()
                ]);
                $child2Category->makeChildOf($childCategory);

                $child2Category = Category::create([
                    'title' => 'Zakelijke monitoren',
                    'slug' => Str::slug('Zakelijke monitoren'),
                    'published_at' => now()
                ]);
                $child2Category->makeChildOf($childCategory);

        $rootCategory = Category::create([
            'title' => 'Telefoons',
            'slug' => Str::slug('Telefoons'),
            'published_at' => now()
        ]);

            $childCategory = Category::create([
                'title' => 'Mobiele telefoons',
                'slug' => Str::slug('Mobiele telefoons'),
                'published_at' => now()
            ]);
            $childCategory->makeChildOf($rootCategory);

                $child2Category = Category::create([
                    'title' => 'Smartphones',
                    'slug' => Str::slug('Smartphones'),
                    'published_at' => now()
                ]);
                $child2Category->makeChildOf($childCategory);

                $child2Category = Category::create([
                    'title' => 'Gsm\'s',
                    'slug' => Str::slug('Gsm\'s'),
                    'published_at' => now()
                ]);
                $child2Category->makeChildOf($childCategory);

            $childCategory = Category::create([
                'title' => 'Vaste telefoons',
                'slug' => Str::slug('Vaste telefoons'),
                'published_at' => now()
            ]);
            $childCategory->makeChildOf($rootCategory);

                $child2Category = Category::create([
                    'title' => 'DECT telefoons',
                    'slug' => Str::slug('DECT telefoons'),
                    'published_at' => now()
                ]);
                $child2Category->makeChildOf($childCategory);

                $child2Category = Category::create([
                    'title' => 'Handsets',
                    'slug' => Str::slug('Handsets'),
                    'published_at' => now()
                ]);
                $child2Category->makeChildOf($childCategory);

        $rootCategory = Category::create([
            'title' => 'Beeld & geluid',
            'slug' => Str::slug('Beeld & geluid'),
            'published_at' => now()
        ]);

            $childCategory = Category::create([
                'title' => 'Televisies & beamers',
                'slug' => Str::slug('Televisies & beamers'),
                'published_at' => now()
            ]);
            $childCategory->makeChildOf($rootCategory);

                $child2Category = Category::create([
                    'title' => 'Televisies',
                    'slug' => Str::slug('Televisies'),
                    'published_at' => now()
                ]);
                $child2Category->makeChildOf($childCategory);

                $child2Category = Category::create([
                    'title' => 'Beamers',
                    'slug' => Str::slug('Beamers'),
                    'published_at' => now()
                ]);
                $child2Category->makeChildOf($childCategory);

            $childCategory = Category::create([
                'title' => 'Radio\'s & speakers',
                'slug' => Str::slug('Radio\'s & speakers'),
                'published_at' => now()
            ]);
            $childCategory->makeChildOf($rootCategory);

                $child2Category = Category::create([
                    'title' => 'Radio\'s',
                    'slug' => Str::slug('Radio\'s'),
                    'published_at' => now()
                ]);
                $child2Category->makeChildOf($childCategory);

                $child2Category = Category::create([
                    'title' => 'Speakers',
                    'slug' => Str::slug('Speakers'),
                    'published_at' => now()
                ]);
                $child2Category->makeChildOf($childCategory);

    }
}
