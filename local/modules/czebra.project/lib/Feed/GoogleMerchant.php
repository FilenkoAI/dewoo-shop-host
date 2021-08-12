<?php

namespace Czebra\Project\Feed;

class GoogleMerchant
{

	const IBLOCK_ID = 24;

	public static function create()
	{
		$arData = self::getData();
		$date = (new \DateTime())->format('D, j Y H:i:s +0B');
		$xmlStr = '';
		$xmlStr .= '<rss xmlns:g="http://base.google.com/ns/1.0" version="2.0"><channel>';
		$xmlStr .= '<title></title>';
		$xmlStr .= '<link>' . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] . '</link>';
		$xmlStr .= '<description>Best online seller Inc.</description>';
		$xmlStr .= '<pubDate>' . $date . '</pubDate>';
		$xmlStr .= '<lastBuildDate>' . $date . '</lastBuildDate>';
		$xmlStr .= '<language>ru</language>';

		foreach ($arData as $item)
		{
			$xmlStr .= '<item>';

			$xmlStr .= '<title>' . $item['title'] .'</title>';
			$xmlStr .= '<g:id>' . $item['g:id'] .'</g:id>';
			$xmlStr .= '<g:price>' . $item['g:price'] .'</g:price>';
			$xmlStr .= '<g:condition>' . $item['g:condition'] .'</g:condition>';
			$xmlStr .= '<g:availability>' . $item['g:availability'] .'</g:availability>';
			$xmlStr .= '<g:link>' . $item['g:link'] .'</g:link>';
			$xmlStr .= '<g:product_type>' . $item['g:product_type'] .'</g:product_type>';
			$xmlStr .= '<g:custom_label_0>' . $item['g:custom_label_0'] .'</g:custom_label_0>';
			$xmlStr .= '<g:image_link>' . $item['g:image_link'] .'</g:image_link>';

			if(count($item['ADDITIONAL_IMAGES']) > 0)
			{
				foreach ($item['ADDITIONAL_IMAGES'] as $additionalImage)
				{
					$xmlStr .= '<g:additional_image_link>' . $additionalImage .'</g:additional_image_link>';
				}
			}

			$xmlStr .= '<g:description>' . $item['g:description'] .'</g:description>';
			$xmlStr .= '<g:adult>' . $item['g:adult'] .'</g:adult>';

			$xmlStr .= '</item>';
		}

		$xmlStr .= '</channel></rss>';


		return file_put_contents('google/olga_google.xml', $xmlStr);

	}

	private static function getData()
	{
		$res = [];
		$cannonical = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'];

		$iterator = \CIBlockElement::GetList(
			array(),
			array('IBLOCK_ID' => self::IBLOCK_ID, '=AVAILABLE' => 'Y', 'HAS_DETAIL_PICTURE' => 'Y'),
			false,
			false,
			array('ID', 'NAME', 'IBLOCK_ID', 'PRICE_1', 'PRICE_2', 'DETAIL_PAGE_URL', 'CURRENCY_1', 'DETAIL_PICTURE', "PROPERTY_*")
		);

		while ($elem = $iterator->GetNextElement()) {

			$item = $elem->GetFields();
			$props = $elem->GetProperties();
			$price = $item['PRICE_1'] < $item['PRICE_2'] ? $item['PRICE_1'] : $item['PRICE_2'];
			$price .= ' ' . $item['CURRENCY_1'];

			$image = \CFile::GetPath($item['DETAIL_PICTURE']);


			$description = '';
			foreach ($props as $prop)
			{
				if ($prop['VALUE'] && gettype($prop['VALUE']) == 'string' && $prop['PROPERTY_TYPE'] == 'S' && !strpos($prop['VALUE'], '&'))
				{
					$description .= $prop['NAME'] . ': ' . $prop['VALUE'] . ' , ';
				}
			}

			$additionalImages = [];
			foreach ($props['MORE_PHOTO']['VALUE'] as $additional)
			{
				$additionalImages[] = $cannonical . \CFile::GetPath($additional);
			}

			$ipropValues = new \Bitrix\Iblock\InheritedProperty\SectionValues(self::IBLOCK_ID, $item['IBLOCK_SECTION_ID']);
			$IPROPERTY = $ipropValues ? $ipropValues->getValues() : $ipropValues;
			$label = $IPROPERTY['SECTION_META_TITLE'];

			if (!$label)
				$label = $item['NAME'];

			$link =  $cannonical . $item['DETAIL_PAGE_URL'];
			$link =  str_replace('"', '', $link);

			$res[] = [
				'title' => $item['NAME'],
				'g:id' => $item['ID'],
				'g:price' => $price,
				'g:condition' => 'new',
				'g:availability' => 'in_stock',
				'g:link' => $link,
				'g:product_type' => self::getSectionString($item['IBLOCK_SECTION_ID']),
				'g:custom_label_0' => $label,
				'g:image_link' => $cannonical . $image,
				'ADDITIONAL_IMAGES' => $additionalImages,
				'g:description' => $description,
				'g:adult' => 'no'


			];


		}

		return $res;

	}

	private static function getSectionString($sectionId)
	{
		$listSections = \CIBlockSection::GetNavChain(false, $sectionId, ['ID', 'NAME', 'DEPTH_LEVEL'], true);
		$category = '';
		foreach ($listSections as $key => $v) {
			if ($key === 0) {
				$category .= $v['NAME'];
			} else {
				$category .= ' > ' . $v['NAME'];
			}
		}
		return $category;
	}
}

