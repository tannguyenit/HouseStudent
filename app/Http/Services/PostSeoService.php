<?php

namespace App\Http\Services;

/**
 * PostSeoService
 */
class PostSeoService extends BaseService
{
    public function seoDetail($data)
    {
        $this->seo()->setTitle($data->title);
        $this->seo()->setDescription($data->description);
        $this->seo()->opengraph()->setUrl(app('request')->url());
        $this->seo()->opengraph()->addProperty('type', 'articles', 'Bai dang');

        return $this;
    }

    public function seoTowship($datas)
    {
        foreach ($datas as $key => $data) {
            $this->seo()->setTitle($data->title);
            $this->seo()->setDescription($data->description);
            $this->seo()->opengraph()->setUrl(app('request')->url());
            $this->seo()->opengraph()->addProperty('type', 'articles', 'Bai dang');
        }

        return $this;
    }
}
