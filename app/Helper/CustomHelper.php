<?php

    namespace App\Helper;

    use Illuminate\Support\Str;

    class CustomHelper
    {
        public static function generateUuid($model): string
        {
            $id = Str::uuid();
            while ($model::where('id', $id)->exists()) {
                $id = Str::uuid();
            }
            return $id;
        }

        public static function generateUniqueSlug($model, string $title): string
        {
            $slug = Str::slug($title);
            while ($model::where('slug', $slug)->exists()) {
                $slug = $slug . '-' . Str::random(5);
            }
            return $slug;
        }

    }
