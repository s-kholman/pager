<?php
namespace ISPager;

class PagesList extends View
{

    public function render(Pager $pager) : string
    {
        $this->pager = $pager;

        $return_page = '';

        $current_page = $this->pager->getCurrentPage();

        $total_page = $this->pager->getPagesCount();

        $return_page .= $this->link('&lt;&lt;', 1 . ' ... ');

        if ($current_page != 1){
            $return_page .= $this->link('&lt;', $current_page - 1) . ' ... ';
        }

        if ($current_page > $this->pager->getVisibleLinkCount() +1) {
            $init = $current_page - $this->pager->getVisibleLinkCount();
            for ($i = $init; $i < $current_page; $i++) {
                $return_page .= $this->link($i, $i) . ' ';
            }
        } else {
            for ($i = 1; $i < $current_page; $i++) {
                $return_page .= $this->link($i, $i) . ' ';
            }
        }

        $return_page .= "$i ";

        if ($current_page + $this->pager->getVisibleLinkCount() < $total_page) {
            $cond = $current_page + $this->pager->getVisibleLinkCount();
            for ($i = $current_page + 1; $i <= $cond; $i++) {
                $return_page .= $this->link($i, $i) . ' ';
            }
        } else {
            for ($i = $current_page +1; $i <= $total_page; $i++) {
                $return_page .= $this->link($i, $i) . ' ';
            }
        }

        if ($current_page != $total_page) {
            $return_page .= ' ... ' .
                $this->link('&gt;', $current_page +1);
        }
        $return_page .= ' ... ' . $this->link('&gt;&gt;', $total_page);

        return $return_page;
    }
}