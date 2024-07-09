<?php
$sourceUrl = 'http://myzy.eu.org/show.php';  // 目标 URL
$saveDirectory = '/var/www/html';  // 保存目录

// 创建保存目录（如果不存在）
if (!is_dir($saveDirectory)) {
    mkdir($saveDirectory, 0755, true);
}

// 请求目标 URL 获取 JSON 数据
$response = file_get_contents($sourceUrl);
$data = json_decode($response, true);

// 检查 JSON 数据是否解析成功
if ($data === null) {
    echo "无法解析 JSON 数据。";
    exit;
}

// 保存文件到指定目录
foreach ($data as $file) {
    $fileName = $file['fileName'];
    $fileContent = $file['fileContent'];
    $filePath = $saveDirectory . '/' . $fileName;

    // 将文件内容保存到指定目录下
    file_put_contents($filePath, $fileContent);
    echo "已保存文件: " . $filePath . "\n";
}

echo "所有文件已保存。";
?>
