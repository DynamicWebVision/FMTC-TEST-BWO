<?php namespace App\Services;

class Promotions  {

    const PROMO_URL = 'http://pods.formetocoupon.com/6275c1397c7aaafd8ae8ca639276261d.json';

    public function fetchCurrentPromotions() {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_URL, self::PROMO_URL);
        $resp = curl_exec($curl);

        $decodedResponse = json_decode($resp);

        return [
          'label' => $decodedResponse->aDeals[0][0]->cLabel,
          'merchant' => $decodedResponse->aDeals[0][0]->cMerchant,
          'promoStartDate' => $decodedResponse->aDeals[0][0]->dtStartDate,
          'promoEndDate' => $decodedResponse->aDeals[0][0]->dtEndDate,
          'logo' => $decodedResponse->aDeals[0][0]->cLogo88x31,
          'couponId' => $decodedResponse->aDeals[0][0]->nCouponID,
          'couponCode' => $decodedResponse->aDeals[0][0]->cCode,
          'categories' => $decodedResponse->aDeals[0][0]->aCategoriesV2
        ];

    }


}
