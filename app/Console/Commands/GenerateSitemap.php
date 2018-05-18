<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap; 
use Moqdma;
use Sheikh;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.';

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
        $sitemap = Sitemap::create()
            ->add(Route('home'))
            ->add(Route('all-moqdmat'))
            ->add(Route('all-sheikhs'))
            ->add(Route('about'))
            ->add(Route('contact'));

        Moqdma::where('active',1)->get()->each(function (Moqdma $moqdma) use ($sitemap) {
            $sitemap->add(Route('moqdma-listen',[$moqdma->id]));
        });

        Sheikh::where('active',1)->get()->each(function (Sheikh $sheikh) use ($sitemap) { 
            $sitemap->add(Route('sheikh-moqdmat',[$sheikh->id]));
        });

        $sitemap->writeToFile(public_path('sitemap.xml'));
    }
}
