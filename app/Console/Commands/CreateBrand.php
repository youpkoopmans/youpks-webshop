<?php

namespace App\Console\Commands;

use App\Models\Brand;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CreateBrand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:brand {title}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new brand';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $title = $this->argument('title');

        Brand::create([
            'title' => $title,
            'slug' => Str::slug($title),
            'published_at' => now()
        ]);

        $this->info("The brand $title is created.");
    }
}
