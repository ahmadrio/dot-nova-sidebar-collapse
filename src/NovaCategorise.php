<?php

namespace Opanegro\DotNovaSidebarCollapse;

use Illuminate\Http\Request;
use Laravel\Nova\Nova;

class NovaCategorise extends Nova
{
    /**
     * filter available resources property variable category
     *
     * @param Request $request
     * @return mixed
     */
    public static function availableResourcesGrouped(Request $request)
    {
        return collect(self::availableResources($request))->filter(function ($resource) {
            return $resource::$displayInNavigation;
        })->groupBy(function ($resource) {
            if (property_exists($resource, 'category')) {
                return __(ucwords($resource::$category));
            }

            return __('Other');
        })->sortKeys();
    }

    /**
     * filter resources if active in url key return with boolean
     *
     * @param $resources
     * @return string
     */
    public static function resourceUriKeysBoolean($resources)
    {
        $array = [];
        foreach ($resources as $key => $resource) $array[] = \request()->segment(3) == $resource::uriKey() ? true : false;
        return collect($array)->toJson();
    }

    /**
     * Create custom svg icon
     *
     * @param $resources
     * @return string
     */
    public static function headerIcon($resources)
    {
        $icon = '<svg class="sidebar-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill="var(--sidebar-icon)" d="M3 1h4c1.1045695 0 2 .8954305 2 2v4c0 1.1045695-.8954305 2-2 2H3c-1.1045695 0-2-.8954305-2-2V3c0-1.1045695.8954305-2 2-2zm0 2v4h4V3H3zm10-2h4c1.1045695 0 2 .8954305 2 2v4c0 1.1045695-.8954305 2-2 2h-4c-1.1045695 0-2-.8954305-2-2V3c0-1.1045695.8954305-2 2-2zm0 2v4h4V3h-4zM3 11h4c1.1045695 0 2 .8954305 2 2v4c0 1.1045695-.8954305 2-2 2H3c-1.1045695 0-2-.8954305-2-2v-4c0-1.1045695.8954305-2 2-2zm0 2v4h4v-4H3zm10-2h4c1.1045695 0 2 .8954305 2 2v4c0 1.1045695-.8954305 2-2 2h-4c-1.1045695 0-2-.8954305-2-2v-4c0-1.1045695.8954305-2 2-2zm0 2v4h4v-4h-4z"/></svg>';
        foreach ($resources as $key => $resource) {
            if (property_exists($resource, 'icon')) {
                $icon = !empty($resource::$icon) ? $resource::$icon : $icon;
            }
        }
        return $icon;
    }
}