<?php
namespace App\Dto\Admin;

class DashBoardDTO{

    public $DashBoardData;

    public function __construct($standardUserCount, $extendedUserCount,$offersCount,$offersPrice,$offerConfirmationCount){

        $this->DashBoardData=array(
            'standardUserCount'=>$standardUserCount,
            'extendedUserCount'=>$extendedUserCount,
            'offersCount'=>$offersCount,
            'offersPrice'=>$offersPrice,
            'ConfirmationsCount'=>array(
                'offers'=>$offerConfirmationCount,
                'extendedUsers'=>0,
                'repairs'=>0,
                'reports'=>0
            ),
        );
    }


}
