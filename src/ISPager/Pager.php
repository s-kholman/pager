<?php
namespace ISPager;

abstract class Pager
{
    protected $view;
    protected $parameters;
    protected $counter_param;
    protected $links_count;
    protected $item_per_page;

    public function __construct(
        View $view,
        $item_per_page = 10,
        $links_count = 3,
        $get_params = null,
        $counter_param = 'page'
    )
    {
        $this->view = $view;
        $this->parameters = $get_params;
        $this->counter_param = $counter_param;
        $this->item_per_page = $item_per_page;
        $this->links_count = $links_count;
    }

    abstract public function getItemsCount();
    abstract public function  getItem();
    public function getVisibleLinkCount()
    {
        return $this->links_count;
    }

    public function getParameters()
    {
        return $this->parameters;
    }

    public function getCounterParam()
    {
        return $this->counter_param;
    }

    public function getItemsPerPage()
    {
        return $this->item_per_page;
    }

    public function getCurrentPagePath()
    {
        return $_SERVER['PHP_SELF'];
    }

    public function getCurrentPage()
    {
        if (isset($_GET[$this->getCounterParam()])) {
            return intval($_GET[$this->getCounterParam()]);
        } else {
            return 1;
        }
    }

    public function getPagesCount()
    {
        $total = $this->getItemsCount();
        $result = (int) ($total / $this->getItemsPerPage());
        if ((float)($total / $this->getItemsPerPage()) - $result != 0) {
            $result++;
        }

        return $result;
    }

    public function render()
    {
        return $this->view->render($this);
    }

    public function __toString(): string
    {
        return  $this->render();
    }
}