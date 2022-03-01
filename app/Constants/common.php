<?php

namespace App\Constants;

class Common 
{
  const ITEM_ADD = '1';
  const ITEM_REDUCE = '2';

  const ITEM_LIST = [
    'add' => self::ITEM_ADD,
    'reduce' => self::ITEM_REDUCE,
  ];

  const ORDER_RECOMMEND = '0';
  const ORDER_HIGHER = '1';
  const ORDER_LOWER = '2';
  const ORDER_NEW = '3';
  const ORDER_OLDER = '4';

  const SORT_ORDER = [
    'recommend' => self::ORDER_RECOMMEND,
    'higher' => self::ORDER_HIGHER,
    'lower' => self::ORDER_LOWER,
    'new' => self::ORDER_NEW,
    'older' => self::ORDER_OLDER,
  ];
}