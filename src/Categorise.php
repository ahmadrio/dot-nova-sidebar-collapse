<?php

namespace Opanegro\DotNovaSidebarCollapse;


trait Categorise
{
    /**
     * A nova resource can be given a category name.
     *
     * If a category name is provided, then that will act as a label.
     *
     * The label will be standardised, so any changes in capitalisation will be removed
     * and it will be converted into Title case.
     *
     * For example:
     *
     * "Customers Information", "customers information" and "cUStoMERs INFORMATION"
     *
     * all become "Customers Information"
     *
     * If the category is left empty, then all empty resources will get grouped together.
     *
     * If there is only one category, it will not be collapsable, but will instead have a label above it all
     *
     * if there is only one category, and it is empty, then it will act as Nova does by default.
     */
    public static $category;

    /**
     * Generate custom icon category
     *
     * just add $icon in resources nova
     *
     * example:
     * ...
     * Class User extends Resource
     * {
     *      public static $category = 'Management Users';
     *      public static $icon = '[svg icon]';
     * }
     * ...
     *
     * [svg icon] check this link http://www.zondicons.com/icons.html
     * usage:
     * - download zondicons and open *.svg icon in browser
     * - [right click] in browser and choose "inspect element"
     * - copy tag svg to variable $icon
     * - add class in <svg class="sidebar-icon">
     * - add fill in <path fill="var(--sidebar-icon)">
     * - DONE
     */
    public static $icon;
}