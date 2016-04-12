<?php
/**
 * User: cst
 * Date: 2016/4/13
 * Time: 3:33
 */


if (!defined('IN_ANWSION'))
{
    die;
}

class approval_class extends AWS_MODEL
{
    public function get_approval_list($uid, $page, $per_page)
    {
        if ($approval_list = $this->fetch_page('approval', "`uid` = '" . intval($uid) . "'", 'time ASC', $page, $per_page))
        {
            foreach ($approval_list AS $key => $val)
            {
                $approval_list[$key]['data'] = unserialize($val['data']);
            }
        }

        return $approval_list;
    }
    
    public function get_approval_list_count($uid)
    {
        return $this->count('approval', "`uid` = '" . intval($uid) . "'");
    }
}