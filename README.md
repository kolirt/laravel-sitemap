# Laravel Sitemap
Sitemap generator for Laravel projects


# Structure
- [Installation](#installation)
- [Usage](#examples)
  - [Web routes](#web-routes)
  - [SitemapController](#sitemapcontroller)
- [FAQ](#faq)
- [License](#license)
- [Other packages](#other-packages)

<a href="https://www.buymeacoffee.com/kolirt" target="_blank">
  <img src="https://cdn.buymeacoffee.com/buttons/v2/arial-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;" >
</a>


# Installation
```bash
$ composer require kolirt/laravel-sitemap
```


# Usage

### Web routes
```php
Route::get('sitemap.xml', 'SitemapController@index');
```


### SitemapController
```php
class LaravelSitemapController extends Controller
{

    public function index(Request $request)
    {
        $sitemap = new Kolirt\Sitemap\Sitemap;
        $lastMode = Carbon::create(2020, 4, 21, 14, 00, 00);

        $sitemap->setDomain('https://site.com');

        $sitemap->addUrl('', $lastMode, Kolirt\Sitemap\Sitemap::CHANGE_FREG_DAILY, 1);

        $products = [1, 2, 3, 4, 5, 6];
        foreach ($products as $product) {
            $sitemap->addUrl('products/' . $product, $lastMode, Kolirt\Sitemap\Sitemap::CHANGE_FREG_DAILY, 0.8);
        }

        $sitemap->addUrl('page1', $lastMode, Kolirt\Sitemap\Sitemap::CHANGE_FREG_WEEKLY, 0.6);
        $sitemap->addUrl('page2', $lastMode, Sitemap::CHANGE_FREG_MONTHLY, 0.5);

        return $sitemap->render();
    }

}
```


# FAQ
Check closed [issues](https://github.com/kolirt/laravel-sitemap/issues) to get answers for most asked questions


# License
[MIT](LICENSE.txt)


# Other packages
Check out my other packages on my [GitHub profile](https://github.com/kolirt)
