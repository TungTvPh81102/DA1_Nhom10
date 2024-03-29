<?php 
function settingShowForm() {
    
    $title      = 'Danh sách setting';
    $view       = 'settings/form';

    $settings = settingPluckKeyValue();

    // debug ($_POST);
    require_once PATH_VIEW_ADMIN . "layout/master.php";
}
function settingCreate(){
    $title = 'Thêm mới đường dẫn';
    $view = 'settings/creatView';
    $script = "../scripts/drop-zone";
    $style = "../styles/drop-zone";
    if (!empty($_POST)) {
        $data = [
            'key' => $_POST['key'] ?? null,
            'value' => $_POST['value'] ?? null,
        ];
        insert('settings', $data);
        $_SESSION['success'] = 'Thêm mới đường dẫn thành công';
        redirect(BASE_URL_ADMIN . "?action=setting-form");
        exit();
    }
    require_once PATH_VIEW_ADMIN . "layout/master.php";
}
function settingSave() {
    // debug ($_POST);
    $settings = settingPluckKeyValue();

    // debug($settings);
    
    foreach($_POST as $key => $value) {
        if (isset($settings[$key])) {
            // update
            if ($value != $settings[$key]) {
                settingUpdateByKey($key, [
                    'value' => $value
                ]);
            }
        } else {
            // insert
        insert('settings', [
                'key' => $key,
                'value' => $value
                
            ]);
            // debug($insert);
            
        }
    };
// die;
    $_SESSION['success'] = 'Thao tác thành công!';

    header('Location: ' . BASE_URL_ADMIN . '?act=setting-form');
    exit();
}

// function validatelink(){
    
// }
function settingPluckKeyValue() {
    $data = listAll('settings');

    $settings = [];
    foreach ($data as $item) {
        $settings[$item['key']] = $item['value'];
    }

    return $settings;
}