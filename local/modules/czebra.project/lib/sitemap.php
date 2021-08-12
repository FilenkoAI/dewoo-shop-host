<?php

namespace Czebra\Project;

class Sitemap
{
    const PATH_TO_MAPS = '/_static/';
    const DOMAINS_FOLDERS = [
        'moscow',
        'sankt-peterburg',
        'nizhniy-novgorod',
        'krasnodar',
        'voronezh',
        'kazan',
        'barnaul',
        'belgorod',
        'berezniki',
        'vladivostok',
        'vladimir',
        'volgograd',
        'elec',
        'zheleznogorsk',
        'ivanovo',
        'kaluga',
        'kemerovo',
        'kostroma',
        'krasnoyarsk',
        'kursk',
        'livny',
        'lipetsk',
        'magnitogorsk',
        'minsk',
        'mcensk',
        'nizhnevartovsk',
        'novokuznetsk',
        'novosibirsk',
        'orel',
        'pavlovskiy-posad',
        'perm',
        'petropavlovsk-kamchatskiy',
        'tver',
        'tomsk',
        'tyumen',
        'ust-labinsk',
        'ufa',
        'chita',
        'yudjno-sahalinsk'
    ];
    const SITEMAP_FILES = ['sitemap.xml'];
    const PRIMARY_SITEMAP_NAME = 'sitemap.xml';

    public static function init()
    {
        // todo провести рефакторинг класса
        // проверяем наличие



        // создаем папки для поддоменов

        self::fetchSitemapsTemplates();
        $folders = self::getDomainFolders();

        foreach ($folders as $folder) {
            foreach ($folder['FILES'] as $file) {
                if ($folder['DOMAIN_NAME'] !== 'moscow') {
                    self::setDomainInFile($file['PATH'], $folder['DOMAIN_NAME']);
                }

                if($file['NAME'] === self::PRIMARY_SITEMAP_NAME && $folder['DOMAIN_NAME'] == 'moscow') {
                    self::setWWWToLinks($file['PATH']);
                }

            }
            if ($folder['DOMAIN_NAME'] === 'moscow') {
                $sitemapLink = 'https://' . 'daewoo-shop.com'. self::PATH_TO_MAPS . $folder['FOLDER_NAME'] . '/' . 'sitemap.xml';
            } else {
                $sitemapLink = 'https://' . $folder['DOMAIN_NAME']  . '.daewoo-shop.com'. self::PATH_TO_MAPS . $folder['FOLDER_NAME'] . '/' . 'sitemap.xml';
            }
            self::configureRobots($folder['PATH'], $sitemapLink);
        }
    }
    private static function fetchSitemapsTemplates()
    {
        $folders = self::getDomainFolders();

        foreach ($folders as $folder) {
            if (!is_dir($folder['PATH'])) {
                mkdir($folder['PATH']);
            }
            // копируем файлы сайтмапа из корня
            self::copyBitrixSitemap($folder['PATH']);
        }
    }

    private static function getDomainsFoldersInfo(): array
    {
        $domainsNames = self::DOMAINS_FOLDERS;
        $res = [];
        foreach ($domainsNames as $domain)
        {
            $res[] = [
                'DOMAIN' => $domain,
                'PATH' => $_SERVER['DOCUMENT_ROOT'] . '/_' . $domain . '/',
                'FOLDER_NAME' => '_' . $domain
            ];
        }
        return $res;
    }

    private static function getDomainFolders()
    {
        $folders = self::DOMAINS_FOLDERS;
        $res = [];
        foreach ($folders as $key => $folder)
        {
            $res[$key] = [
                'DOMAIN_NAME' => $folder,
                'FOLDER_NAME' => '_' . $folder,
                'PATH' => $_SERVER['DOCUMENT_ROOT'] . self::getPathToMaps() . '_' . $folder
            ];
            $files = self::getSitemapFiles();
            foreach ($files as $file)
            {
                $res[$key]['FILES'][] = [
                    'PATH' => $res[$key]['PATH'] . '/' . $file['NAME'],
                    'NAME' => $file['NAME']
                ];
            }
        }
        return $res;
    }

    public static function getSitemapFiles() : array
    {
        $files = self::SITEMAP_FILES;
        $res = [];
        foreach ($files as &$fileName){
            $res[] = [
                'NAME' => $fileName,
                'PATH' => $_SERVER['DOCUMENT_ROOT']  . self::PATH_TO_MAPS . $fileName
            ];
        }
        return $res;
    }



    private static function deleteSitemapFilesFromRoot()
    {
        $files = self::getSitemapFiles();
        foreach ($files as $file){
            unlink($file['PATH']);
        }
    }

    private static function getPathToMaps()
    {
        return self::PATH_TO_MAPS;
    }


    private static function copyBitrixSitemap($folder)
    {
        $files = self::getSitemapFiles();
        foreach ($files as $file){
            if (file_exists($file['PATH'])) {
                copy($file['PATH'], $folder . '/' . $file['NAME']);
            } else {
                throw new \Exception('Файл ' . $file['NAME'] . ' не найден');
            }
        }
    }

    private static function configureRobots($path, $sitemapLink)
    {
        $toPath = $path . '/robots.txt';
        copy(self::getRobotsTemplatePath(), $toPath);
        $data = 'Sitemap: ' . $sitemapLink;
        file_put_contents($toPath, "\n", FILE_APPEND);
        file_put_contents($toPath, $data, FILE_APPEND);
    }

    private static function getRobotsTemplatePath() : string
    {
        return $_SERVER['DOCUMENT_ROOT'] . self::PATH_TO_MAPS . 'robots.txt';
    }

    private static function setDomainInFile($filePath, $domainName)
    {
        $content = file_get_contents($filePath);
        $content = str_replace('daewoo-shop.com',  $domainName . '.' . 'daewoo-shop.com', $content);
        file_put_contents($filePath, $content);
    }

    private static function setTrueLinksToXml($filePath, $domainName)
    {
        $domainFolder = '_' . $domainName . '/';
        $content = file_get_contents($filePath);
        $content = str_replace('daewoo-shop.com/',  'daewoo-shop.com' . self::PATH_TO_MAPS . $domainFolder, $content);
        file_put_contents($filePath, $content);
    }

    private static function setWWWToLinks($filePath)
    {
        $content = file_get_contents($filePath);
        $content = str_replace('https://daewoo-shop.com',  'https://www.daewoo-shop.com', $content);
        file_put_contents($filePath, $content);
    }

}