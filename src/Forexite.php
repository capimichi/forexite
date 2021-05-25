<?php


namespace Forexite;


use Forexite\Model\AssetValue;

class Forexite
{
    
    public function getAssetValues($asset, \DateTime $date)
    {
        $url = Endpoint::getDayEndpoint($date);
        $content = file_get_contents($url);
        $path = sys_get_temp_dir() . DIRECTORY_SEPARATOR . sprintf("forexite-%s", rand(0, 99999999999999));
        file_put_contents($path, $content);
        $unzipDir = sys_get_temp_dir() . DIRECTORY_SEPARATOR . sprintf("forexite-unzipped-%s", rand(0, 99999999999999)) . DIRECTORY_SEPARATOR;
        $zip = new \ZipArchive;
        $res = $zip->open($path);
        $rows = [];
        if ($res === true) {
            if (!file_exists($unzipDir)) {
                mkdir($unzipDir, 0777, true);
            }
            $unzipDirFiles = array_diff(scandir($unzipDir), ['..', '.']);
            foreach ($unzipDirFiles as $unzipDirFile) {
                unlink($unzipDir . $unzipDirFile);
            }
            $zip->extractTo($unzipDir);
            $zip->close();
            $unzipDirFiles = array_diff(scandir($unzipDir), ['..', '.']);
            foreach ($unzipDirFiles as $unzipDirFile) {
                $f = fopen($unzipDir . $unzipDirFile, 'r');
                fgetcsv($f);
                while (!empty($row = fgetcsv($f))) {
                    $rows[] = $row;
                }
                unlink($unzipDir . $unzipDirFile);
            }
        }
        if (file_exists($path)) {
            unlink($path);
        }
        if (file_exists($unzipDir)) {
            rmdir($unzipDir);
        }
        
        $assetValues = [];
        foreach ($rows as $row) {
            if ($row[0] == $asset) {
                $assetValue = new AssetValue();
                $assetValue->setAsset($asset);
                $createdAt = new \DateTime();
                $createdAt->setDate(
                    substr($row[1], 0, 4),
                    substr($row[1], 4, 2),
                    substr($row[1], 6, 2)
                );
                $createdAt->setTime(
                    substr($row[2], 0, 2),
                    substr($row[2], 2, 2),
                    substr($row[2], 4, 2)
                );
                $assetValue->setCreatedAt($createdAt);
                $assetValue->setOpen(floatval($row[3]));
                $assetValue->setHigh(floatval($row[4]));
                $assetValue->setLow(floatval($row[5]));
                $assetValue->setClose(floatval($row[6]));
                $assetValues[] = $assetValue;
            }
        }
        return $assetValues;
    }
}