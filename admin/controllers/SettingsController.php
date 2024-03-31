<?php
function settingShowForm()
{

    $title      = 'Danh sách setting';
    $view       = 'settings/form';

    $settings = settingPluckKeyValue();

    require_once PATH_VIEW_ADMIN . "layout/master.php";
}

function settingSave()
{
    $settings = settingPluckKeyValue();

    foreach ($_POST as $key => $value) {
        if (isset($settings[$key])) {
            if ($value != $settings[$key]) {
                settingUpdateByKey($key, [
                    'value' => $value
                ]);
            }
        } else {
            insert('settings', [
                'key' => $key,
                'value' => $value

            ]);
        }
    };
    $_SESSION['success'] = 'Thao tác thành công!';

    $fileSettings = PATH_UPLOAD . 'uploads/settings/settings.json';
    if (file_exists($fileSettings)) {
        unlink($fileSettings);
    }

    redirect(BASE_URL_ADMIN . '?action=setting-form');
    exit();
}

function settingPluckKeyValue()
{
    $data = listAll('settings');

    $settings = [];
    foreach ($data as $item) {
        $settings[$item['key']] = $item['value'];
    }

    return $settings;
}
