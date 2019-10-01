<?php

namespace App\Services;

use App\CourseItem;
use App\TestItem;

class TestService
{
    public function generateTest($item_type_id, CourseItem $item, array $data)
    {
        if ($item_type_id == 8) {
            $itemTest                   = new TestItem();
            $itemTest->course_item_id   = $item->id;
            $itemTest->answer           = $data['trueFalse'];
            $itemTest->save();
        } elseif ($item_type_id == 7) {

            foreach ($data['afirmacao'] as $key => $afirmacao) {
                if (!$afirmacao) {
                    continue;
                }
                $itemTest                   = new TestItem;
                $itemTest->desc             = $afirmacao;
                $itemTest->course_item_id   = $item->id;
                if (in_array($key, $data['verdadeira'])) {
                    $itemTest->answer       = 1;
                } else {
                    $itemTest->answer       = 0;
                }
                $itemTest->save();
            }
        } elseif ($item_type_id == 9) {
            foreach ($data['afirma'] as $key => $afirma) {
                if (!$afirma) {
                    continue;
                }
                $itemTest               = new TestItem;
                $itemTest->desc         = $afirma;
                $itemTest->course_item_id   = $item->id;
                if ($key == $data['verdadeira']) {
                    $itemTest->answer   = 1;
                } else {
                    $itemTest->answer   = 0;
                }
                $itemTest->save();
            }
        } elseif ($item_type_id == 10) {
            $itemTest                   = new TestItem;
            $itemTest->course_item_id   = $item->id;
            $itemTest->desc             = $data['desc'];
            $itemTest->save();
        }
    }
}
