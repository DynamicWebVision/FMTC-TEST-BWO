<?php namespace App\Http\Controllers;


class PromotionsController extends Controller {

    public $viewVariables;
    public $currentCashedPromo;

    public function promos()
    {
        //Get Cached/Stored Promotion
        $this->currentCashedPromo = \App\Model\Promotions::orderBy('id', 'desc')->take(1)->get();

        //Check to see if we have any promotions stored in the DB yet
        if (isset($this->currentCashedPromo[0])) {
            //Convert the time from our last refresh to minutes
            $minutesSinceRefresh = (time() - strtotime($this->currentCashedPromo[0]->last_refresh))/60;

            //Check to see if cashed data is older than 10 minutes
            if ($minutesSinceRefresh >= 10) {
                $this->getNewPromo();
                return view('coupon', $this->viewVariables);
            }
            else {
                $promo = $promo = \App\Model\Promotions::find($this->currentCashedPromo[0]->id);
                $this->setViewVariables($promo);
                return view('coupon', $this->viewVariables);
            }
        }
        else {
            $this->getNewPromo();
            return view('coupon', $this->viewVariables);
        }

    }

    public function addNewPromo($currentPromo) {
        $promo = new \App\Model\Promotions;

        $promo->label = $currentPromo['label'];
        $promo->merchant = $currentPromo['merchant'];
        $promo->logo_url = $currentPromo['logo'];
        $promo->coupon_code = $currentPromo['couponCode'];
        $promo->coupon_id = $currentPromo['couponId'];
        $promo->promo_start_dt = $currentPromo['promoStartDate'];
        $promo->promo_end_dt = $currentPromo['promoEndDate'];
        $promo->last_refresh = date('Y-m-d H:i:s');

        $promo->save();

        $this->setViewVariables($promo);
    }

    public function setViewVariables($promo) {
        //These are the variables that will be displayed in the view
        $this->viewVariables = [
            "couponTitle" =>   $promo->label." at ".$promo->merchant." from ".date("M d Y", strtotime($promo->promo_start_dt))." to ".$promo->promo_end_dt,
            "couponCode" => $promo->coupon_code,
            "merchantLogoUrl" => $promo->logo_url
        ];
    }

    public function getNewPromo() {

        //Get Fresh Update Information
        $promotionsService = new \App\Services\Promotions();
        $currentPromo = $promotionsService->fetchCurrentPromotions();

        if (isset($this->currentCashedPromo[0])) {
            //See if the Refresh Provides a new Coupon or if the Coupon is still the same
            if ($this->currentCashedPromo[0]->coupon_id != $currentPromo['couponId']) {

                    //If there is a new promo, create a new one in the table
                    $this->addNewPromo($currentPromo);

                }
            else {
                    //If the Coupon is still the same, just update the "Last Refresh" time
                    $promo = \App\Model\Promotions::find($this->currentCashedPromo[0]->id);

                    $promo->last_refresh = date('Y-m-d H:i:s');

                    $promo->save();
                }
        }
        else {
            $this->addNewPromo($currentPromo);
        }
    }
}