<?php

namespace App\Traits\application;

use App\Models\consent\blocks_consent;
use App\Models\consent\answers_consent;
use App\Models\consent\questions_consent;

trait managerTrait
{
    protected $questions = array();

    private function getData($id)
    {
        return $this->getQuery($id);
    }

    private function getQuery($id)
    {
        $questions = $this->getQuestions($id);
        for ($i = 0; $i < count($questions['blocks']); $i++) {
            for ($j = 0; $j < count($questions['blocks'][$i]['questions']); $j++) {
                $this->questions['blocks'][$i]['questions'][$j]['answers'] = answers_consent::where('id_question', $questions['blocks'][$i]['questions'][$j]['id'])->where('status', 'Activo')->get()->toArray();
            }
        }

        return $this->questions;
    }

    private function getQuestions($id)
    {
        $questions = $this->getBlocks($id);
        for ($i = 0; $i < count($questions['blocks']); $i++) {
            $this->questions['blocks'][$i]['questions'] = questions_consent::where('id_block', $questions['blocks'][$i]['id'])->where('status', 'Activo')->orderBy('order', 'ASC')->get()->toArray();
        }

        return $this->questions;
    }

    private function getBlocks($id)
    {
        $this->questions['blocks'] = blocks_consent::where('id_format', $id)->where('status', 'Activo')->orderBy('order', 'ASC')->get()->toArray();

        return $this->questions;
    }
}
