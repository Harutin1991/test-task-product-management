<?php

if (!function_exists('auth_user')) {

    /**
     * @param string|null $guard
     * @return \App\Models\User|\Illuminate\Contracts\Auth\Authenticatable|null
     */
    function auth_user(?string $guard = null)
    {
        return auth()->guard($guard)->user();
    }
}

if (!function_exists('csv_to_array')) {

    /**
     * @param string $filename
     * @param array $options
     * @return array|null
     */
    function csv_to_array(string $filename = '', array $options = []): ?array
    {
        $config = [
            'delimiter' => ',',
            'select' => '*',
            'chunk' => null
        ];

        $config = array_merge($config, $options);
        if (!file_exists($filename) || !is_readable($filename)) {
            return null;
        }

        $header = null;
        $chunks = [];
        $data = [];
        if (($handle = fopen($filename, 'r')) !== false) {
            while (($row = fgetcsv($handle, 1000, $config['delimiter'])) !== false) {
                if ($header) {
                    $rowData = array_combine($header, $row);
                    $data[] = $config['select'] === '*' ? $rowData : \Illuminate\Support\Arr::only($rowData, $config['select']);
                } else {
                    $header = $row;
                }
                if ($config['chunk'] && count($data) === $config['chunk']) {
                    $chunks[] = $data;
                    $data = [];
                }
            }
            fclose($handle);
        }
        return $config['chunk'] ? $chunks : $data;
    }
}

if (!function_exists('removeUnnecessaryContent')) {

    /**
     * @param string $filename
     * @param array $options
     * @return array|null
     */
    function removeUnnecessaryContent(?string $html): string
    {
        if (!$html) {
            return '';
        }

        $html = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $html);
        $html = preg_replace('#<title(.*?)>(.*?)</title>#is', '', $html);
        $html = preg_replace('#<meta(.*?)>#is', '', $html);
        $html = preg_replace('/<!--(.|\s)*?-->/', '', $html);
        $html = preg_replace('/<([^>\s]+)[^>]*>(?:\s*(?:<br \/>|&nbsp;|&thinsp;|&ensp;|&emsp;|&#8201;|&#8194;|&#8195;)\s*)*<\/\1>/', '', $html);
        return $html;
    }
}

if (!function_exists('generateFileName')) {

    /**
     * @param $image
     * @param bool $saveWithOriginalName
     * @return string
     */
    function generateFileName($image, $saveWithOriginalName = false) :string
    {
        return !($saveWithOriginalName) ? md5(time()) . rand(100000, 999999) . '.' . $image->getClientOriginalExtension() : $image->getClientOriginalName();;
    }
}
