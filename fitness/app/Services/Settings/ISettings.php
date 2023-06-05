<?php

namespace App\Services\Settings;
interface ISettings
{
    function get(int $id);
    function edit(int $id, array $settings);
    function getAll();
    function delete(int $id);
    function sortable(array $items);
}
