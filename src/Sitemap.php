<?php

namespace Kolirt\Sitemap;

class Sitemap
{

    private $domain = '';

    private $urls = [];

    const CHANGE_FREG_ALWAYS = 'always';
    const CHANGE_FREG_HOURLY = 'hourly';
    const CHANGE_FREG_DAILY = 'daily';
    const CHANGE_FREG_WEEKLY = 'weekly';
    const CHANGE_FREG_MONTHLY = 'monthly';
    const CHANGE_FREG_YEARLY = 'yearly';
    const CHANGE_FREG_NEVER = 'never';

    public function render()
    {
        return response()->view('sitemap::sitemap', ['sitemap' => $this])->header('Content-Type', 'text/xml');
    }

    public function addUrl($loc, $lastmod = null, $changefreq = null, float $priority = null)
    {
        $this->validateChangefreq($changefreq);

        $this->urls[] = [
            'loc' => $this->prepareLoc($loc),
            'lastmod' => $lastmod ? $lastmod->toAtomString() : null,
            'changefreq' => $changefreq,
            'priority' => $priority
        ];
    }

    public function setDomain(string $domain)
    {
        $this->domain = preg_replace('#\/$#', '', $domain);
    }

    public function getUrls()
    {
        return $this->urls;
    }

    public function getDomain()
    {
        return $this->domain;
    }


    private function prepareLoc($loc)
    {
        $result = $this->getDomain() . '/' . $loc;
        return preg_replace('#\/$#', '', $result);
    }

    private function validateChangefreq($changefreq)
    {
        $frequencies = [
            'always',
            'hourly',
            'daily',
            'weekly',
            'monthly',
            'yearly',
            'never'
        ];
        if ($changefreq !== null && !in_array($changefreq, $frequencies)) {
            throw new \Exception('Available changefreq: ', implode(', ', $frequencies));
        }
    }

}
