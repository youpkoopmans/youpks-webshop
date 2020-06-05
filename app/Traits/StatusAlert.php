<?php

namespace App\Traits;

trait StatusAlert
{
    /**
     * @param $alertTitle
     */
    public function alert($alertTitle)
    {
        session()->flash('status', $alertTitle);
    }

    /**
     * @param $alertTitle
     */
    public function storeAlert($alertTitle)
    {
        session()->flash('status', $alertTitle . __('b::alert.store'));
    }

    /**
     * @param $alertTitle
     */
    public function updateAlert($alertTitle)
    {
        session()->flash('status', $alertTitle . __('b::alert.update'));
    }

    /**
     * @param $alertTitle
     */
    public function destroyAlert($alertTitle)
    {
        session()->flash('status', $alertTitle . __('b::alert.destroy'));
    }

}
