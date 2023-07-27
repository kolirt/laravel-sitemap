@php
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\r\n";
    echo "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\r\n";
    foreach ($sitemap->getUrls() as $url) {
        echo "\t<url>\r\n";
        echo "\t\t<loc>" . $url['loc'] . "</loc>\r\n";
        if ($url['lastmod'] !== null) {
            echo "\t\t<lastmod>" . $url['lastmod'] . "</lastmod>\r\n";
        }
        if ($url['changefreq'] !== null) {
            echo "\t\t<changefreq>" . $url['changefreq'] . "</changefreq>\r\n";
        }
        if ($url['priority'] !== null) {
            echo "\t\t<priority>" . $url['priority'] . "</priority>\r\n";
        }
        echo "\t</url>\r\n";
    }
    echo '</urlset>';
@endphp
