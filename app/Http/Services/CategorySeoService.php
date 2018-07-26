<?php

namespace App\Http\Services;

/**
 * CategorySeoService
 */
class CategorySeoService extends BaseService
{
    public function seoDetail($data)
    {
        $this->seo()->setTitle($data->title);
        $this->seo()->setDescription('This is my page description');
        $this->seo()->opengraph()->setUrl(app('request')->url());
        $this->seo()->opengraph()->addProperty('type', 'articles');

        return $this;
    }
}
