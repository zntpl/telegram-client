<?php

namespace App\Dialog\Domain\Actions;

use ZnLib\Telegram\Domain\Base\BaseAction;
use ZnLib\Telegram\Domain\Entities\MessageEntity;
use ZnLib\Telegram\Domain\Helpers\MatchHelper;
use App\Dialog\Domain\Helpers\WordHelper;
use App\Dialog\Domain\Libs\Parser;
use Illuminate\Container\Container;
use ZnCore\Base\Exceptions\NotFoundException;
use ZnCore\Base\Helpers\StringHelper;

class DataBaseAction extends BaseAction
{

    public function run(MessageEntity $messageEntity)
    {
        $request = $messageEntity->getMessage();
        $sentences = WordHelper::textToSentences($request);
        foreach ($sentences as $sentence) {
            try {
                $answerText = $this->predict($sentence);
                if ($answerText) {
                    yield $this->response->sendMessage($answerText);
                    /*yield $this->messages->sendMessage([
                        'peer' => $update,
                        'message' => $answerText,
                        //'message' => implode(PHP_EOL, $sentences),
                        //'reply_to_msg_id' => isset($update['message']['id']) ? $update['message']['id'] : null,
                    ]);*/
                }
            } catch (NotFoundException $e) {}
        }
    }

    private function predict(string $request)
    {
        $request = MatchHelper::prepareString($request);
        $words = StringHelper::getWordArray($request);
        $container = Container::getInstance();
        /** @var \App\Dialog\Domain\Services\PredictService $predictService */
        $predictService = $container->get(\App\Dialog\Domain\Services\PredictService::class);
        $answerText = $predictService->predict($words);
        return $answerText;
    }

}