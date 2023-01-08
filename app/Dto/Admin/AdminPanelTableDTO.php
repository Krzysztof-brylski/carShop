<?php
namespace App\Dto\Admin;
use Illuminate\Pagination\LengthAwarePaginator;

class AdminPanelTableDTO{
    public $data;

    /**
     * AdminPanelTableDTO constructor.
     * @param LengthAwarePaginator $paginator
     * @param array $actions
     */
    public function __construct(LengthAwarePaginator $paginator,array $actions)
    {
        $this->data=array(
          "paginator"=>$paginator,
          "actions"=>$actions,
        );
    }


}
