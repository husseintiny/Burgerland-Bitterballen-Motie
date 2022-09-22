<?php
class VotesCalculator
{

    /**
     * @var $maxLetters[]
     */
    private $maxLetters;

    /**
     * @param int $residents
     */
    public function calculateVotes(int $residents): void
    {
        $answers = [
            'wel' => 0,
            'niet' => 0,
            'welniet' => 0,
            "niks" => 0
        ];

        for ($i = 1; $i <= $residents; $i++) {

            switch ($i) {
                case (($i % 7 == 0) && ($i % 4 == 0)):
                    $answers['welniet']++;
                    break;
                case ($i % 4 == 0):
                    $answers['wel']++;
                    break;
                case ($i % 7 == 0):
                    $answers['niet']++;
                    break;
                default:
                    $answers['niks']++;

            }

        }
         $this->setMaxLetters(intval(round(($answers['niks']) + ($answers['niks'] / 10), 0)));

    }
    /**
     * @return int
     */
    public function getMaxLetters(): int
    {
        return $this->maxLetters;
    }
    /**
     * @param int $maxLetters
     */
    public function setMaxLetters(int $maxLetters): void
    {
        $this-> maxLetters = $maxLetters;

    }

}
