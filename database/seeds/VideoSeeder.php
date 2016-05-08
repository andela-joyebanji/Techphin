<?php

use Illuminate\Database\Seeder;
use Pyjac\Techphin\Category;
use Pyjac\Techphin\Tag;
use Pyjac\Techphin\User;
use Pyjac\Techphin\Video;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $pyjac = User::where('username', '=', 'pyjac')->first();
        //$pyjacAdmin = User::where('username', '=', 'pyjacAdmin')->first();

        $phpCat = Category::create(['name' => 'PHP', 'icon' => 'devicon-php-plain']);
        $laravelCat = Category::create(['name' => 'Laravel', 'icon' => 'devicon-laravel-plain']);
        $javascriptCat = Category::create(['name' => 'Javascript', 'icon' => 'devicon-javascript-plain']);
        $angularCat = Category::create(['name' => 'Angular', 'icon' => 'devicon-angularjs-plain']);

        $this->seedPHPVideos($phpCat->id, $pyjac);
        $this->seedLaravelVideos($laravelCat->id, $pyjac);
        $this->seedJavascriptVideos($javascriptCat->id, $pyjac);
        $this->seedAngularVideos($angularCat->id, $pyjac);
    }

    private function seedPHPVideos($CategoryId, $user)
    {
        $video = new Video([
                            'title'       => 'New features in PHP 7: a quick overview',
                            'link'        => 'https://www.youtube.com/watch?v=Yhn5snJGvAo',
                            'description' => "PHP 7 has finally been released. It's a mile stone release that offers a lot of new features.",
                            'category_id' => $CategoryId, ]);
        $user->videos()->save($video);
        $this->attachTagsToVideo($video, ['php', 'php7']);

        $video = new Video([
                            'title'       => 'Creating a PHP Search',
                            'link'        => 'https://www.youtube.com/watch?v=PBLuP2JZcEg',
                            'description' => 'This is a tutorial which goes over how to create a PHP search which filters out results from a database table.',
                            'category_id' => $CategoryId, ]);
        $user->videos()->save($video);
        $this->attachTagsToVideo($video, ['php', 'search']);

        $video = new Video([
                            'title'       => 'Learn PHP - Isset Function',
                            'link'        => 'https://www.youtube.com/watch?v=_G7r5WAVwsY',
                            'description' => "This is a small function and a very small tutorial, it was important to get this tutorial out there as very early on we start to use it. I hope you don't mind the short-ness of this tutorial.",
                            'category_id' => $CategoryId, ]);
        $user->videos()->save($video);
        $this->attachTagsToVideo($video, ['php', 'isset']);
    }

    private function seedLaravelVideos($CategoryId, $user)
    {
        $video = new Video([
                            'title'       => 'Laravel Routing',
                            'link'        => 'https://www.youtube.com/watch?v=Zo8z6mGGw40',
                            'description' => "In this video we'll be talking about Routing. Learn how easy it is to create routes for your application using Laravel.",
                            'category_id' => $CategoryId, ]);
        $user->videos()->save($video);
        $this->attachTagsToVideo($video, ['php', 'laravel', 'routing']);

        $video = new Video([
                            'title'       => 'Laravel Authentication',
                            'link'        => 'https://www.youtube.com/watch?v=k89EOb9fqa0',
                            'description' => "In this video we'll teach you how you can easily build a full authentication system for your Laravel app in a matter of minutes.",
                            'category_id' => $CategoryId, ]);
        $user->videos()->save($video);
        $this->attachTagsToVideo($video, ['php', 'laravel', 'authentication']);

        $video = new Video([
                            'title'       => 'Requests, CSRF, and Wrapping Up',
                            'link'        => 'https://www.youtube.com/watch?v=AOgfNMtfvyo',
                            'description' => "In this video we'll be wrapping the series up. Before we wrap everything up we quickly wanted to talk about Requests and CSRF protection.",
                            'category_id' => $CategoryId, ]);
        $user->videos()->save($video);
        $this->attachTagsToVideo($video, ['php', 'laravel', 'Requests', 'CSRF']);
    }

    private function seedJavascriptVideos($CategoryId, $user)
    {
        $video = new Video([
                            'title'       => 'Closures in Javascript',
                            'link'        => 'https://www.youtube.com/watch?v=CQqwU2Ixu-U',
                            'description' => 'A short video explaining the concept of closures, using JavaScript. This is part of a series, where are learning functional programming using JavaScript.',
                            'category_id' => $CategoryId, ]);
        $user->videos()->save($video);
        $this->attachTagsToVideo($video, ['js', 'javascript', 'Closures']);

        $video = new Video([
                            'title'       => 'Currying in Javascript',
                            'link'        => 'https://www.youtube.com/watch?v=iZLP4qOwY8I',
                            'description' => 'A short video explaining the concept of curring, using JavaScript. This is part of a series, where are learning functional programming using JavaScript.',
                            'category_id' => $CategoryId, ]);
        $user->videos()->save($video);
        $this->attachTagsToVideo($video, ['js', 'javascript', 'Currying']);
    }

    private function seedAngularVideos($CategoryId, $user)
    {
        $video = new Video([
                            'title'       => 'Thinking in Angular 2.0',
                            'link'        => 'https://www.youtube.com/watch?v=XlqoPpLMdwY',
                            'description' => 'Thinking in Angular 2 - An overview of key Angular 2.0 concepts for Angular 1.0 and traditional javascript ',
                            'category_id' => $CategoryId, ]);
        $user->videos()->save($video);
        $this->attachTagsToVideo($video, ['js', 'javascript', 'angular', 'angular2']);

        $video = new Video([
                            'title'       => 'Mastering Your Angular 2 Workflow',
                            'link'        => 'https://www.youtube.com/watch?v=NSibZPEtm7o',
                            'description' => "Mastering Your Angular Workflow with BataRangle, Angular 2 CLI, TypeScript, Webpack, and other Key Tools - with Rangle's Angular 2 team.",
                            'category_id' => $CategoryId, ]);
        $user->videos()->save($video);
        $this->attachTagsToVideo($video, ['js', 'angular']);
    }

    private function attachTagsToVideo($video, $tags)
    {
        $tagsCollection = [];
        foreach ($tags as $key => $tag) {
            $tagModel = Tag::firstOrCreate(['name' => strtolower($tag)]);
            $tagsCollection[] = $tagModel->id;
        }
        $video->tags()->attach($tagsCollection);
    }
}
